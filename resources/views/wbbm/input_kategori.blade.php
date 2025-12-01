@extends('master')

@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Input Kategori Capaian WBBM</h1>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            {{-- Kolom 2 --}}
            <div class="col-md-4">
                @if (session('success_categories'))
                    <div class="alert alert-success alert-dismissible fade show " role="alert">
                        {{ session('success_categories') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">+ Kategori Rencana Kerja</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories-store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Tambah Kategori</label>
                                <input type="text" name="name"
                                    class="form-control @error('name', 'categories') is-invalid @enderror">
                                @error('name', 'categories')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Kolom 3 --}}
            <div class="col-md-4">
                @if (session('success_subcategories'))
                    <div class="alert alert-success alert-dismissible fade show " role="alert">
                        {{ session('success_subcategories') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">+ Point Rencana Kerja</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('subcategories-store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Tambah Point Kategori</label>
                                <input type="text" name="name"
                                    class="form-control @error('name', 'subcategories') is-invalid @enderror">
                                {{-- @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror --}}
                                @error('name', 'subcategories')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <select class="form-control  @error('categories_id', 'subcategories') is-invalid @enderror"
                                    name="categories_id" id="">
                                    <option label="Pilih Kategori"></option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('categories_id', 'subcategories')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>


            {{-- Kolom 3 --}}
            <div class="col-md-4">
                @if (session('success_items'))
                    <div class="alert alert-success alert-dismissible fade show " role="alert">
                        {{ session('success_items') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">+ Item Point Rencana Kerja</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('items-store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Tambah Item Point Kategori</label>
                                <input type="text" name="name"
                                    class="form-control @error('name', 'items') is-invalid @enderror">
                                {{-- @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror --}}
                                @error('name', 'items')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Jumlah Dokumen Wajib (Masukkan angka)</label>
                                <input type="number" name="required_document"
                                    class="form-control @error('required_document', 'items') is-invalid @enderror">
                                @error('required_document', 'items')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select class="form-control  @error('sub_categories_id', 'items') is-invalid @enderror"
                                    name="sub_categories_id" id="">
                                    <option label="Pilih Point Kategori"></option>
                                    @foreach ($subcategories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('sub_categories_id', 'items')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>


            {{-- Kolom 3 --}}
            <div class="col-md-4">
                @if (session('success_ItemDocument'))
                    <div class="alert alert-success alert-dismissible fade show " role="alert">
                        {{ session('success_ItemDocument') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">+ Nama Dokumen item Rencana Kerja</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('documentItem-store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Tambah Nama Dokumen Item</label>
                                <input type="text" name="document_name"
                                    class="form-control @error('document_name', 'itemdocuments') is-invalid @enderror">
                                @error('document_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                @error('document_name', 'itemdocuments')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select class="form-control  @error('item_id', 'itemdocuments') is-invalid @enderror"
                                    name="item_id" id="">
                                    <option label="Pilih Item Point Kategori"></option>
                                    @foreach ($items as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('item_id', 'itemdocuments')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection
