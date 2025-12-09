@extends('master')

@section('content')
    <div class="container">
        <h3>Tambah Penerima Email</h3>

        <form action="{{ route('recipients.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('recipients.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
