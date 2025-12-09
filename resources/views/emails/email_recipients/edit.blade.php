@extends('master')

@section('content')
    <div class="container">
        <h3>Edit Penerima Email</h3>

        <form action="{{ route('recipients.update', $recipient->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $recipient->name) }}" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $recipient->email) }}"
                    required>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('recipients.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
