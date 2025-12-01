@extends('master')

@section('css')
    <style>
        .rotate {
            transform: rotate(180deg);
            transition: 0.3s;
        }

        .rotate-icon {
            transition: 0.3s;
        }
    </style>
@endsection
@section('content')
    <div class="container mt-4">

        <h3 class="mb-4">Monitor Parameter Pencapaian WBBM</h3>


        {{-- <!DOCTYPE html>
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
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
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

        </html> --}}
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
    </div>

    <div class="container-fluid">
        @foreach ($categories as $key => $kategori)
            <div class="card p-3 mb-2">
                <div class="d-flex justify-content-between align-items-center" data-toggle="collapse"
                    data-target="#menu-{{ $kategori->id }}" style="cursor: pointer;">
                    <div class="d-flex align-items-center ">
                        <div class="bg-primary text-white d-flex justify-content-center align-items-center"
                            style="width: 28px; height: 28px; border-radius: 6px;">
                            {{ $key + 1 }}
                        </div>
                        <div class="ml-3 font-weight">{{ $kategori->name }}</div>
                    </div>
                    {{-- <div class="ml-auto">
                        <form action="" method="post" style="display: inline" class="form-check-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                        </form>
                    </div> --}}
                    <!-- Panah -->
                    <i class="fas fa-chevron-down rotate-icon" data-target="#icon-{{ $kategori->id }}"></i>
                </div>
                <div id="menu-{{ $kategori->id }}" class="collapse mt-2">
                    <div class="ml-3">
                        <h6>Progress : 75%</h6>
                    </div>
                    <div class="progress ml-3 mr-5 mt-2 mb-3">
                        <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100">75%</div>
                    </div>

                    {{-- //subkategori --}}
                    @foreach ($kategori->sub_categories as $sub)
                        <div class="card p-3 mb-1">
                            <div class="d-flex justify-content-between align-items-center" data-toggle="collapse"
                                data-target="#sub-{{ $sub->id }}" style="cursor: pointer;">

                                <div class="d-flex align-items-center ">
                                    <div class="ml-3 font-weight">{{ $loop->iteration }}. {{ $sub->name }} </div>
                                </div>

                                <div class="ml-auto">
                                    {{-- <form action="" method="post" style="display: inline" class="form-check-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                    </form> --}}

                                    {{-- <button class="btn btn-danger btn-sm delete-upload mr-2">
                                        Hapus
                                    </button> --}}
                                </div>

                                <!-- Panah -->
                                <i class="fas fa-chevron-down rotate-icon" id="iconsub-{{ $sub->id }}"></i>
                            </div>

                            <div id="sub-{{ $sub->id }}" class="collapse mt-2">
                                {{-- item --}}
                                @foreach ($sub->items as $item)
                                    <div class="card p-3">
                                        <div class="d-flex justify-content-between align-items-center"
                                            data-toggle="collapse" data-target="#subitem-{{ $item->id }}"
                                            style="cursor: pointer;">
                                            @php
                                                $huruf = range('a', 'z'); // menghasilkan: a, b, c, ... z
                                            @endphp
                                            <div class="d-flex align-items-center ">
                                                <div class="ml-3 font-weight">{{ $huruf[$loop->index] }}.
                                                    {{ $item->name }}</div>
                                            </div>
                                            <div class="ml-auto">
                                                {{-- <form action="" method="post" style="display: inline"
                                                    class="form-check-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit"><i
                                                            class="fas fa-trash"></i></button>
                                                </form> --}}
                                            </div>

                                            <!-- Panah -->
                                            <i class="fas fa-chevron-down rotate-icon"
                                                id="iconsubitem-{{ $item->id }}"></i>
                                        </div>

                                        <!-- COLLAPSE ITEM -->
                                        <div id="subitem-{{ $item->id }}" class="collapse mt-2">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Dokumen</th>
                                                        <th>Status</th>
                                                        <th>Upload</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($item->item_documents as $dok)
                                                        <tr>
                                                            <td>{{ $dok->document_name }}</td>

                                                            {{-- Status Upload --}}
                                                            <td id="status-{{ $dok->id }}">
                                                                @if ($dok->upload)
                                                                    <a href="{{ asset('storage/' . $dok->upload->file_path) }}"
                                                                        target="_blank" class="btn btn-success btn-sm mb-2">
                                                                        📄 Lihat File
                                                                    </a>

                                                                    <button class="btn btn-danger btn-sm delete-upload"
                                                                        data-upload-id="{{ $dok->upload->id }}"
                                                                        data-doc-id="{{ $dok->id }}">
                                                                        Hapus
                                                                    </button>
                                                                @else
                                                                    <span class="text-danger">❌ Belum Upload</span>
                                                                @endif
                                                            </td>


                                                            {{-- Form Upload --}}
                                                            <td>
                                                                {{-- Tampil tombol lihat jika ada file --}}
                                                                <form class="ajax-upload" data-id="{{ $dok->id }}"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="file" name="file"
                                                                        class="form-control form-control-sm mb-2" required>
                                                                    <button type="submit"
                                                                        class="btn btn-primary btn-sm">Upload</button>

                                                                    <div class="upload-status mt-1"></div>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- item --}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('js')
    <script>
        // ===============================
        // 1. HANDLE KATEGORI COLLAPSE
        // ===============================

        // Jika salah satu kategori dibuka
        $('[id^="sub-"]').on('show.bs.collapse', function() {
            // Tutup kategori lain
            $('[id^="sub-"]').not(this).collapse('hide');

            // Aktifkan rotate icon untuk kategori yang dibuka
            $(this)
                .prev() // ambil header card
                .find('.rotate-icon') // cari icon di header itu
                .addClass('rotate');
        });

        // Jika kategori ditutup
        $('[id^="sub-"]').on('hide.bs.collapse', function() {
            $(this)
                .prev()
                .find('.rotate-icon')
                .removeClass('rotate');
        });



        // ======================================
        // 2. HANDLE SUB-KATEGORI COLLAPSE
        // ======================================

        $('[id^="subitem-"]').on('show.bs.collapse', function() {
            // Tutup item lain di level yang sama
            $('[id^="subitem-"]').not(this).collapse('hide');

            // Putar icon item
            $(this)
                .prev()
                .find('.rotate-icon')
                .addClass('rotate');
        });

        $('[id^="subitem-"]').on('hide.bs.collapse', function() {
            $(this)
                .prev()
                .find('.rotate-icon')
                .removeClass('rotate');
        });

        // ======================================
        // 2. HANDLE item COLLAPSE
        // ======================================

        $('[id^="subitem-"]').on('show.bs.collapse', function() {
            // Tutup item lain di level yang sama
            $('[id^="subitem-"]').not(this).collapse('hide');

            // Putar icon item
            $(this)
                .prev()
                .find('.rotate-icon')
                .addClass('rotate');
        });

        $('[id^="subitem-"]').on('hide.bs.collapse', function() {
            $(this)
                .prev()
                .find('.rotate-icon')
                .removeClass('rotate');
        });
    </script>
    <script>
        document.querySelectorAll('.ajax-upload').forEach(form => {

            form.addEventListener('submit', async function(e) {
                e.preventDefault(); // cegah reload

                const id = this.dataset.id;
                const statusBox = this.querySelector('.upload-status');

                let formData = new FormData(this);
                formData.append('item_documents_id', id);

                statusBox.innerHTML = '<span class="text-info">Mengupload...</span>';

                try {
                    const response = await fetch("{{ route('upload.store') }}", {
                        method: "POST",
                        body: formData
                    });

                    const result = await response.json();

                    if (result.success) {
                        statusBox.innerHTML = `<span class="text-success">✔ Berhasil upload</span>`;

                        // Update tampilan status tanpa reload
                        const cell = document.querySelector(`#status-${id}`);
                        if (cell) {
                            cell.innerHTML =
                                `<a href="${result.file_url}" target="_blank">📄 Lihat File</a>`;
                        }
                    } else {
                        statusBox.innerHTML = `<span class="text-danger">Gagal upload</span>`;
                    }

                } catch (error) {
                    statusBox.innerHTML = `<span class="text-danger">Error saat upload</span>`;
                }
            });

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
