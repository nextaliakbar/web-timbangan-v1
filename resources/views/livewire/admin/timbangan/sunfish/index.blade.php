<div>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between">
                        <h1>Edit No. Sunfish <span class="badge badge-info p-2">Plant {{strtoupper($plant)}}</span></h1>
                    
                        <a wire:navigate href="{{route('admin.timbangan', ['plant' => is_numeric($plant) ? ($plant == 2 ? 'unimos' : 'mgfi') : $plant])}}" class="mr-4">
                            <button class="btn btn-md btn-secondary">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Kembali
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            {{-- <div class="col-md-6">
                                <select wire:model.live="interval" class="form-control">
                                    <option value="3">3 Bulan Terakhir</option>
                                    <option value="6">6 Bulan Terakhir</option>
                                </select>
                            </div> --}}
    
                            <div class="col-md-12">
                                <select wire:model.live="dariKe" class="form-control">
                                    <option value="" selected>Semua</option>
                                    <option disabled>-- Pilih dari tempat awal ke tempat tujuan --</option>
                                    @foreach ($dataDariKe as $data)
                                        <option value="{{substr($data->KODE, 1, -1)}}">{{$data->DARI_KE}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-2">
                                <select wire:model.live="paginate1" class="form-control mr-4">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-md">
                                    <input wire:model.live="search1" type="text" class="form-control" placeholder="Cari berdasarkan no.bstb">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr style="background-color: #f4f6f9">
                                        <th>#</th>
                                        <th>NO BSTB Belum Serah Terima</th>
                                        <th>Waktu Timbang</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($dataTimbang1 as $data)
                                        <tr wire:key="{{$data->UNIQ_ID}}">
                                            <td>{{$dataTimbang1->firstItem() + $loop->index}}</td>
                                            <td>{!! $data->after_two_month 
                                            ? '<span class="text-dark">'.$data->UNIQ_ID.'</span>'
                                            : '<span class="text-danger">'.$data->UNIQ_ID.'</span>' !!}
                                            </td>
                                            <td>{!! $data->after_two_month 
                                            ? '<span class="text-dark">'.date("Y-m-d H:i", strtotime($data->WAKTU)).'</span>'
                                            : '<span class="text-danger">'.date("Y-m-d H:i", strtotime($data->WAKTU)).'</span>' !!}
                                            </td>
                                            <td>{{empty($data->WTA) ? 'Belum kirim ' . $data->before_total . ' item' : (empty($data->WHT) ? 'Belum terima ' . $before_total . ' item' : '')}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-secondary">
                                                <h5>Tidak ada data yang tersedia</h5>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            {{$dataTimbang1->links()}}
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group border border-top"></div>
                    </div>

                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-2">
                                <select wire:model.live="paginate2" class="form-control mr-4">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-md">
                                    <input wire:model.live="search2" type="text" class="form-control" placeholder="Cari berdasarkan id sunfish, no.bstb, nama barang, tanggal, berat, wta, wht">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr style="background-color: #f4f6f9">
                                        <th>#</th>
                                        <th>TGL</th>
                                        <th>ID SUNFISH</th>
                                        <th>NO.BSTB</th>
                                        <th>NAMA BARANG</th>
                                        <th>BERAT</th>
                                        <th>WTA</th>
                                        <th>WHT</th>
                                        <th><i class="fas fa-print"></i></th>
                                        <th><i class="fas fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($dataTimbang2 as $data)
                                        <tr wire:key="{{$data->UNIQ_ID}}">
                                            <td>{{$dataTimbang2->firstItem() + $loop->index}}</td>
                                            <td>{{date('Y-m-d H:i', strtotime($data->WAKTU))}}</td>
                                            <td>{{$data->ID_BARANG}}</td>
                                            <td>{{$data->UNIQ_ID}}</td>
                                            <td>{{$data->NAMA_BARANG}}</td>
                                            <td>{{$data->BERAT_FILTER}}</td>
                                            <td>{{$data->WTA}}</td>
                                            <td>{{$data->WHT}}</td>
                                            <td>
                                                <button wire:click="exportPdf('{{$data->UNIQ_ID}}')" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-file-pdf"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <button wire:click="edit({{$data->UNIQ_ID}})" type="button" class="btn btn-sm btn-warning"
                                                    data-toggle="modal" data-target="#editModal">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center text-secondary">
                                                Tidak ada data yang tersedia
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            {{$dataTimbang2->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('livewire.admin.timbangan.sunfish.edit')

        @script
            <script>
                $wire.on('closeModalEdit', (evt)=> {
                    $('#editModal').modal('hide');
                    Swal.fire({
                        title: evt.title,
                        text: evt.text,
                        icon: evt.icon
                    });
                });
            </script>
        @endscript
    </div>
</div>
