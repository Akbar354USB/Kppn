@extends('master')

@section('content')
    <div class="card">
               <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="m-0 font-weight-bold text-primary">Resepsionis - Daftar Terima Tamu</h5>
        </div>
    <div class="card-body">
 
                  <form>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Nama Tamu</label>
                      <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Nomor HP</label>
                      <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Nama Instansi/Satker</label>
                      <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Tujuan</label>
                      <input type="text" class="form-control">
                    </div> 
                    <div class="form-group">
                      <label>Pegawai Yang Ingin Ditemui</label>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                        <label class="custom-control-label" for="customCheck2">Pegawai 1</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                        <label class="custom-control-label" for="customCheck3">Pegawai 2php</label>
                      </div>
                    </div>
                  </form>
                </div>
</div>
@endsection
