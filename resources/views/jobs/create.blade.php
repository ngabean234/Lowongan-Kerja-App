@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posting Lowongan Baru</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('jobs.store') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name">Nama Pekerjaan</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="name" name="name" value="{{ old('name') }}"
                                placeholder="Contoh: Senior Web Developer" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="type_id">Tipe Pekerjaan</label>
                            <select class="form-control @error('type_id') is-invalid @enderror" id="type_id" name="type_id" required>
                                <option value="">Pilih Tipe Pekerjaan</option>
                                @foreach($jobTypes as $type)
                                    <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('type_id')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="min_salary">Gaji Minimum</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="text" class="form-control salary-input @error('min_salary') is-invalid @enderror"
                                            id="min_salary" name="min_salary" value="{{ old('min_salary') }}"
                                            placeholder="Contoh: 5.000.000" required>
                                    </div>
                                    @error('min_salary')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="max_salary">Gaji Maksimum</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="text" class="form-control salary-input @error('max_salary') is-invalid @enderror"
                                            id="max_salary" name="max_salary" value="{{ old('max_salary') }}"
                                            placeholder="Contoh: 8.000.000" required>
                                    </div>
                                    @error('max_salary')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Deskripsi Pekerjaan</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                id="description" name="description" rows="4" required
                                placeholder="Jelaskan tanggung jawab dan tugas-tugas dalam pekerjaan ini">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="requirement">Persyaratan</label>
                            <textarea class="form-control @error('requirement') is-invalid @enderror"
                                id="requirement" name="requirement" rows="4" required
                                placeholder="Tuliskan kualifikasi dan persyaratan yang dibutuhkan">{{ old('requirement') }}</textarea>
                            @error('requirement')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('company.dashboard') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const salaryInputs = document.querySelectorAll('.salary-input');

    function formatRupiah(angka) {
        let number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        return split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    }

    salaryInputs.forEach(function(input) {
        input.addEventListener('input', function(e) {
            let cursorPos = this.selectionStart;
            let value = this.value;
            let length = value.length;

            value = formatRupiah(value);

            this.value = value;

            if(value.length !== length) {
                cursorPos = cursorPos + (value.length - length);
            }

            this.setSelectionRange(cursorPos, cursorPos);
        });
    });
});
</script>
@endpush

@endsection
