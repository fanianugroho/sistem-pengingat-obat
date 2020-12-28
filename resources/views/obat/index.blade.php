@extends('layout.master')
@section('title')
Obat
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
                    <h4 class="card-title"> Obat
                        <button type="button" class="btn btn-primary btn-rounded float-right mb-3"
                            @click="createModal()"><i class="fas fa-plus-circle"></i> Tambah Obat</button>
                    </h4>
                    <div class="table-responsive">
                        <table id="table" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Obat</th>
                                    <th>Nama Obat</th>
                                    <th>Kontraindikasi</th>
                                    <th>Interaksi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item, index in mainData" :key="index">
                                    <td>@{{ index+1 }}</td>
                                    <td>@{{ "OB00255"+index+1 }}</td>
                                    <td>@{{ item.nama_obat == 'null' ? '' : item.nama_obat}}  </td>
                                    
                                    <td>@{{ item.kontraindikasi_obat.nama_kontraindikasi == 'null' ? '' : item.kontraindikasi_obat.nama_kontraindikasi}}</td>
                                    <td>@{{ item.interaksi_obat.nama_interaksi == 'null' ? '' : item.interaksi_obat.nama_interaksi}}</td>
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
                <h4 class="modal-title" v-show="!editMode" id="myLargeModalLabel">Tambah Obat</h4>
                <h4 class="modal-title" v-show="editMode" id="myLargeModalLabel">Edit Obat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <form @submit.prevent="editMode ? updateData() : storeData()" @keydown="form.onKeydown($event)" id="form">
                <div class="modal-body mx-4">
                    <div class="form-row">
                        <label class="col-lg-2" for="nama_obat"> Nama Obat </label>
                        <div class="form-group col-md-8">
                            <input v-model="form.nama_obat" id="nama_obat" type="text" min=0 placeholder="Masukkan Nama Obat"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('nama_obat') }">
                            <has-error :form="form" field="nama_obat"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                            <label class="col-lg-2">Bentuk Obat</label>
                            <div class="form-group col-md-8">
                                <select v-model="form.id_bentuk_obat" id="id_bentuk_obat" onchange="selectTrigger()"
                                    style="width: 100%" class="form-control custom-select">
                                    <option disabled item="">- Pilih Bentuk Obat -</option>
                                    <option v-for="item in bentukObat" :value="item.id">
                                        @{{  item.nama_bentuk }}</option>
                                </select>
                                <has-error :form="form" field="id_bentuk_obat"></has-error>
                            </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="kesediaan"> Kesediaan Obat </label>
                        <div class="form-group col-md-8">
                            <input v-model="form.kesediaan" id="kesediaan" type="text" min=0 placeholder="Masukkan Kesediaan Obat"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('kesediaan') }">
                            <has-error :form="form" field="kesediaan"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                            <label class="col-lg-2" for="satuan">Satuan</label>
                            <div class="form-group col-md-8">
                                <select v-model="form.satuan" id="satuan"  onchange="selectTrigger()"
                                style="width: 100%" class="form-control custom-select"
                                    :class="{ 'is-invalid': form.errors.has('satuan') }">
                                    <option disabled item="">- Pilih Satuan -</option>
                                    <option value="ml">ml</option>
                                    <option value="mg">mg</option>
                                </select>
                                <has-error :form="form" field="satuan"></has-error>
                            </div>
                    </div>
                    <div class="form-row">
                            <label class="col-lg-2">Kontraindikasi Obat</label>
                            <div class="form-group col-md-8">
                                <select v-model="form.id_kontraindikasi_obat" id="id_kontraindikasi_obat" onchange="selectTrigger()"
                                    style="width: 100%" class="form-control custom-select">
                                    <option disabled item="">- Pilih Kontraindikasi Obat -</option>
                                    <option v-for="item in kontraindikasiObat" :value="item.id">
                                        @{{  item.nama_kontraindikasi }}</option>
                                </select>
                                <has-error :form="form" field="id_kontraindikasi_obat"></has-error>
                            </div>
                    </div>
                    <div class="form-row">
                            <label class="col-lg-2">Interaksi Obat</label>
                            <div class="form-group col-md-8">
                                <select v-model="form.id_interaksi_obat" id="id_interaksi_obat" onchange="selectTrigger()"
                                    style="width: 100%" class="form-control custom-select">
                                    <option disabled item="">- Pilih Interaksi Obat -</option>
                                    <option v-for="item in interaksiObat" :value="item.id">
                                        @{{  item.nama_interaksi }}</option>
                                </select>
                                <has-error :form="form" field="id_interaksi_obat"></has-error>
                            </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="efek_samping"> Efek Samping </label>
                        <div class="form-group col-md-8">
                            <input v-model="form.efek_samping" id="efek_samping" type="text" min=0 placeholder="Masukkan Efek Samping Obat"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('efek_samping') }">
                            <has-error :form="form" field="efek_samping"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="petunjuk_penyimpanan"> Petunjuk Penyimpanan </label>
                        <div class="form-group col-md-8">
                            <input v-model="form.petunjuk_penyimpanan" id="petunjuk_penyimpanan" type="text" min=0 placeholder="Masukkan Petunjuk Penyimpanan"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('petunjuk_penyimpanan') }">
                            <has-error :form="form" field="petunjuk_penyimpanan"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="pola_makan"> Pola Makan </label>
                        <div class="form-group col-md-8">
                            <input v-model="form.pola_makan" id="pola_makan" type="text" min=0 placeholder="Masukkan Pola Makan"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('pola_makan') }">
                            <has-error :form="form" field="pola_makan"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="informasi"> Informasi </label>
                        <div class="form-group col-md-8">
                            <input v-model="form.informasi" id="informasi" type="text" min=0 placeholder="Masukkan Informasi"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('informasi') }">
                            <has-error :form="form" field="informasi"></has-error>
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

    var app = new Vue({
        el: '#app',
        data: {
            mainData: [],
            editMode: false,
            form: new Form({
                id: '',
                nama_obat: '',
                kesediaan:'',
                satuan:'',
                efek_samping:'',
                petunjuk_penyimpanan:'',
                pola_makan:'',
                informasi:'',
                id_bentuk_obat:'',
                id_interaksi_obat:'',
                id_kontraindikasi_obat:'',
            }),
            bentukObat: @json($bentuk_obat),
            interaksiObat: @json($interaksi_obat),
            kontraindikasiObat: @json($kontraindikasi_obat),
        },
        mounted() {
            $('#table').DataTable()
            this.refreshData()
            $('[data-fancybox]').fancybox({
                iframe: {
                    preload: false
                }
            })
            $('#id_bentuk_obat').select2({
                placeholder: "Pilih Bentuk Obat"
            });
            $('#id_interaksi_obat').select2({
                placeholder: "Pilih Interaksi Obat"
            });
            $('#id_kontraindikasi_obat').select2({
                placeholder: "Pilih Kontraindikasi Obat"
            });
        },
        methods: {
            createModal() {
                this.editMode = false;
                this.form.reset();
                this.form.clear();
                $('#modal').modal('show');
            },
            editModal(data) {
                this.editMode = true;
                this.form.fill(data)
                this.form.clear();
                $('#modal').modal('show');
            },
            storeData() {
                this.form.post("{{ route('obat.store') }}")
                    .then(response => {
                        $('#modal').modal('hide');
                        this.refreshData()
                    })
                    .catch(e => {
                        e.response.status != 422 ? console.log(e) : '';
                    })
            },
            updateData() {
                url = "{{ route('obat.update', ':id') }}".replace(':id', this.form.id)
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
                this.form.id_bentuk_obat = $("#id_bentuk_obat").val()
                this.form.id_interaksi_obat = $("#id_interaksi_obat").val()
                this.form.id_kontraindikasi_obat = $("#id_kontraindikasi_obat").val()
                this.form.satuan = $("#satuan").val()
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
                        url = "{{ route('obat.destroy', ':id') }}".replace(':id', id)
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
                axios.get("{{ route('obat.all') }}")
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
