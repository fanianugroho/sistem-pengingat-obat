@extends('layout.master')
@section('title')
Beranda
@endsection
@section('content')

<div class="row">
    <div class="col-3">
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h1 class="text-dark mb-1 font-weight-medium">{{$resepbaru}}</h1>
                        </div>
                        <h6 class="mb-0 text-dark">
                            <Table>Resep Baru <b>{{Carbon\Carbon::parse($today)->locale('id_ID')->isoFormat('LL')}} </b>
                            </Table>
                        </h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="mb-0 text-dark"><i data-feather="check-circle"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <h1 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{$pasienbaru}}</h1>
                        <h6 class="mb-0 text-dark">Pasien Baru
                            <b>{{Carbon\Carbon::parse($today)->locale('id_ID')->isoFormat('LL')}} </b>
                        </h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="mb-0 text-dark"><i data-feather="check-circle"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card border-right">
            <div class="card-body">
                <a href="{{route('pasien.index')}}">
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
                <a href="{{route('obat.index')}}">
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
                <h4 class="card-title">Top 5 Obat yang paling banyak digunakan</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <!-- <th scope="col">No</th> -->
                            <th scope="col">Nama Obat</th>
                            <th scope="col">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($obatResep as $value)
                        <tr>
                            <!-- <th scope="row">{{ $value->id_obat}}</th> -->
                            <th scope="row">{{ $value->nama_obat}}</th>
                            <th scope="row">{{ $value->total_obat}}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Grafik jumlah Resep baru</h4>
                <div>
                    <canvas id="bar-chart" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
$(function () {
	new Chart(document.getElementById("bar-chart"), {
		type: 'bar',
		data: {
        labels: {!!json_encode($thisRange)!!},
		datasets: [
			{
			label: "Resep baru",
            backgroundColor: [ 'rgba(97, 116, 213)',
            'rgba(97, 116, 213)',
            'rgba(97, 116, 213)',
            'rgba(97, 116, 213)',
            'rgba(97, 116, 213)',
            'rgba(97, 116, 213)',
            'rgba(97, 116, 213)',],
            borderWidth: 1,
			  data: {!!json_encode($total)!!}
			}
		  ]
		},
		options: {
		  legend: { display: false },
		  title: {
			display: true, 
		  }
		}
	});
});
</script>
@endpush