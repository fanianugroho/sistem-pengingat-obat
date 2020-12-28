@extends('layout.master')
@section('title')
Buat Resep
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

                    <h4 class="card-title">
                        <button type="button" class="btn btn-primary btn-rounded float-left mb-"
                            @click="createModal()"><i class="fas fa-plus-circle"></i> Tambah Obat </button>
                    </h4>
                    <div class="table-responsive">
                        <table id="table" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Obat</th>
                                    <th>Aturan Pakai</th>
                                    <th>Waktu Minum</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item, index in mainData" :key="index">
                                    <td>@{{ index+1 }}</td>
                                    <td>@{{ item.nama_obat.nama_obat == 'null' ? '' : item.nama_obat.nama_obat}}</td>
                                    <td>@{{ item.aturan_pakai == 'null' ? '' : item.aturan_pakai}}</td>
                                    <td>@{{ item.waktu_minum == 'null' ? '' : item.waktu_minum}}</td>

                                    <td>
                                        <a href="javascript:void(0);" @click="editModal(item)" class="text-success"
                                            data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i
                                                class="far fa-edit"></i></a>
                                        <a href="javascript:void(0);" @click="deleteData(item.id)" class="text-danger"
                                            data-toggle="tooltip" data-placement="top" data-original-title="Hapus"><i
                                                class="far fa-trash-alt"></i></a>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL -->
<div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" id="modal">
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title" v-show="!editMode" id="myLargeModalLabel">Tambah Resep</h4>
                <h4 class="modal-title" v-show="editMode" id="myLargeModalLabel">Edit Resep</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <form @submit.prevent="editMode ? updateData() : storeData()" @keydown="form.onKeydown($event)" id="form">
                <div class="modal-body mx-4">
                    <div class="form-row">
                        <label class="col-lg-2" for="no_resep"> No Resep </label>
                        <div class="form-group col-md-8">
                            <input v-model="form.no_resep" id="no_resep" type="text" min=0 placeholder=""
                                class="form-control" :class="{ 'is-invalid': form.errors.has('no_resep') }">
                            <has-error :form="form" field="no_resep"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                            <label class="col-lg-2" for="tanggal_resep">Tanggal Resep</label>
                            <div class="form-group col-md-8">
                                <input v-model="form.tanggal_resep" id="tanggal_resep" type="date"
                                    placeholder="" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('tanggal_resep') }">
                                <has-error :form="form" field="tanggal_resep"></has-error>
                            </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2">Nama Obat</label>
                        <div class="form-group col-md-8">
                            <select v-model="form.id_obat" id="id_obat" onchange="selectTrigger()" style="width: 100%"
                                class="form-control custom-select">
                                <option disabled item="">- Pilih Nama Obat -</option>
                                <option v-for="item in namaObat" :value="item.id">
                                    @{{  item.nama_obat }}</option>
                            </select>
                            <has-error :form="form" field="id_obat"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="dosis"> Dosis </label>
                        <div class="form-group col-md-8">
                            <input v-model="form.dosis" id="dosis" type="text" min=0 placeholder="Masukkan Dosis"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('dosis') }">
                            <has-error :form="form" field="dosis"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="aturan_pakai"> Aturan Pakai </label>
                        <div class="form-group col-md-6">
                            <input v-model="form.aturan_pakai" id="aturan_pakai" type="text" min=0
                                placeholder="Aturan Pakai" class="form-control"
                                :class="{ 'is-invalid': form.errors.has('aturan_pakai') }">
                            <has-error :form="form" field="aturan_pakai"></has-error>
                        </div>
                        <p> <b> kali sehari </b> </p>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="takaran_minum"> Takaran Minum </label>
                        <div class="form-group col-md-8">
                            <input v-model="form.takaran_minum" id="takaran_minum" type="text" min=0
                                placeholder="Takaran Minum" class="form-control"
                                :class="{ 'is-invalid': form.errors.has('takaran_minum') }">
                            <has-error :form="form" field="takaran_minum"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="waktu_minum">Waktu Minum</label>
                        <div class="form-group col-md-8">
                            <select v-model="form.waktu_minum" id="waktu_minum" onchange="selectTrigger()"
                                style="width: 100%" class="form-control custom-select"
                                :class="{ 'is-invalid': form.errors.has('waktu_minum') }">
                                <option disabled item="">- Pilih Waktu Minum -</option>
                                <option value="Sebelum Makan">Sebelum Makan</option>
                                <option value="Saat Makan">Saat Makan</option>
                                <option value="Sesudah Makan">Sesudah Makan</option>
                            </select>
                            <has-error :form="form" field="waktu_minum"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="keterangan">Keterangan</label>
                        <div class="form-group col-md-8">
                            <select v-model="form.keterangan" id="keterangan" onchange="selectTrigger()"
                                style="width: 100%" class="form-control custom-select"
                                :class="{ 'is-invalid': form.errors.has('keterangan') }">
                                <option disabled item="">- Pilih Keterangan -</option>
                                <option value="Kondisional">Kondisional</option>
                                <option value="Harus Habis">Harus Habis</option>
                                <option value="Rutin">Rutin</option>
                            </select>
                            <has-error :form="form" field="keterangan"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="jml_obat"> Jumlah Obat </label>
                        <div class="form-group col-md-8">
                            <input v-model="form.jml_obat" id="jml_obat" type="text" min=0 placeholder="Jumlah Obat"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('jml_obat') }">
                            <has-error :form="form" field="jml_obat"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="jml_kali_minum"> Jumlah Kali Minum </label>
                        <div class="form-group col-md-8">
                            <input v-model="form.jml_kali_minum" id="jml_kali_minum" type="text" min=0
                                class="form-control" :class="{ 'is-invalid': form.errors.has('jml_kali_minum') }">
                            <has-error :form="form" field="jml_kali_minum"></has-error>
                        </div>
                    </div>

                    <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                    <button v-show="!editMode" type="submit" class="btn btn-primary">Simpan</button>
                    <button v-show="editMode" type="submit" class="btn btn-success">Ubah</button>

                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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

    let idPasien = sessionStorage.getItem("id_pasien");

    console.log('idPasien', idPasien)

    var app = new Vue({
        el: '#app',
        data: {
            mainData: [],
            editMode: false,
            form: new Form({
                id: '',
                id_obat: '',
                id_pasien: '',
                dosis: '',
                aturan_pakai: '',
                takaran_minum: '',
                waktu_minum: '',
                keterangan: '',
                jml_obat: '',
                jml_kali_obat: '',
            }),

            namaObat: @json($nama_obat),
        },
        mounted() {
            $('#table').DataTable()
            this.refreshData()
            $('[data-fancybox]').fancybox({
                iframe: {
                    preload: false
                }
            })
            $('#id_obat').select2({
                placeholder: "Pilih Nama Obat"
            });

        },
        methods: {

            createModal() {
                this.editMode = false;
                this.form.reset();
                this.form.clear();
                $('#modal').modal('show');
            },
            detailCard(data) {
                this.editMode = true;
                this.form.fill(data)
                this.form.clear();
            },
            storeData() {
                this.form.post("{{ route('resep.store') }}")
                    .then(response => {
                        $('#modal').modal('hide');
                        this.refreshData()
                    })
                    .catch(e => {
                        e.response.status != 422 ? console.log(e) : '';
                    })
            },
            updateData() {
                url = "{{ route('resep.update', ':id') }}".replace(':id', this.form.id)
                this.form.put(url)
                    .then(response => {
                        $('#modal').modal('hide');
                        this.refreshData()
                    })
                    .catch(e => {
                        e.response.status != 422 ? console.log(e) : '';
                    })
            },
            inputSelect() {
                this.form.id_obat = $("#id_obat").val()
            },

            deleteData(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        url = "{{ route('resep.destroy', ':id') }}".replace(':id', id)
                        this.form.delete(url)
                            .then(response => {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                this.refreshData()
                            })
                            .catch(e => {
                                e.response.status != 422 ? console.log(e) : '';
                            })
                    }
                })
            },

            refreshData() {
                axios.get("{{ route('resep.all') }}")
                    .then(response => {
                        $('#table').DataTable().destroy()
                        this.mainData = response.data
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