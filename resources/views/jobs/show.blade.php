@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-sm border-0 rounded-3 mb-4">
                <!-- Job Header -->
                <div class="card-header bg-light border-0 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-1 fw-bold">{{ $job->name }}</h4>
                            <div class="d-flex align-items-center text-muted">
                                <span class="me-3"><i class="bi bi-geo-alt me-1"></i>{{ $job->city->name ?? 'Tidak ada' }}</span>
                                <span><i class="bi bi-briefcase me-1"></i>{{ $job->jobType->name ?? 'Tidak ada' }}</span>
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            @if($job->archived == 'N')
                                <form action="{{ route('jobs.archive', $job) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-outline-secondary rounded-pill">
                                        <i class="bi bi-archive me-1"></i> Arsipkan
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('jobs.unarchive', $job) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-outline-success rounded-pill">
                                        <i class="bi bi-box-arrow-up me-1"></i> Aktifkan
                                    </button>
                                </form>
                            @endif
                            
                            <a href="{{ route('company.dashboard') }}" class="btn btn-outline-primary rounded-pill">
                                <i class="bi bi-arrow-left me-1"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Job Details -->
                <div class="card-body p-4">
                    <!-- Salary & Status Info -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3">
                                <h6 class="text-muted mb-1"><i class="bi bi-cash-coin me-1 text-primary"></i> Gaji</h6>
                                <h5 class="mb-0 fw-semibold">{{ $job->formatted_salary_range }}</h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3">
                                <h6 class="text-muted mb-1"><i class="bi bi-calendar-check me-1 text-primary"></i> Tanggal Posting</h6>
                                <h5 class="mb-0 fw-semibold">{{ $job->created_at->format('d M Y') }}</h5>
                            </div>
                        </div>
                    </div>

                    <!-- Job Description -->
                    <div class="mb-4">
                        <h5 class="border-bottom pb-2 fw-semibold"><i class="bi bi-file-text me-2 text-primary"></i>Deskripsi Pekerjaan</h5>
                        <div class="p-1">
                            {!! nl2br(e($job->description)) !!}
                        </div>
                    </div>

                    <!-- Job Requirements -->
                    <div class="mb-4">
                        <h5 class="border-bottom pb-2 fw-semibold"><i class="bi bi-check-circle me-2 text-primary"></i>Persyaratan</h5>
                        <div class="p-1">
                            {!! nl2br(e($job->requirement)) !!}
                        </div>
                    </div>

                    <!-- Company Info -->
                    @if($job->company)
                    <div class="mt-5">
                        <h5 class="border-bottom pb-2 fw-semibold"><i class="bi bi-building me-2 text-primary"></i>Informasi Perusahaan</h5>
                        <div class="d-flex align-items-center mb-3 mt-3">
                            @if($job->company->company_logo)
                                <div class="logo-container bg-white rounded-3 p-2 shadow-sm d-flex align-items-center justify-content-center me-3" style="width: 70px; height: 70px;">
                                    <img src="{{ asset('company/' . $job->company->company_logo) }}"
                                        alt="{{ $job->company->name }}" class="img-fluid"
                                        style="max-width: 100%; max-height: 55px; object-fit: contain;">
                                </div>
                            @else
                                <div class="logo-container bg-light rounded-3 p-2 shadow-sm d-flex align-items-center justify-content-center me-3" style="width: 70px; height: 70px;">
                                    <i class="bi bi-building text-secondary" style="font-size: 2rem;"></i>
                                </div>
                            @endif
                            <div>
                                <h5 class="mb-1 fw-semibold">{{ $job->company->name }}</h5>
                                <p class="text-muted mb-0"><i class="bi bi-geo-alt-fill me-1 small"></i>{{ $job->company->city->name ?? '' }}</p>
                            </div>
                        </div>
                        
                        <div class="mt-3 ps-2 mb-0">
                            <p class="mb-2"><i class="bi bi-pin-map me-2 text-muted"></i>{{ $job->company->address }}</p>
                            <p class="mb-0"><i class="bi bi-telephone me-2 text-muted"></i>{{ $job->company->telephone }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 5px 25px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
}
.card-header {
    border-radius: 12px 12px 0 0 !important;
}
.breadcrumb {
    padding: 0.5rem 1rem;
    background-color: #f8f9fa;
    border-radius: 8px;
}
.breadcrumb-item a {
    color: #4a90e2;
}
.btn {
    padding: 0.5rem 1.25rem;
    transition: all 0.2s ease;
}
.rounded-pill {
    padding-left: 1.5rem;
    padding-right: 1.5rem;
}
.logo-container {
    transition: all 0.3s ease;
}
.logo-container:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 15px rgba(0,0,0,0.1);
}
</style>
@endpush