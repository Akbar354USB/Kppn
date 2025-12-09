@extends('master')

@section('content')
    <div class="container-fluid">

        <div class="card shadow mb-4">

            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="m-0 font-weight-bold text-primary">
                    Edit Template Email ({{ ucfirst($template->type) }})
                </h5>
                <a href="{{ route('templates.index') }}" class="btn btn-secondary btn-sm">
                    Kembali
                </a>
            </div>

            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('templates.update', $template->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Title --}}
                    <div class="form-group mb-3">
                        <label>Judul Email</label>
                        <input type="text" name="title" class="form-control" value="{{ $template->title }}" required>
                    </div>

                    {{-- Body --}}
                    <div class="form-group mb-3">
                        <label>Isi Pesan Email</label>
                        <textarea name="body" class="form-control" rows="8" required>{{ $template->body }}</textarea>

                        <small class="text-muted">
                            Anda dapat menggunakan variabel:
                            <br> <b>{{ '{name}' }}</b> = Nama Pegawai
                            <br> <b>{{ '{type}' }}</b> = Jenis absen (datang/pulang)
                        </small>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Simpan Perubahan
                    </button>
                </form>

            </div>
        </div>

    </div>
@endsection
