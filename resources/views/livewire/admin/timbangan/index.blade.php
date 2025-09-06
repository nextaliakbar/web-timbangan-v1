<div>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div wire:ignore class="col-sm-6">
                        <h1>Laporan Hasil Input di Lapangan
                            <span class="badge badge-info p-2">
                                Plant {{is_numeric($plant) ? ($plant == 2 ? 'UNIMOS' : 'MGFI') : strtoupper($plant)}}
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
                                        <a wire:navigate href="{{route('admin.timbangan', ['plant' => 'unimos'])}}" 
                                            class="nav-link {{request()->route()->parameter('plant') == 'unimos' ? 'active' : ''}}">
                                            <h5>UNIMOS</h5>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a wire:navigate href="{{route('admin.timbangan', ['plant' => 'mgfi'])}}" 
                                            class="nav-link {{request()->route()->parameter('plant') == 'mgfi'? 'active' : ''}}">
                                            <h5>MGFI</h5>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="row">
                                    <div>
                                        <a wire:navigate href="{{route('admin.timbangan.sunfish', ['plant' => is_numeric($plant) ? ($plant == 2 ? 'unimos' : 'mgfi') : $plant])}}" class="mr-2">
                                            <button type="button" class="btn btn-secondary">
                                                Input No.Sunfish
                                            </button>
                                        </a>
                                    </div>

                                    <div>
                                        <div class="btn-group dropright">
                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-info"></i>
                                            </button>
                                            <div class="dropdown-menu p-2" style="width: 500px;">
                                                <p class="text-muted">
                                                    NB: Cara Penggunaan. Jika ingin mencari bagian Tertentu, langsung saja cari di search 
                                                    misal: STC-PRP, QA-GA Atau no BSTBnya langsung.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="col-md-6">
                                        <select wire:model.live="dariKe" class="form-control">
                                            <option value="" selected>Semua</option>
                                            <option value="" disabled selected>-- Pilih dari tempat awal ke tempat tujuan --</option>
                                            @foreach ($dataDariKe as $data)
                                                <option value="{{substr($data->KODE, 1, -1)}}">{{$data->DARI_KE}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <select wire:model.live="interval" class="form-control">
                                            <option value="3">3 Bulan Terakhir</option>
                                            <option value="6">6 Bulan Terakhir</option>
                                        </select>
                                    </div>
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
                                            <input wire:model.live="search" type="text" class="form-control" placeholder="Cari berdasarkan uniq id, nama barang, id barang">
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

                        <div class="row">
                            <div class="form-group">
                                <h4>Daftar BSTB Belum di STF kan <span class="badge badge-secondary">{{$dataTimbang->total()}}</span></h4>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr style="background-color: #f4f6f9">
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>WAKTU</th>
                                            <th>ID BARANG</th>
                                            <th>NAMA BARANG</th>
                                            <th>BERAT</th>
                                            <th>UNIQ ID</th>
                                            <th><i class="fas fa-print"></i></th>
                                            <th><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($dataTimbang as $data)
                                            <tr wire:key="{{$data->ID}}">
                                                <td>{{$dataTimbang->firstItem() + $loop->index}}</td>
                                                <td>{{$data->ID}}</td>
                                                <td>{{$data->WAKTU}}</td>
                                                <td>{{$data->ID_BARANG}}</td>
                                                <td>{{$data->NAMA_BARANG}}</td>
                                                <td>{{$data->BERAT_FILTER}}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            {{$data->UNIQ_ID}}
                                                        </div>
                                                        <div class="col-auto">
                                                            <button wire:click="exportPdf1({{$data->ID}})" type="button" class="btn btn-sm btn-danger">
                                                                <i class="fas fa-file-pdf"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button wire:click="exportPdf2({{$data->ID}})" type="button" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button wire:click="edit({{$data->ID}})" type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button wire:click="confirm({{$data->ID}})" type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center text-secondary">
                                                    <h5>Tidak ada data yang tersedia</h5>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="form-group">
                                    {{$dataTimbang->links()}}    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('livewire.admin.timbangan.edit')

        @include('livewire.admin.timbangan.delete')

        @script
            <script>
                $('#productionDate').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm', 
                    icons: {time: 'far fa-clock'} 
                });

                $('#weightDate').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm', 
                    icons: {time: 'far fa-clock'} 
                });

                $wire.on('closeModalEdit', (evt)=> {
                    $('#editModal').modal('hide');
                    Swal.fire({
                        title: evt.title,
                        text: evt.text,
                        icon: evt.icon
                    });
                });

                $wire.on('closeModalDelete', (evt)=> {
                    $('#deleteModal').modal('hide');
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
