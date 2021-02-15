@extends('layout.master')
@section('title')
Pasien
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> Buat Resep
                </h4>
                <div class="row">
                    <div class="col-12 mt-4">
                        <div class="card-header">
                            Data Pasien untuk Resep Obat
                        </div>
                        <!-- Card -->
                        <div class="card">
                            <div class="card-body">
                                <table id="table" class="table table-striped table-bordered no-wrap">
                                    <tr >
                                        <th width="400">No RM</th>
                                        <td width="20px">:</td>
                                        <td>{{$detailPasien->no_rm}}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <td>:</td>
                                        <td>{{$detailPasien->nama_pasien}}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td>:</td>
                                        <td>{{$detailPasien->jenis_kelamin}}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Lahir</th>
                                        <td>:</td>
                                        <td>{{$detailPasien->tanggal_lahir}}</td>
                                    </tr>
                                    <tr>
                                        <th>No Telepon</th>
                                        <td>:</td>
                                        <td>{{$detailPasien->no_telp}}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>:</td>
                                        <td>{{$detailPasien->alamat}}</td>
                                    </tr>

                                </table>
                                <div class="modal-footer">
                                    <a href="{{route('resep.index')}}"><button type="button" class="btn btn-light"
                                            data-dismiss="modal">Batal</button></a>
                                    <a href="{{route('tambahresep')}}" class="btn btn-primary">Lanjutkan</a>
                                </div>

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

