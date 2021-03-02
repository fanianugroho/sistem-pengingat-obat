@extends('layout.master')
@section('title')
Pasien
@endsection
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- basic table -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> Riwayat Resep
                    </h4>
                    <div class="table-responsive">
                        <table id="table" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Resep</th>
                                    <th>No Resep</th>
                                    <th>Nama Pasien</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>Jumlah Obat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item, index in mainData" :key="index">
                                    <td>@{{ index+1 }}</td>
                                    <td>@{{ item.tgl_resep == 'null' ? '' : item.tgl_resep}}</td>
                                    <td>@{{ item.no_resep == 'null' ? '' : item.no_resep}}</td>
                                    <td>@{{ item.nama_pasien == 'null' ? '' : item.nama_pasien}}</td>
                                    <td>@{{ item.tanggal_lahir == 'null' ? '' : item.tanggal_lahir}}</td>
                                    <td>@{{ item.alamat == 'null' ? '' : item.alamat}}</td>
                                    <td>@{{ item.jml_obat == 'null' ? '' : item.jml_obat}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"
    integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA=="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    function selectTrigger() {
        app.inputSelect()
    }

    var app = new Vue({
        el: '#app',
        data: {
            mainData: [],
            editMode: false,
            form: new Form({
                id: '',
                id_pasien: '',
                id_obat: '',
            }),
        },
        mounted() {
            $('#table').DataTable()
            this.refreshData()
            $('[data-fancybox]').fancybox({
                iframe: {
                    preload: false
                }
            })

        },
        methods: {
            getUrl(id) {
                sessionStorage.setItem("id_obat_resep", id);
                url = "/detailResep/" + id
                return url
            },
            refreshData() {
                axios.get("{{ route('riwayatresep.all') }}")
                    .then(response => {
                        $('#table').DataTable().destroy();
                        let dataPasien = response.data;
                        const datas = dataPasien.map( data => ({
                            tgl_resep: moment(data.resep.created_at).locale('id').format('DD MMMM YYYY'),
                            tanggal_lahir: moment(data.resep.pasien.tanggal_lahir).locale('id').format('DD MMMM YYYY'),
                            tanggal_lahir_edit : data.resep.pasien.tanggal_lahir,
                            nama_pasien: data.resep.pasien.nama_pasien,
                            no_resep:data.resep.no_resep,
                            jml_obat:data.resep.jml_obat,
                            alamat:data.resep.pasien.alamat,
                        }));
                        this.mainData = datas
                        this.$nextTick(function () {
                            $('#table').DataTable();
                        })
                    })
                    .catch(e => {
                        e.response.status != 422 ? console.log(e) : '';
                    })
            }
        },
    })

</script>
@endpush
