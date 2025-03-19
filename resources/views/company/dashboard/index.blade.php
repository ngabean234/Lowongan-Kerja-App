@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 py-4">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card mb-4">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            @if($company->company_logo)
                                <div class="logo-container bg-white rounded-3 p-2 shadow-sm d-flex align-items-center justify-content-center" style="width: 90px; height: 90px;">
                                    <img src="{{ asset('company/' . $company->company_logo) }}"
                                        alt="{{ $company->name }}" class="img-fluid"
                                        style="max-width: 100%; max-height: 75px; object-fit: contain;">
                                </div>
                            @else
                                <div class="logo-container bg-light rounded-3 p-2 shadow-sm d-flex align-items-center justify-content-center" style="width: 90px; height: 90px;">
                                    <i class="bi bi-building text-secondary" style="font-size: 2.5rem;"></i>
                                </div>
                            @endif
                        </div>
                        <div class="col">
                            <h4 class="mb-1">{{ $company->name }}</h4>
                            <p class="mb-0 text-muted">
                                <i class="bi bi-geo-alt"></i> {{ $company->city->name ?? 'Lokasi tidak tersedia' }}
                            </p>
                        </div>
                        <div class="col-auto ms-auto">
                            <div class="d-flex align-items-center">
                                <div class="dropdown">
                                    <button class="btn btn-outline-primary border-0 d-flex align-items-center gap-2"
                                        type="button" id="userMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-person-circle fs-4 me-2"></i>
                                            <div class="d-none d-md-block text-start">
                                                <span class="d-block fw-medium">{{ Auth::user()->name }}</span>
                                                <small class="text-muted">Perusahaan</small>
                                            </div>
                                        </div>
                                        <i class="bi bi-chevron-down"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="userMenuButton">
                                        <li>
                                            <a class="dropdown-item py-2" href="{{ route('company.profile') }}">
                                                <i class="bi bi-pencil-square me-2 text-primary"></i>Edit Profil
                                            </a>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form action="{{ route('company.logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="dropdown-item py-2">
                                                    <i class="bi bi-box-arrow-right me-2 text-danger"></i>Logout
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-title mb-0">Total Lowongan</h6>
                                    <h2 class="my-2">{{ $jobs->count() }}</h2>
                                </div>
                                <div>
                                    <i class="fas fa-briefcase fa-3x opacity-50"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-title mb-0">Lowongan Aktif</h6>
                                    <h2 class="my-2">{{ $jobs->where('archived', 'N')->count() }}</h2>
                                </div>
                                <div>
                                    <i class="fas fa-check-circle fa-3x opacity-50"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-title mb-0">Lowongan Diarsipkan</h6>
                                    <h2 class="my-2">{{ $jobs->where('archived', 'Y')->count() }}</h2>
                                </div>
                                <div>
                                    <i class="fas fa-archive fa-3x opacity-50"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Daftar Lowongan</h5>
                    <a href="{{ route('jobs.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Tambah Lowongan
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Nama Pekerjaan</th>
                                    <th>Tipe</th>
                                    <th>Gaji</th>
                                    <th>Status</th>
                                    <th>Tanggal Posting</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($jobs as $job)
                                    <tr>
                                        <td class="fw-medium">{{ $job->name }}</td>
                                        <td><span class="badge bg-light text-dark">{{ $job->jobType->name ?? 'Tidak tersedia' }}</span></td>
                                        <td>{{ $job->formatted_salary_range }}</td>
                                        <td>
                                            @if($job->archived == 'N')
                                                <span class="badge bg-success">Aktif</span>
                                            @else
                                                <span class="badge bg-warning text-dark">Diarsipkan</span>
                                            @endif
                                        </td>
                                        <td>{{ $job->created_at->format('d M Y') }}</td>
                                        <td>
                                            <div class="action-buttons d-flex justify-content-center gap-1">
                                                <a href="{{ route('jobs.public.show', $job) }}"
                                                    class="btn btn-sm btn-outline-info" title="Lihat Detail">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('jobs.edit', $job) }}"
                                                    class="btn btn-sm btn-outline-warning" title="Edit Lowongan">
                                                    <i class="bi bi-pencil"></i>
                                                </a>

                                                @if($job->archived == 'N')
                                                    <form action="{{ route('jobs.archive', $job) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-sm btn-outline-secondary" title="Arsipkan Lowongan">
                                                            <i class="bi bi-archive"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('jobs.unarchive', $job) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-sm btn-outline-success" title="Aktifkan Lowongan">
                                                            <i class="bi bi-box-arrow-up"></i>
                                                        </button>
                                                    </form>
                                                @endif

                                                <form action="{{ route('jobs.destroy', $job) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus lowongan ini? Tindakan ini tidak dapat dibatalkan.')"
                                                        title="Hapus Lowongan">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4">
                                            <div class="d-flex flex-column align-items-center">
                                                <i class="bi bi-clipboard-x text-muted" style="font-size: 2rem;"></i>
                                                <p class="mt-2 mb-0">Belum ada lowongan pekerjaan</p>
                                                <a href="{{ route('jobs.create') }}" class="btn btn-sm btn-primary mt-3">
                                                    <i class="bi bi-plus-lg"></i> Tambah Lowongan
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.action-buttons .btn {
    margin-right: 5px;
    width: 40px;
    height: 40px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 4px;
    font-size: 14px;
}

.action-buttons form {
    display: inline-block;
    margin-bottom: 0;
}

.badge {
    font-size: 85%;
    padding: 6px 10px;
    font-weight: 500;
}

.badge.bg-success {
    background-color: #28a745 !important;
}

.badge.bg-warning {
    background-color: #ffc107 !important;
    color: #212529 !important;
}

.card {
    border: none;
    box-shadow: 0 0 10px rgba(0,0,0,.1);
}
.table > :not(caption) > * > * {
    padding: 1rem;
}
</style>
@endpush
@endsection
