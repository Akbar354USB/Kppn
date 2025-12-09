@extends('master')

@section('content')
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <a href="{{ route('recipients.create') }}" class="btn btn-primary mb-3">Tambah Penerima</a>
        <div class="card card-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th style="text-align: center">Dibuat Pada</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($recipients as $r)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $r->name }}</td>
                            <td>{{ $r->email }}</td>
                            <td style="text-align: center">{{ $r->created_at->format('d-m-Y H:i') }}</td>
                            <td width="150">
                                <a href="{{ route('recipients.edit', $r->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('recipients.destroy', $r->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Belum ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $recipients->links() }}
        </div>
    </div>
@endsection
