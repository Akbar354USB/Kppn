@extends('master')

@section('css')
    <style>
        .rotate-icon {
            transition: transform 0.3s ease;
        }
        .rotate-icon.rotate {
            transform: rotate(180deg);
        }
    </style>
@endsection
@section('content')

<div class="container mt-4">

    <h3 class="mb-4">Form Upload Dokumen</h3>
{{-- 
    <div class="accordion" id="kategoriAccordion">

        @foreach ($categories as $kategori)

        <h2 class="accordion-header" id="heading{{ $kategori->id }}">
        <button class="accordion-button collapsed">
            <strong>{{ $kategori->name }}</strong>
        </button>

        <p><strong>Progress: {{ $kategori->progress() }}%</strong></p>

        <div class="progress mb-3">
            <div class="progress-bar" style="width: {{ $kategori->progress() }}%">
                {{ $kategori->progress() }}%
            </div>
        </div>

        @foreach ($kategori->sub_categories as $sub)

            @foreach ($sub->items as $item)

                @foreach ($item->item_documents as $dok)

                    @if ($dok->uploads)
                        ✔ sudah upload
                    @else
                        ❌ belum upload
                    @endif

                @endforeach
            @endforeach
        @endforeach
        @endforeach
    </div> --}}
    <ul class="card card-body" id="accordionSidebar">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
            aria-controls="collapseTable">
            <i class="fas fa-fw fa-table"></i>
            <span>WBBM</span>
            </a>
            <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">WBBM</h6>
                <a class="collapse-item" href="{{ route('wbbm-create') }}">Input Kategori</a>
                <a class="collapse-item" href="{{ route('wbbm-monitor') }}">Monitor Pencapaian</a>
            </div>
            </div>
        </li>
    </ul>
</div>

<div class="container-fluid">
    <div class="card p-3">
        <div class="d-flex justify-content-between align-items-center"
            data-toggle="collapse" data-target="#menuWBBM" style="cursor: pointer;">
            <div>
                <i class="fas fa-fw fa-table"></i>
                <span class="ml-2 collapse-header">asbas</span>
            </div>

            <!-- Panah -->
            <i class="fas fa-chevron-down rotate-icon" id="iconWBBM"></i>
        </div>

        <div id="menuWBBM" class="collapse mt-2">
            <div class="list-group">
                <a href="{{ route('wbbm-create') }}" class="list-group-item list-group-item-action">
                    Input Kategori
                </a>
                <a href="{{ route('wbbm-monitor') }}" class="list-group-item list-group-item-action">
                    Monitor Pencapaian
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script>
    $('#menuWBBM').on('show.bs.collapse', function () {
        $('#iconWBBM').addClass('rotate');
    });

    $('#menuWBBM').on('hide.bs.collapse', function () {
        $('#iconWBBM').removeClass('rotate');
    });
</script>
@endsection



{{-- @extends('master')

@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Monitor Pencapaian WBBM</h1>
    </div>
</div>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Upload Dokumen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">
    <div class="accordion" id="kategoriAccordion">

        <div class="accordion-item mb-3">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#kategori1">
                    <strong>Kategori 1: Administrasi</strong>
                </button>
            </h2>

            <div id="kategori1" class="accordion-collapse collapse">
                <div class="accordion-body">

                    <!-- Progress -->
                    <p><strong>Progress: 45%</strong></p>
                    <div class="progress mb-3">
                        <div class="progress-bar" style="width: 45%">45%</div>
                    </div>

                    <!-- Sub Kategori 1 -->
                    <div class="card mb-3">
                        <div class="card-header bg-light">
                            <strong>▼ Sub Kategori: Dokumen Identitas</strong>
                        </div>

                        <div class="card-body">

                            <!-- Item: KTP Pegawai -->
                            <div class="mb-4">
                                <h6><strong>Item: KTP Pegawai</strong></h6>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Dokumen</th>
                                            <th>Status</th>
                                            <th>Upload</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>KTP Asli</td>
                                            <td><span class="text-danger">❌ Belum Upload</span></td>
                                            <td>
                                                <input type="file" class="form-control form-control-sm mb-2">
                                                <button class="btn btn-primary btn-sm">Upload</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@endsection




 --}}
