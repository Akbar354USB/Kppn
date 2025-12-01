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
        <h3 class="mb-4">Monitor Indikator Pencapaian WBBM</h3>
    </div>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
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
                    <!-- Panah -->
                    <i class="fas fa-chevron-down rotate-icon" data-target="#icon-{{ $kategori->id }}"></i>
                </div>
                <div id="menu-{{ $kategori->id }}" class="collapse mt-2">
                    <div class="ml-3">
                        <span><strong>Progress : {{ $kategori->progress() }}%</strong></span>
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

                                                                    <form
                                                                        action="{{ route('document-delete', $dok->upload->id) }}"
                                                                        method="post" style="display: inline"
                                                                        class="form-check-inline">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn btn-danger btn-sm delete-upload"
                                                                            data-upload-id="{{ $dok->upload->id }}"
                                                                            data-doc-id="{{ $dok->id }}">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form>
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
