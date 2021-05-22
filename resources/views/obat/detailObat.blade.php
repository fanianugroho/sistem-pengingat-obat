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
                            <a href="{{route('obat.index')}}">
                                <button type="button" class="btn btn-primary btn-rounded float-left mb-4">
                                    <i class="fas fa-arrow-left"></i> Kembali</button>
                            </a>
                            <a href="javascript:void(0);" @click="editModal()"
                                class="btn btn-success btn-rounded float-right mb-3">
                                <i class="far fa-edit"></i> Edit Obat</button></a>
                            <table id="table" class="table table-striped table-bordered no-wrap">
                                <tr>
                                    <th width="400">Kode Obat</th>
                                    <td width="20px">:</td>
                                    <td>{{$detailObat->kode_obat}}</td>
                                </tr>
                                <tr>
                                    <th>Nama Obat</th>
                                    <td>:</td>
                                    <td>{{$detailObat->nama_obat}}
                                        {{$detailObat->bentuk_obat->nama_bentuk}}
                                        {{$detailObat->kekuatan_sediaan}}
                                        {{$detailObat->satuan}}</td>
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
                                    <td>
                                        @foreach ($detailObat->kontraindikasi_obat as $item)
                                        {{$item->kontraindikasi->nama_kontraindikasi}},
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>Interaksi Obat</th>
                                    <td>:</td>
                                    <td>
                                        @foreach ($detailObat->interaksi_obat as $item)
                                        {{$item->interaksi->nama_interaksi}},
                                        @endforeach
                                    </td>
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
                        </div>
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

            <form @submit.prevent="updateData()" @keydown="form.onKeydown($event)" id="form">
                <div class="modal-body mx-4">
                    <div class="form-row">
                        <label class="col-lg-2" for="nama_obat"> Nama Obat </label>
                        <div class="form-group col-md-8">
                            <input v-model="form.nama_obat" id="nama_obat" type="text" min=0
                                placeholder="Masukkan Nama Obat" class="form-control"
                                :class="{ 'is-invalid': form.errors.has('nama_obat') }">
                            <has-error :form="form" field="nama_obat"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2">Sediaan</label>
                        <div class="form-group col-md-8">
                            <select v-model="form.id_bentuk_obat" id="id_bentuk_obat" onchange="selectTrigger()"
                                style="width: 100%" class="form-control custom-select">
                                <option disabled item="">- Pilih Sediaan Obat -</option>
                                <option v-for="item in bentukObat" :value="item.id">
                                    @{{  item.nama_bentuk }}</option>
                            </select>
                            <has-error :form="form" field="id_bentuk_obat"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="satuan">Kekuatan Sediaan</label>
                        <div class="form-group col-md-8">
                            <form>
                                <div class="form-row">
                                    <div class="col">
                                        <input v-model="form.kekuatan_sediaan" id="kekuatan_sediaan" type="text" min=0
                                            placeholder="Kekuatan Sediaan" class="form-control"
                                            :class="{ 'is-invalid': form.errors.has('kekuatan_sediaan') }">
                                        <has-error :form="form" field="kekuatan_sediaan"></has-error>
                                    </div>
                                    <div class="col">
                                        <select v-model="form.satuan" id="satuan" onchange="selectTrigger()"
                                            class="form-control custom-select"
                                            :class="{ 'is-invalid': form.errors.has('satuan') }">
                                            <option value="">- Pilih Satuan -</option>
                                            <option value="ml">ml</option>
                                            <option value="mg">mg</option>
                                        </select>
                                        <has-error :form="form" field="satuan"></has-error>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="id_fungsi_obat">Fungsi</label>
                        <div class="form-group col-md-8">
                            <select id="id_fungsi_obat" name="states[]" multiple="multiple" onchange="selectTrigger()"
                                style="width: 100%" class="js-example-basic-multiple">
                                <option disabled item="">- Pilih Penggunaan Obat -</option>
                                <option v-for="item in fungsiObat" :value="item.id">
                                    @{{  item.nama_fungsi }}</option>
                            </select>
                            <has-error :form="form" field="id_fungsi_obat"></has-error>
                        </div>
                    </div>
                    <div class="form-row" for="id_kontraindikasi_obat">
                        <label class="col-lg-2">Kontraindikasi Obat</label>
                        <div class="form-group col-md-8">
                            <select id="id_kontraindikasi_obat" name="states[]" multiple="multiple" style="width: 100%"
                                class="js-example-basic-multiple">
                                <option disabled item="">- Pilih Kontraindikasi Obat -</option>
                                <option v-for="item in kontraindikasiObat" :value="item.id">
                                    @{{  item.nama_kontraindikasi }}</option>
                            </select>
                            <has-error :form="form" field="id_kontraindikasi_obat"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="id_interaksi_obat">Interaksi Obat</label>
                        <div class="form-group col-md-8">
                            <select id="id_interaksi_obat" name="states[]" multiple="multiple"
                                class="js-example-basic-multiple" style="width: 100%"
                                class="form-control custom-select">
                                <option disabled item="">- Pilih Interaksi Obat -</option>
                                <option v-for="item in interaksiObat" :value="item.id">
                                    @{{  item.nama_interaksi }}</option>
                            </select>
                            <has-error :form="form" field="id_interaksi_obat"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="id_efek_samping_obat"> Efek Samping </label>
                        <div class="form-group col-md-8">
                            <select id="id_efek_samping_obat" name="states[]" multiple="multiple"
                                class="js-example-basic-multiple" style="width: 100%"
                                class="form-control custom-select">
                                <option disabled item="">- Pilih Efek Samping Obat -</option>
                                <option v-for="item in efeksampingObat" :value="item.id">
                                    @{{  item.nama_efek_samping}}</option>
                            </select>
                            <has-error :form="form" field="id_efek_samping_obat"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="petunjuk_penyimpanan"> Petunjuk Penyimpanan </label>
                        <div class="form-group col-md-8">
                            <textarea class="form-control":class="{ 'is-invalid': form.errors.has('petunjuk_penyimpanan') }" v-model="form.petunjuk_penyimpanan" id="petunjuk_penyimpanan"
                                placeholder="Masukkan petunjuk penyimpanan" type="text">
                            </textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="pola_makan"> Pola Makan </label>
                        <div class="form-group col-md-8">
                            <input v-model="form.pola_makan" id="pola_makan" type="text" min=0
                                placeholder="Masukkan Pola Makan" class="form-control"
                                :class="{ 'is-invalid': form.errors.has('pola_makan') }">
                            <has-error :form="form" field="pola_makan"></has-error>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-lg-2" for="informasi"> Informasi </label>
                        <div class="form-group col-md-8">
                            <input v-model="form.informasi" id="informasi" type="text" min=0
                                placeholder="Masukkan Informasi" class="form-control"
                                :class="{ 'is-invalid': form.errors.has('informasi') }">
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
<script src="https://unpkg.com/vue-multiselect@2.1.0"></script>
<link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">
<script>
    var getEfekSamping = @json($efek_samping_obat);
    var getKontraindikasi = @json($kontraindikasi_obat);

    function selectTrigger() {
        app.inputSelect()
    }

    var app = new Vue({
        el: '#app',
        data: {
            mainData: [],
            editMode: false,
            selectedObat: null,
            selectedFungsi: [],
            selectedEfekSamping: [],
            selectedInteraksi: [],
            selectedKontraindikasi: [],

            selectedInteraksiEdit: [],
            selectedFungsiEdit: [],
            selectedEfekSampingEdit: [],
            selectedKontraindikasiEdit: [],
            form: new Form({
                id: '',
                nama_obat: '',
                kode_obat: '',
                kekuatan_sediaan:'',
                satuan: '',
                petunjuk_penyimpanan: '',
                pola_makan: '',
                informasi: '',
                id_bentuk_obat: '',
                id_interaksi_obat: '',
                id_fungsi_obat: '',
                id_efek_samping_obat: '',
                id_kontraindikasi_obat: '',
            }),
            bentukObat: @json($bentuk_obat),
            interaksiObat: @json($interaksi_obat),
            kontraindikasiObat: @json($kontraindikasi_obat),
            fungsiObat: @json($fungsi_obat),
            efeksampingObat: @json($efek_samping_obat),
        },
        mounted() {
            $('[data-fancybox]').fancybox({
                iframe: {
                    preload: false
                }
            })
            $('#id_interaksi_obat').ready(function () {
                $('#id_interaksi_obat').select2({
                    placeholder: "Pilih Interaksi"
                });
            });
            $('#id_kontraindikasi_obat').ready(function () {
                $('#id_kontraindikasi_obat').select2({
                    placeholder: "Pilih Kontraindikasi"
                });
            });
            $('#id_fungsi_obat').ready(function () {
                $('#id_fungsi_obat').select2({
                    placeholder: "Pilih Fungsi"
                });
            });
            $('#id_efek_samping_obat').ready(function () {
                $('#id_efek_samping_obat').select2({
                    placeholder: "Pilih Efek Samping"
                });
            });

            $('#id_efek_samping_obat').change(function () {
                this.selectedEfekSampingEdit = $("[id='id_efek_samping_obat']").toArray().map(x => $(x)
                    .val());
            });

            $('#id_fungsi_obat').change(function () {
                this.selectedFungsiEdit = $("[id='id_fungsi_obat']").toArray().map(x => $(x).val());
            });

            $('#id_kontraindikasi_obat').change(function () {
                this.selectedKontraindikasiEdit = $("[id='id_kontraindikasi_obat']").toArray().map(x =>
                    $(x).val());
            });

            $('#id_interaksi_obat').change(function () {
                this.selectedInteraksiEdit = $("[id='id_interaksi_obat']").toArray().map(x => $(x)
                .val());
            });
        },
        methods: {
            getDetailObat(id) {
                url = "{{ route('detailObatEdit', ':id') }}".replace(':id', id)
                axios.get(url)
                    .then(response => {
                        this.form.fill(response.data)

                        this.selectedObat = response.data.bentuk_obat.id;
                        this.selectedFungsi = response.data.fungsi_obat
                        this.selectedEfekSamping = response.data.efek_samping_obat
                        this.selectedKontraindikasi = response.data.kontraindikasi_obat
                        this.selectedInteraksi = response.data.interaksi_obat

                        let dataEditEfekSamping = [];
                        let dataEditFungsi = [];
                        let dataEditKontraindikasi = [];
                        let dataEditInteraksi = [];

                        for (let i = 0; i < this.selectedEfekSamping.length; i++) {
                            dataEditEfekSamping.push(this.selectedEfekSamping[i].id_efek_samping)
                        }
                        for (let i = 0; i < this.selectedFungsi.length; i++) {
                            dataEditFungsi.push(this.selectedFungsi[i].id_fungsi)
                        }
                        for (let i = 0; i < this.selectedInteraksi.length; i++) {
                            dataEditInteraksi.push(this.selectedInteraksi[i].id_interaksi)
                        }
                        for (let i = 0; i < this.selectedKontraindikasi.length; i++) {
                            dataEditKontraindikasi.push(this.selectedKontraindikasi[i].id_kontraindikasi)
                        }

                        $('#id_bentuk_obat').find('option[value=' + response.data.bentuk_obat.id + ']')
                            .prop('selected', true);
                        $('#satuan').find('option[value=' + response.data.satuan + ']').prop('selected',
                            true);

                        $('#id_efek_samping_obat').val(dataEditEfekSamping).trigger('change');
                        $('#id_fungsi_obat').val(dataEditFungsi).trigger('change');
                        $('#id_interaksi_obat').val(dataEditInteraksi).trigger('change');
                        $('#id_kontraindikasi_obat').val(dataEditKontraindikasi).trigger('change');

                        this.form.clear();
                        this.editMode = true;
                        $('#modal').modal('show');
                    })
                    .catch(e => {
                        console.log('e', e)
                        e.response.status != 422 ? console.log(e) : '';
                    })
            },
            editModal(data) {
                this.editMode = false;
                let segment_str = window.location.pathname;
                let segment_array = segment_str.split('/');
                let id = segment_array.pop();
                this.getDetailObat(id);
            },
            updateData() {
                url = "{{ route('obat.update', ':id') }}".replace(':id', this.form.id)

                let interaksi = $('#id_interaksi_obat').val();
                let fungsiObat = $('#id_fungsi_obat').val();
                let efekSamping = $('#id_efek_samping_obat').val();
                let kontraindikasi = $('#id_kontraindikasi_obat').val();

                this.form.id_interaksi_obat = interaksi;
                this.form.id_fungsi_obat = fungsiObat;
                this.form.id_efek_samping_obat = efekSamping;
                this.form.id_kontraindikasi_obat = kontraindikasi;

                this.form.put(url)
                    .then(response => {
                        console.log('res', response)
                        $('#modal').modal('hide');
                        Swal.fire(
                            'Berhasil',
                            'Obat berhasil diubah',
                            'success'
                        )
                        window.location.reload();
                    })
                    .catch(e => {
                        e.response.status != 422 ? console.log(e) : '';
                    })
            },
            inputSelect() {
                this.form.id_bentuk_obat = $("#id_bentuk_obat").val()
            },
        },
    })

</script>
@endpush
