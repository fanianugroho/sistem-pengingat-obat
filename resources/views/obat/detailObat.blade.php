@extends('layout.master')
@section('title')
Detail Obat
@endsection
@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="card-body">
                        <h3 class="card-title-detailobat"> Detail Obat
                        </h3>
                        <div class="col-12 mt-4">
                            <!-- Card -->
                            <a href="{{route('obat.index')}}">
                                <button type="button" class="btn btn-primary btn-rounded float-left mb-4">
                                    <i class="fas fa-arrow-left"></i> Kembali</button>
                            </a>

                            <table id="table" class="table table-striped table-bordered no-wrap">
                                <tr>
                                    <th width="400">Kode Obat</th>
                                    <td width="20px">:</td>
                                    <td>{{$detailObat->kode_obat}}</td>
                                </tr>
                                <tr>
                                    <th>Nama Obat</th>
                                    <td>:</td>
                                    <td>{{$detailObat->nama_obat}}</td>
                                </tr>
                                <tr>
                                    <th>Sediaan</th>
                                    <td>:</td>
                                    <td>{{$detailObat->bentuk_obat->nama_bentuk}}</td>
                                </tr>
                                <tr>
                                    <th>Satuan</th>
                                    <td>:</td>
                                    <td>{{$detailObat->satuan}}</td>
                                </tr>
                                <tr>
                                    <th>Fungsi</th>
                                    <td>:</td>
                                    <td>
                                    @foreach ($detailObat->fungsi_obat as $item)
                                        {{$item->fungsi->nama_fungsi}},
                                    @endforeach
                                    </td>
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
                                    <td>
                                    @foreach ($detailObat->efek_samping_obat as $item)
                                        {{$item->efek_samping->nama_efek_samping}},
                                    @endforeach
                                    </td>
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


                            <!-- Card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
