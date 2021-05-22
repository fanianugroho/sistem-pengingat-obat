@extends('layout.master')
@section('title')
Tambah Apoteker
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> Apoteker
                        <button type="button" class="btn btn-primary btn-rounded float-right mb-3"
                            @click="createModal()"><i class="fas fa-plus-circle"></i> Tambah Apoteker</button>
                    </h4>
                    <div class="table-responsive">
                        <table id="table" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item, index in mainData" :key="index">
                                    <td>@{{ index+1 }}</td>
                                    <td>@{{ item.nama == 'null' ? '' : item.nama }}</td>
                                    <td>@{{ item.username == 'null' ? '' : item.username}} </td>
                                    <td>@{{ item.email == 'null' ? '' : item.email}}</td>
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
                <h4 class="modal-title" v-show="!editMode" id="myLargeModalLabel">Tambah Apoteker</h4>
                <h4 class="modal-title" v-show="editMode" id="myLargeModalLabel">Edit Apoteker</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form @submit.prevent="editMode ? updateData() : storeData()" @keydown="form.onKeydown($event)" id="form">
                <div class="modal-body mx-4">
                    <div class="form-row">
                        <label class="col-lg-2" for="nama"> Nama</label>
                        <div class="form-group col-md-8">
                            <input v-model="form.nama" id="nama" type="text" min=0
                                placeholder="Masukkan Nama Apoteker" class="form-control"
                                :class="{ 'is-invalid': form.errors.has('nama') }">
                            <has-error :form="form" field="nama"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2">Username</label>
                        <div class="form-group col-md-8">
                            <input v-model="form.username" id="username" type="text" min=0
                                placeholder="Masukkan Username" class="form-control"
                                :class="{ 'is-invalid': form.errors.has('username') }">
                                <has-error :form="form" field="username"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2">Tipe User</label>
                        <div class="form-group col-md-8">
                            <select v-model="form.tipe_user" id="tipe_user" onchange="selectTrigger()" style="width: 100%"
                                class="form-control custom-select" :class="{ 'is-invalid': form.errors.has('tipe_user') }">
                                <option value="">- Pilih Tipe User -</option>
                                <option value="admin">Admin</option>
                                <option value="apoteker">Apoteker</option>
                            </select>
                            <has-error :form="form" field="tipe_user"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="email">Email </label>
                        <div class="form-group col-md-8">
                            <input v-model="form.email" id="email" type="email" min=0
                                placeholder="Masukkan Email" class="form-control"
                                :class="{ 'is-invalid': form.errors.has('email') }">
                            <has-error :form="form" field="email"></has-error>
                        </div>
                    </div>
                    <div class="form-row" v-show="!editMode">
                        <label class="col-lg-2" for="password">Kata Sandi </label>
                        <div class="form-group col-md-8">
                            <input v-model="form.password" id="password" type="password" min=0
                                placeholder="Masukkan Kata Sandi" class="form-control"
                                :class="{ 'is-invalid': form.errors.has('password') }">
                            <has-error :form="form" field="password"></has-error>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                        <button v-show="!editMode" type="submit" class="btn btn-primary">Tambah</button>
                        <button v-show="editMode" type="submit" class="btn btn-success">Ubah</button>
                    </div>
            </form>
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
                nama: '',
                username: '',
                tipe_user:'',
                email: '',
                password: '',
            }),
        },
        mounted() {
            $('#table').DataTable()
            this.refreshData()
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
                this.form.clear();
                this.form.fill(data)
                $('#modal').modal('show');
                $('#tipe_user').val(data.tipe_user).trigger('change');
            },
            storeData() {
                this.form.post("{{ route('user.store') }}")
                    .then(response => {
                        $('#modal').modal('hide');
                        Swal.fire(
                            'Berhasil',
                            'Apoteker berhasil ditambahkan',
                            'success'
                        )
                        this.refreshData()
                    })
                    .catch(e => {
                        e.response.status != 422 ? console.log(e) : '';
                    })
            },
            updateData() {
                url = "{{ route('user.update', ':id') }}".replace(':id', this.form.id)
                this.form.put(url)
                    .then(response => {
                        $('#modal').modal('hide');
                        Swal.fire(
                            'Berhasil',
                            'Apoteker berhasil diubah',
                            'success'
                        )
                        this.refreshData()
                    })
                    .catch(e => {
                        e.response.status != 422 ? console.log(e) : '';
                    })
            },
            deleteData(id) {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Anda tidak dapat mengembalikan ini",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.value) {
                        console.log(result);
                        url = "{{ route('user.destroy', ':id') }}".replace(':id', id)
                        this.form.delete(url)
                            .then(response => {
                                Swal.fire(
                                    'Terhapus',
                                    'Apoteker telah dihapus',
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
            inputSelect() {
                    this.form.tipe_user = $("#tipe_user").val()
                },
            refreshData() {
                axios.get("{{ route('user.all') }}")
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
