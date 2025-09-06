<div>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div wire:ignore class="col-sm-6">
                        <h1>Kartu Stok
                            <span class="badge badge-info p-2">
                                Plant {{strtoupper(request()->route()->parameter('plant'))}}
                            </span>
                        </h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div wire:ignore class="col-md-6">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a wire:navigate href="{{route('admin.kartu-stok', ['plant' => 'unimos'])}}" 
                                            class="nav-link {{request()->route()->parameter('plant') == 'unimos' ? 'active' : ''}}">
                                            <h5>UNIMOS</h5>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a wire:navigate href="{{route('admin.kartu-stok', ['plant' => 'mgfi'])}}" 
                                            class="nav-link {{request()->route()->parameter('plant') == 'mgfi'? 'active' : ''}}">
                                            <h5>MGFI</h5>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row d-flex align-items-center mb-2">

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Tanggal Mulai</label>
                                    <div class="input-group date" id="startDate" data-target-input="nearest">
                                        <input wire:model="tglMulai" type="text" class="form-control datetimepicker-input" data-target="#startDate"/>
                                        <div class="input-group-append" data-target="#startDate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Tanggal Berakhir</label>
                                    <div class="input-group date" id="endDate" data-target-input="nearest">
                                        <input wire:model="tglBerakhir" type="text" class="form-control datetimepicker-input" data-target="#endDate"/>
                                        <div class="input-group-append" data-target="#endDate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <select wire:model="dariKe" class="form-control">
                                        <option value="" selected>Semua</option>
                                        <option disabled>-- Pilih dari tempat awal ke tempat tujuan --</option>
                                        @foreach ($dataDariKe as $data)
                                            <option value="{{$data->DARI_KE}}">{{$data->DARI_KE}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <select wire:model.live="kategori" class="form-control">
                                        <option value="" selected>-- Pilih Kategori --</option>
                                        @foreach ($dataKategori as $data)
                                            <option value="{{$data->itemCategoryType}}">{{$data->itemCategoryType}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2" wire:ignore>
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <select class="form-control" id="subKategoriSelect">
                                        <option value="" selected>-- Pilih Sub Kategori --</option>
                                        @foreach ($dataSubKategori as $data)
                                            <option value="{{$data->KATEGORI}}">{{$data->KATEGORI}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="form-group">
                                    <label class="d-block">SHIFT</label>
                                    <div class="icheck-primary d-inline mr-2">
                                        <input wire:model="shifts" type="checkbox" name="shift1" id="shiftCheckbox1" value="1">
                                        <label for="shiftCheckbox1">1</label>
                                    </div>
                                    <div class="icheck-primary d-inline mr-2">
                                        <input wire:model="shifts" type="checkbox" name="shift2" id="shiftCheckbox2" value="2">
                                        <label for="shiftCheckbox2">2</label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input wire:model="shifts" type="checkbox" name="shift3" id="shiftCheckbox3" value="3">
                                        <label for="shiftCheckbox3">3</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-auto">
                                <div class="form-group">
                                    <label class="d-block">&nbsp;</label>
                                    <button wire:click="filter" type="button" class="btn btn-primary" id="filterButton">
                                        <i class="fas fa-filter mr-1"></i>
                                        Filter
                                    </button>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h4>Daftar Kartu Stok <span class="badge badge-secondary">{{$dataKartuStok->total()}}</span></h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <select wire:model.live="paginate" class="form-control mr-4">
                                                    <option value="10">10</option>
                                                    <option value="20">20</option>
                                                    <option value="30">30</option>
                                                    <option value="40">40</option>
                                                    <option value="50">50</option>
                                                </select>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="input-group input-group-md">
                                                    <input wire:model.live="search" type="text" class="form-control" placeholder="Cari berdasarkan nama barang, id sunfish">
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-default">
                                                        <i class="fas fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr style="background-color: #f4f6f9">
                                            <th>#</th>
                                            <th>INFORMASI TANGGAL</th>
                                            <th>INFORMASI SHIFT</th>
                                            <th>KODE SUNFISH</th>
                                            <th>NO.BSTB</th>
                                            <th>NAMA BARANG</th>
                                            <th>TOTAL BERAT</th>
                                            <th>PCS/ROLL</th>
                                            <th>INFORMASI LAIN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($dataKartuStok as $data)
                                        <tr wire:key="{{$data->ID}}">
                                            <td>{{$dataKartuStok->firstItem() + $loop->index}}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <p>TANGGAL</p>
                                                        @if(isset($data->TGL_PRODUKSI))
                                                        <p>TANGGAL PRODUKSI</p>
                                                        @endif
                                                    </div>
                                                    <div class="col-auto">
                                                        <p>: {{$data->WKT ?? '-'}}</p>
                                                        @if(isset($data->TGL_PRODUKSI))
                                                        <p>: {{$data->TGL_PRODUKSI}}</p>
                                                        @endif
                                                    </div>
                                                </div>   
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <p>SHIFT</p>
                                                        @if(isset($data->SHIFT_PRODUKSI))
                                                        <p>SHIFT PRODUKSI</p>
                                                        @endif
                                                    </div>
                                                    <div class="col-auto">
                                                        <p>: {{$data->SHIFT}}</p>
                                                        @if(isset($data->SHIFT_PRODUKSI))
                                                        <p>: {{$data->SHIFT_PRODUKSI}}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$data->ID_SUNFISH}}</td>
                                            <td>{{$data->UNIQ_ID}}</td>
                                            <td>{{$data->NAMA_BARANG}}</td>
                                            <td>{{round($data->BF, 2)}}</td>
                                            <td>{{$data->JPCS ?? '-'}}</td>
                                            <td>
                                                {{isset($data->JMLH) ? "JUMLAH : $data->JMLH" : "-"}}
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center text-secondary">
                                                    Tidak ada data yang tersedia
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="form-group">
                                    {{$dataKartuStok->links()}}
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @script
            <script>
                $('#startDate').datetimepicker({
                    format: 'YYYY-MM-DD'
                });

                $('#endDate').datetimepicker({
                    format: 'YYYY-MM-DD'
                });

                document.querySelector('button[wire\\:click="filter"]').addEventListener('mousedown', function() {
                    let startDateValue = $('#startDate').find('input').val();
                    let endDateValue = $('#endDate').find('input').val();
                    @this.set('tglMulai', startDateValue);
                    @this.set('tglBerakhir', endDateValue);

                    let subKategoriValue = document.getElementById('subKategoriSelect').value;
                    @this.set('subKategori', subKategoriValue);
                });
            </script>
        @endscript
    </div>
</div>

@push('scripts')
    <script>
        function updateSubKategoriOptions(data) {
            let selectElement = document.getElementById('subKategoriSelect');
            while (selectElement.options.length > 1) {
                selectElement.remove(1);
            }
            data.forEach(item => {
                let option = document.createElement('option');
                option.value = item.KATEGORI;
                option.innerText = item.KATEGORI;
                selectElement.appendChild(option);
            });
        }
    </script>
@endpush
