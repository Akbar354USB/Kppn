@extends('master')

@section('content')
    <h2>Indikator Pencapaian</h2>

    <div class="card card-body container-fluid mb-2">

        {{-- <table class="table table-bordered" style="font-size: 14px;">
            <thead class="text-center font-weight-bold text-white">
                <tr style="background:#10608b;">
                    <th style="width: 60%;">Rencana Kerja</th>
                    <th style="width: 40%;">Bukti Dukung</th>
                </tr>
            </thead>

            <tbody>

                <!-- ========================= -->
                <!-- I. KATEGORI 1 -->
                <!-- ========================= -->
                <tr style="background:#d9ead3; font-weight:bold;">
                    <td colspan="2">I. Kategori 1</td>
                </tr>

                <!-- Sub Kategori 1 -->
                <tr style="background:#fce5cd; font-weight:bold;">
                    <td colspan="2">1. Sub Kategori 1</td>
                </tr>

                <!-- Item a + bukti -->
                <tr>
                    <td>a. Item 1</td>
                    <td>Bukti Dukung item 1</td>
                </tr>

                <!-- Item b + bukti -->
                <tr>
                    <td>b. Item 2</td>
                    <td>Bukti Dukung item 2</td>
                </tr>

                <!-- Sub Kategori 2 -->
                <tr style="background:#fce5cd; font-weight:bold;">
                    <td colspan="2">2. Sub Kategori 2</td>
                </tr>

                <tr>
                    <td>a. Item 1</td>
                    <td>
                        Bukti Dukung item 1<br>
                        Bukti Dukung item 1<br>
                        Bukti Dukung item 1
                    </td>
                </tr>


                <!-- ========================= -->
                <!-- II. KATEGORI 2 -->
                <!-- ========================= -->
                <tr style="background:#d9ead3; font-weight:bold;">
                    <td colspan="2">II. Kategori 2</td>
                </tr>

                <!-- Sub Kategori 1 -->
                <tr style="background:#fce5cd; font-weight:bold;">
                    <td colspan="2">1. Sub Kategori 1</td>
                </tr>

                <tr>
                    <td>a. Item 1</td>
                    <td>Bukti Dukung item 1</td>
                </tr>

                <tr>
                    <td>b. Item 2</td>
                    <td>Bukti Dukung item 2</td>
                </tr>

                <!-- Sub Kategori 2 -->
                <tr style="background:#fce5cd; font-weight:bold;">
                    <td colspan="2">2. Sub Kategori 2</td>
                </tr>

                <tr>
                    <td>a. Item 1</td>
                    <td>Bukti Dukung item 1</td>
                </tr>

                <!-- Sub Kategori 3 -->
                <tr style="background:#fce5cd; font-weight:bold;">
                    <td colspan="2">3. Sub Kategori 3</td>
                </tr>

                <tr>
                    <td>a. Item 1</td>
                    <td>Bukti Dukung item 1</td>
                </tr>

                <tr>
                    <td>b. Item 2</td>
                    <td>Bukti Dukung item 2</td>
                </tr>

                <tr>
                    <td>c. Item 3</td>
                    <td>Bukti Dukung item 3</td>
                </tr>

            </tbody>
        </table> --}}

        <table class="table table-bordered" style="font-size: 14px;">
            <thead class="text-center font-weight-bold text-white">
                <tr style="background:#10608b;">
                    <th style="width: 50%;">Rencana Kerja</th>
                    <th style="width: 30%;">Bukti Dukung</th>
                    <th style="width: 20%;">Action</th>
                </tr>
            </thead>

            <tbody>

                <!-- ========================= -->
                <!-- I. KATEGORI 1 -->
                <!-- ========================= -->
                <tr style="background:#bedfb2; font-weight:bold;">
                    <td colspan="3">II. Kategori 2</td>
                </tr>
                <!-- Sub Kategori 2 -->
                <tr style="background:#fce5cd; font-weight:bold;">
                    <td colspan="3">2. Sub Kategori 2</td>
                </tr>

                <tr>
                    <td>a. Item 1</td>
                    <td>
                        Bukti Dukung item 1<br>
                        Bukti Dukung item 1<br>
                        Bukti Dukung item 1
                    </td>
                    <td>cc</td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection
