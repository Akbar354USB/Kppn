@extends('master')

@section('content')
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-primary">Daftar Template Email</h5>
            </div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis</th>
                            <th>Judul Email</th>
                            <th>Update Terakhir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($templates as $template)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <span class="badge bg-info text-white">
                                        {{ ucfirst($template->type) }}
                                    </span>
                                </td>
                                <td>{{ $template->title }}</td>
                                <td>{{ $template->updated_at->format('d-m-Y H:i') }}</td>

                                <td>
                                    <a href="{{ route('templates.edit', $template->id) }}" class="btn btn-sm btn-primary">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>

    </div>
@endsection
