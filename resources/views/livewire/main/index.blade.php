<div>
    <div class="content-wrapper">
        <section class="content-header"></section>

        <section class="content">
            <div class="container-fluid">
                <form wire:submit.prevent="store">
                    @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-md-12 text-center">
                                        <h2><span class="badge badge-warning p-2">{{$noBstb ?? 'Pilih dari tempat awal ke tempat tujuan terlebih dahulu'}}</span></h2>
                                        <div class="form-group">
                                            <select wire:model.live="dariKe" class="form-control">
                                                <option value="" selected>-- Pilih dari tempat awal ke tempat tujuan --</option>
                                                @foreach ($dataDariKe as $data)
                                                    <option value="{{substr($data->KODE, 1, -1)}}">
                                                        {{$data->DARI_KE}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Shift Timbang</label>
                                            <select wire:model="shiftTimbang" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div wire:ignore class="form-group">
                                            <label>Tanggal Produksi</label>
                                            <div class="input-group date" id="productionDate" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#productionDate"/>
                                                <div class="input-group-append" data-target="#productionDate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Shift Produksi</label>
                                            <select wire:model.live="shiftProduksi" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-end mb-2">
                                    {{-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label>No.JO</label>
                                            <input type="text" class="form-control">
                                            <div class="input-group">
                                                <input type="text" class="form-control" {{empty($dgJo) ? 'readonly' : ''}}>
                                                <div class="input-group-append clickable">
                                                    <span class="input-group-text"><i class="fas fa-sync-alt"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-12">
                                        <div wire:ignore class="form-group">
                                            <label>Pilih Barang</label>
                                            <select class="form-control" id="select-barang" style="width: 100%"></select>
                                        </div>
                                    </div>
                                    {{-- <div class="col-auto">
                                        <div class="form-group">
                                            <button class="btn btn-md btn-primary">
                                                <i class="fas fa-sync-alt"></i>
                                            </button>
                                        </div>
                                    </div> --}}
                                </div>
                                
                                {{-- <div class="row mb-2">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <td>Bs Sheet WL Zip Chocolate</td>
                                                    <td>SHEET</td>
                                                    <td>01031002020016</td>
                                                    <td>01031002020016</td>
                                                    <td>KG</td>
                                                </tr>
                                                <tr class="border-top"></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> --}}

                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input wire:model="berat" type="text" class="form-control text-center" style="font-size: xx-large"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">KG</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <div wire:ignore class="form-group row">
                                            <label class="col-sm-2 col-form-label">No.JO:</label>
                                            <div class="col-sm-10">
                                                <select multiple="multiple" id="select-no-jo" style="width: 100%"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">KET:</label>
                                            <div class="col-sm-10">
                                                <select wire:model="keterangan" class="form-control">
                                                    <option value="" selected>-- Pilih Keterangan --</option>
                                                    <option value="HOLD">HOLD</option>
                                                    <option value="SAPUAN">SAPUAN</option>
                                                    <option value="GOSONG">GOSONG</option>
                                                    <option value="MENTAH">MENTAH</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6"></div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Qty:</label>
                                            <div class="col-sm-10">
                                                <input wire:model="qty" type="text" class="form-control" 
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1')">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6"></div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Pcs:</label>
                                            <div class="col-sm-10">
                                                <input wire:model="pcs" type="text" class="form-control" 
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">
                                                <p class="text-danger">Gunakan tanda titik (.) untuk menggantikan koma</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <p class="mr-2">Cetak Faktur Timbang</p>
                                    <div class="custom-control custom-switch">
                                        <input wire:model="cetakFaktur" type="checkbox" class="custom-control-input" id="switcher-control-1">
                                        <label class="custom-control-label" for="switcher-control-1"></label>
                                    </div>
                              </div>
                              <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr style="background-color: #f4f6f9">
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>ID BARANG</th>
                                            <th>NAMA BARANG</th>
                                            <th>BERAT FILTER</th>
                                            <th><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($dataTimbang as $data)
                                            <tr wire:key="{{$data->ID}}">
                                                <td>{{$dataTimbang->firstItem() + $loop->index}}</td>
                                                <td>{{$data->ID}}</td>
                                                <td>{{$data->ID_BARANG}}</td>
                                                <td>{{$data->NAMA_BARANG}}</td>
                                                <td>{{$data->BERAT_FILTER}}</td>
                                                <td>
                                                    <button wire:click="printInvc({{$data->ID}})" type="button" class="btn btn-sm btn-secondary">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </button>
                                                    <button wire:click="confirm({{$data}})" type="button" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center text-secondary">
                                                    Tidak ada data saat ini
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                              </div>
                              <div class="form-group">
                                {{$dataTimbang->links()}}
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-lg btn-primary w-100" wire:loading.attr="disabled">Simpan</button>
                    </div>
                    </form>
                    <div class="col-md-6 d-flex justify-content-between">
                        <button class="btn btn-lg btn-success w-100" wire:loading.attr="disabled">Hasil Timbang</button>
                    </div>
                </div>

                <div wire:target="store, forceStore" wire:loading.delay.class.remove="d-none" id="loading-overlay" class="loading-overlay d-none">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    {{-- <img src="{{asset('assets/gif/loading.gif')}}" alt="loading"> --}}
                </div>
            </div>
        </section>
    </div>

    @script
        <script>            
            $(document).on('livewire:initialized', ()=> {
                function getDataBarang(){
                    $('#select-barang').select2({
                        theme: 'bootstrap4',
                        ajax: {
                            type: 'GET',
                            url: "{{route('main-app.search-item')}}",
                            dataType: 'json',
                            delay: 250,
                            data: function(params) {
                                return {
                                    searchItem: params.term
                                }
                            },
                            processResults: function(data) {
                                return {
                                    results: data
                                }
                            },
                            cache: true
                        }
                    });
                }

                getDataBarang();

                let productionDate = $('#productionDate').datetimepicker({
                    format: 'YYYY-MM-DD',
                    defaultDate: @json($tglProduksi)
                });

                @this.on('resetDropdownSelect', ()=> {
                    let selectBarang = $('#select-barang').select2({
                        theme: 'bootstrap4'
                    });
                    selectBarang.empty();

                    getDataBarang();

                    $('#productionDate').data('datetimepicker').date(new Date());
                });

                $('#productionDate').on('change.datetimepicker', function(e){
                    let date = e.date ? e.date.format('YYYY-MM-DD') : null;
                    @this.set('tglProduksi', date);
                });

                let selectNoJo = $('#select-no-jo').select2({
                    theme: 'bootstrap4'
                });

                function getData(data) {
                    if(data) {
                        selectNoJo.empty();

                        data.forEach(item => {
                            let option = new Option(item.NO_JO, item.NO_JO, false, false);
    
                            selectNoJo.append(option);
                        });
    
                        selectNoJo.trigger('change');
                    }
                }

                const data = @this.dataNoJo;

                getData(data);

                @this.on('loadDataNoJo', (event)=> {
                    const data = event.data;
                    getData(data);
                });

                $('#select-barang').on('change', function() {
                    let data = $(this).val();
                    @this.set('idSunfish', data);
                });

                $('#select-no-jo').on('change', function() {
                    let data = $(this).val();
                    @this.set('dataNoJo', data);
                });

                @this.on('alertError', (evt)=> {
                    $('#loading-overlay').addClass('d-none');
                    Swal.fire({
                        title: evt.title,
                        text: evt.text,
                        icon: evt.icon
                    });
                });

                @this.on('confirmSave', function() {
                    $('#loading-overlay').addClass('d-none');

                    Swal.fire({
                        title: "Anda yakin?",
                        text: "Nomor JO belum dipilih, apakah anda ingin menyimpan hasil timbang bs tanpa Nomor Jo?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ya, Lanjutkan",
                        cancelButtonText: 'Tidak'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $('#loading-overlay').removeClass('d-none');
                                @this.dispatch('forceStore');
                            }
                        });
                });

                @this.on('alertSaveData', (evt)=> {
                    $('#loading-overlay').addClass('d-none');
                    Swal.fire({
                        title: evt.title,
                        text: evt.text,
                        icon: evt.icon
                    });
                });

                @this.on('confirmDestroy', function(evt) {
                    Swal.fire({
                        title: "Anda yakin?",
                        html: `
                            <p class="swal-text">Ingin menghapus data timbang barang dengan detail:</p>
                            <div class="swal-details">
                                <div><span class="label">ID</span>: ${evt.data.ID}</div>
                                <div><span class="label">ID Barang</span>: ${evt.data.ID_BARANG}</div>
                                <div><span class="label">Nama Barang</span>: ${evt.data.NAMA_BARANG}</div>
                                <div><span class="label">Berat</span>: ${evt.data.BERAT_FILTER}</div>
                            </div>
                        `,
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ya, Lanjutkan",
                        cancelButtonText: 'Tidak'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                @this.dispatch('destroy', {data: evt.data});
                            }
                        });
                });

                @this.on('alertDeleteData', (evt)=> {
                    Swal.fire({
                        title: evt.title,
                        text: evt.text,
                        icon: evt.icon
                    });
                });

                @this.on('printInvc', (evt)=> {
                    window.open(evt.url, '_blank');
                });
            });
        </script>
    @endscript
</div>
