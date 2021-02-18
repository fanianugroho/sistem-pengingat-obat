@extends('layout.master')
@section('title')
Beranda
@endsection
@section('content')

<div class="row">
    <div class="col-3">
        <div class="card border-right">
            <div class="card-body">
                <a href="">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h1 class="text-dark mb-1 font-weight-medium">0</h1>

                            </div>
                            <h6 class="mb-0 text-dark">
                                <Table>Resep Baru</Table>
                            </h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="mb-0 text-dark"><i data-feather="check-circle"></i></span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card border-right">
            <div class="card-body">
                <a href="">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h1 class="text-dark mb-1 w-100 text-truncate font-weight-medium">0</h1>
                            <h6 class="mb-0 text-dark">Pasien Baru
                            </h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="mb-0 text-dark"><i data-feather="check-circle"></i></span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card border-right">
            <div class="card-body">
                <a href="">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h1 class="text-dark mb-1 font-weight-medium">{{$jumlahpasien}}</h1>
                            </div>
                            <h6 class="mb-0 text-dark">Jumlah Pasien
                            </h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-2">
                            <span class="mb-0 text-dark"><i data-feather="bar-chart-2"></i></span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card border-right">
            <div class="card-body">
                <a href="">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h1 class="text-dark mb-1 font-weight-medium">{{$jumlahobat}}</h1>
                            </div>
                            <h6 class="mb-0 text-dark">Jumlah Obat
                            </h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="mb-0 text-dark"><i data-feather="bar-chart-2"></i></span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Top 5 obat yang paling banyak digunakan</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Obat</th>
                            <th scope="col">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Paracetamol Tablet 10 mg</td>
                            <td>5</td>
                        
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Komik Sirup 10 ml</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Antimo Tablet 10 ml</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Paramex Tablet 20 mg</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Panadol Tablet 10 ml</td>
                            <td>1</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Top 5 obat yang paling banyak terjual</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Obat</th>
                            <th scope="col">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                            <th scope="row">1</th>
                            <td>Paracetamol Tablet 10 mg</td>
                            <td>101</td>
                        
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Komik Sirup 10 ml</td>
                            <td>67</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Panadol Tablet 10 ml</td>
                            <td>23</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Antimo Tablet 10 ml</td>
                            <td>2</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
