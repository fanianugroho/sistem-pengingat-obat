@extends('layout.master')
@section('title')
Ubah Kata Sandi
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <form @submit.prevent="updateData()" @keydown="form.onKeydown($event)" id="form">
                <div class="modal-body mx-4">
                <div class="form-row">
                        <label class="col-lg-2" for="old_password"> Kata Sandi Lama </label>
                        <div class="form-group col-md-8">
                            <input v-model="form.old_password" id="old_password" type="password" min=0 placeholder="Masukkan Kata Sandi Lama"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('old_password') }">
                            <has-error :form="form" field="old_password"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="password"> Kata Sandi Baru</label>
                        <div class="form-group col-md-8">
                            <input v-model="form.password" id="password" type="password" min=0 placeholder="Masukkan Kata Sandi Baru"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                            <has-error :form="form" field="password"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="password_confirmation"> Konfirmasi Kata Sandi</label>
                        <div class="form-group col-md-8">
                            <input v-model="form.password_confirmation" id="password_confirmation" type="password" min=0 placeholder="Konfirmasi Kata Sandi"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('password_confirmation') }">
                            <has-error :form="form" field="password_confirmation"></has-error>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <a href="{{route('beranda')}}">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                    </a>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
            </form>
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

    var app = new Vue({
        el: '#app',
        data: {
            mainData: [],
            editMode: false,
            form: new Form({
                id: '',
                old_password: '',
                password:'',
                password_confirmation:'',
            }),
        },
        mounted() {
        },
        methods: {
            updateData() {
                // console.log('res')
                url = "{{ route('user.ubahPassword', ':id') }}".replace(':id', this.form.id)
                this.form.post(url)
                    .then(response => {
                        console.log('res',response);
                        $('#modal').modal('hide');
                        Swal.fire(
                            'Berhasil',
                            'Kata Sandi berhasil diubah',
                            'success'
                        )
                        .then((value)=>{
                            window.location="{{route('beranda')}}"
                        })
                    })
                    .catch(e => {
                        e.response.status != 422 ? console.log(e) : '';
                    })
            },

        },
    })

</script>
@endpush

