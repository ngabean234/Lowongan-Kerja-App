@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header bg-light d-flex justify-content-between align-items-center py-3">
                    <h5 class="mb-0 fw-semibold">
                        <i class="bi bi-building me-2 text-primary"></i>{{ __('Profil Perusahaan') }}
                    </h5>
                    
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('company.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4 text-center">
                            @if($company->company_logo)
                                <div class="position-relative d-inline-block">
                                    <div class="logo-container bg-white rounded-3 p-3 shadow-sm d-inline-flex align-items-center justify-content-center" style="width: 180px; height: 180px;">
                                        <img src="{{ asset('company/' . $company->company_logo) }}"
                                            alt="Logo {{ $company->name }}"
                                            class="img-fluid" style="max-width: 100%; max-height: 150px; object-fit: contain;">
                                    </div>
                                </div>
                            @else
                                <div class="logo-container bg-light rounded-3 p-3 shadow-sm d-inline-flex align-items-center justify-content-center" style="width: 180px; height: 180px;">
                                    <div class="text-center">
                                        <i class="bi bi-building text-secondary mb-2" style="font-size: 3.5rem;"></i>
                                        <p class="text-muted mb-0 small">Belum ada logo</p>
                                    </div>
                                </div>
                            @endif
                            <p class="text-muted small mt-2">
                                <i class="bi bi-info-circle me-1"></i> Format logo: PNG, JPG (rasio 1:1 direkomendasikan)
                            </p>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="name" class="form-label fw-medium">
                                    <i class="bi bi-building-fill me-1 text-primary"></i>{{ __('Nama Perusahaan') }}
                                </label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name', $company->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="city_id" class="form-label fw-medium">
                                    <i class="bi bi-geo-alt-fill me-1 text-primary"></i>{{ __('Kota') }}
                                </label>
                                <select id="city_id" class="form-select @error('city_id') is-invalid @enderror"
                                    name="city_id" required>
                                    <option value="">Pilih Kota</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}"
                                            {{ old('city_id', $company->city_id) == $city->id ? 'selected' : '' }}>
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('city_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label fw-medium">
                                <i class="bi bi-pin-map-fill me-1 text-primary"></i>{{ __('Alamat Lengkap') }}
                            </label>
                            <textarea id="address" class="form-control @error('address') is-invalid @enderror"
                                name="address" rows="3" required>{{ old('address', $company->address) }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="telephone" class="form-label fw-medium">
                                <i class="bi bi-telephone-fill me-1 text-primary"></i>{{ __('Nomor Telepon') }}
                            </label>
                            <input id="telephone" type="text"
                                class="form-control @error('telephone') is-invalid @enderror"
                                name="telephone" value="{{ old('telephone', $company->telephone) }}" required>
                            @error('telephone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="company_logo" class="form-label fw-medium">
                                <i class="bi bi-image me-1 text-primary"></i>{{ __('Logo Perusahaan') }}
                            </label>
                            <div class="input-group">
                                <input type="file" class="form-control @error('company_logo') is-invalid @enderror"
                                    id="company_logo" name="company_logo">
                                <span class="input-group-text">
                                    <i class="bi bi-upload"></i>
                                </span>
                            </div>
                            <div class="form-text text-muted">
                                <i class="bi bi-info-circle me-1"></i>Format: JPG, JPEG, PNG (maks. 2MB)
                            </div>
                            @error('company_logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4 pt-2 border-top">
                            <a href="{{ route('company.dashboard') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-x-circle me-1"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check2-circle me-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.card {
    border: none;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0,0,0,0.05);
}
.card-header {
    border-bottom: 1px solid rgba(0,0,0,0.05);
    border-radius: 8px 8px 0 0 !important;
}
.form-control, .form-select {
    padding: 0.6rem 0.85rem;
    border-radius: 6px;
}
.form-control:focus, .form-select:focus {
    border-color: #4a90e2;
    box-shadow: 0 0 0 0.25rem rgba(74, 144, 226, 0.15);
}
.btn {
    padding: 0.6rem 1.2rem;
    border-radius: 6px;
}
.btn-outline-secondary {
    border-color: #dee2e6;
}
.input-group-text {
    background-color: #f8f9fa;
    border-color: #dee2e6;
}
</style>
@endpush
@endsection
