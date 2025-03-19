@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Cari Lowongan</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('search.jobs') }}" method="GET" class="mb-4">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <input type="text" name="keyword" class="form-control" 
                                    placeholder="Nama Pekerjaan" value="{{ request('keyword') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" name="location" class="form-control" 
                                    placeholder="Lokasi" value="{{ request('location') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-search"></i> Cari
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Tipe Pekerjaan</label>
                                    <div class="d-flex flex-wrap gap-3">
                                        @foreach($jobTypes as $type)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" 
                                                    name="job_type[]" value="{{ $type->id }}" 
                                                    id="type{{ $type->id }}"
                                                    {{ in_array($type->id, request('job_type', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="type{{ $type->id }}">
                                                    {{ $type->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        @forelse ($jobs as $job)
                            <div class="col-md-6 mb-4">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $job->title }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $job->company->name ?? 'Perusahaan tidak ditemukan' }}</h6>
                                        
                                        <div class="mb-3">
                                            <p class="card-text mb-1">
                                                <i class="fas fa-map-marker-alt text-secondary"></i> 
                                                {{ $job->company->city->name ?? 'Lokasi tidak tersedia' }}
                                            </p>
                                            <p class="card-text mb-1">
                                                <i class="fas fa-briefcase text-secondary"></i> 
                                                {{ $job->jobType->name ?? 'Tipe tidak tersedia' }}
                                            </p>
                                            <p class="card-text">
                                                <i class="fas fa-money-bill-wave text-secondary"></i> 
                                                {{ $job->formatted_salary_range }}
                                            </p>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-muted">
                                                Diposting {{ $job->created_at->diffForHumans() }}
                                            </small>
                                            <div class="mt-2">
                                                <a href="{{ route('jobs.public.show', $job) }}" class="btn btn-primary btn-sm">
                                                    Lihat Detail
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-info text-center">
                                    Tidak ada lowongan yang sesuai dengan kriteria pencarian Anda.
                                </div>
                            </div>
                        @endforelse
                    </div>

                    @if($jobs->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $jobs->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.card {
    transition: transform 0.2s;
}
.card:hover {
    transform: translateY(-5px);
}
</style>
@endpush

@endsection