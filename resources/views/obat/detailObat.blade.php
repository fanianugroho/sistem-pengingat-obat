@extends('layout.master')
@section('title')
Detail Obat
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title"> Detail Obat
                </h4>
                <div class="row">


                    <div class="col-12 mt-4">
                        <!-- Card -->

                        <div class="card">
                            <div class="card-body">
                                <a href="{{route('obat.index')}}">
                                    <button type="button" class="btn btn-primary btn-rounded float-left mb-4">
                                        <i class="fas fa-arrow-left"></i> Kembali</button>
                                </a>
                                <table id="table" class="table table-striped table-bordered no-wrap">
                                    <tr>
                                        <th width="400">Kode Obat</th>
                                        <td width="20px">:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Obat</th>
                                        <td>:</td>
                                        <td>{{$detailObat->nama_obat}}</td>
                                    </tr>
                                    <tr>
                                        <th>Kesediaan Obat</th>
                                        <td>:</td>
                                        <td>{{$detailObat->kesediaan}}</td>
                                    </tr>
                                    <tr>
                                        <th>Satuan</th>
                                        <td>:</td>
                                        <td>{{$detailObat->satuan}}</td>
                                    </tr>
                                    <tr>
                                        <th>Kontraindikasi Obat</th>
                                        <td>:</td>
                                        <td>{{$detailObat->kontraindikasi_obat->nama_kontraindikasi}}</td>
                                    </tr>
                                    <tr>
                                        <th>Interaksi Obat</th>
                                        <td>:</td>
                                        <td>{{$detailObat->interaksi_obat->nama_interaksi}}</td>
                                    </tr>
                                    <tr>
                                        <th>Efek Samping</th>
                                        <td>:</td>
                                        <td>{{$detailObat->efek_samping}}</td>
                                    </tr>
                                    <tr>
                                        <th>Petunjuk Penyimpanan</th>
                                        <td>:</td>
                                        <td>{{$detailObat->petunjuk_penyimpanan}}</td>
                                    </tr>
                                    <tr>
                                        <th>Pola Makan</th>
                                        <td>:</td>
                                        <td>{{$detailObat->pola_makan}}</td>
                                    </tr>
                                    <tr>
                                        <th>Informasi</th>
                                        <td>:</td>
                                        <td>{{$detailObat->informasi}}</td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                        <!-- Card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
