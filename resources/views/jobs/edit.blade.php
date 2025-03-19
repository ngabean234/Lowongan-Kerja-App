@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 py-4">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header bg-light d-flex justify-content-between align-items-center py-3">
                    <h5 class="mb-0 fw-semibold">
                        <i class="bi bi-pencil-square me-2 text-primary"></i>{{ __('Edit Lowongan') }}
                    </h5>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('jobs.update', $job) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="form-label fw-medium">
                                <i class="bi bi-briefcase-fill me-1 text-primary small"></i>{{ __('Judul Pekerjaan') }}
                            </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $job->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="type_id" class="form-label fw-medium">
                                    <i class="bi bi-tags-fill me-1 text-primary small"></i>{{ __('Tipe Pekerjaan') }}
                                </label>
                                <select class="form-select @error('type_id') is-invalid @enderror" id="type_id" name="type_id" required>
                                    <option value="">{{ __('Pilih Tipe Pekerjaan') }}</option>
                                    @foreach($jobTypes as $type)
                                        <option value="{{ $type->id }}" {{ old('type_id', $job->type_id) == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="city_id" class="form-label fw-medium">
                                    <i class="bi bi-geo-alt-fill me-1 text-primary small"></i>{{ __('Lokasi') }}
                                </label>
                                <select class="form-select @error('city_id') is-invalid @enderror" id="city_id" name="city_id" required>
                                    <option value="">{{ __('Pilih Lokasi') }}</option>
                                    @foreach($cities ?? [] as $city)
                                        <option value="{{ $city->id }}" {{ old('city_id', $job->city_id) == $city->id ? 'selected' : '' }}>
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('city_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="card bg-light border-0 p-3 mb-4">
                            <div class="card-body p-0">
                                <h6 class="fw-semibold mb-3">
                                    <i class="bi bi-cash-coin me-2 text-primary"></i>{{ __('Informasi Gaji') }}
                                </h6>
                                <div class="row">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label for="min_salary" class="form-label fw-medium">{{ __('Gaji Minimum') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="text" class="form-control @error('min_salary') is-invalid @enderror" id="min_salary" name="min_salary" value="{{ old('min_salary', $job->min_salary) }}" placeholder="Contoh: 5000000" required>
                                        </div>
                                        @error('min_salary')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="max_salary" class="form-label fw-medium">{{ __('Gaji Maksimum') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="text" class="form-control @error('max_salary') is-invalid @enderror" id="max_salary" name="max_salary" value="{{ old('max_salary', $job->max_salary) }}" placeholder="Contoh: 8000000" required>
                                        </div>
                                        @error('max_salary')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label fw-medium">
                                <i class="bi bi-file-text me-1 text-primary small"></i>{{ __('Deskripsi Pekerjaan') }}
                            </label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" placeholder="Jelaskan tugas dan tanggung jawab posisi ini" required>{{ old('description', $job->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="requirement" class="form-label fw-medium">
                                <i class="bi bi-check-circle me-1 text-primary small"></i>{{ __('Persyaratan') }}
                            </label>
                            <textarea class="form-control @error('requirement') is-invalid @enderror" id="requirement" name="requirement" rows="5" placeholder="Jelaskan kualifikasi yang dibutuhkan" required>{{ old('requirement', $job->requirement) }}</textarea>
                            @error('requirement')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('company.dashboard') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-1"></i>{{ __('Kembali') }}
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i>{{ __('Simpan Perubahan') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection