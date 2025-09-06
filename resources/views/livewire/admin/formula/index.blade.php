<div>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div wire:ignore class="col-sm-6">
                    <h1>Laporan Hasil Input Formula 
                        <span class="badge badge-info p-2">
                            {{'Plant ' . strtoupper(request()->route()->parameter('plant'))}}
                        </span>
                        <span class="badge badge-secondary p-2">{{$dataFormula->total()}}</span>
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
                                        <a wire:navigate href="{{route('admin.formula', ['plant' => 'unimos'])}}" 
                                            class="nav-link {{request()->route()->parameter('plant') == 'unimos' ? 'active' : ''}}">
                                            <h5>UNIMOS</h5>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a wire:navigate href="{{route('admin.formula', ['plant' => 'mgfi'])}}" 
                                            class="nav-link {{request()->route()->parameter('plant') == 'mgfi' ? 'active' : ''}}">
                                            <h5>MGFI</h5>
                                        </a>
                                    </li>
                                </ul>
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
                                            <input wire:model.live="search" type="text" class="form-control" placeholder="Cari berdasarkan no timbang, id barang">
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
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr style="background-color: #f4f6f9">
                                        <th>#</th>
                                        <th>WAKTU</th>
                                        <th>NO TIMBANG</th>
                                        <th>ID BARANG</th>
                                        <th>NAMA BARANG</th>
                                        <th>NO LOT</th>
                                        <th>BATCH</th>
                                        <th>BERAT</th>
                                        <th>BERAT PER LOT</th>
                                        <th>KET</th>
                                        <th><i class="fas fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($dataFormula as $data)
                                        <tr wire:key="{{$data->ID}}">
                                            <td>{{$dataFormula->firstItem() + $loop->index}}</td>
                                            <td>{{date('Y-m-d H:i', strtotime($data->WAKTU_TIMBANG))}}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        {{$data->NO_DOK}}
                                                    </div>
                                                    <div class="col-auto">
                                                        <button wire:click="exportPdf('{{$data->NO_DOK}}')" type="button" class="btn btn-sm btn-danger">
                                                            <i class="fas fa-file-pdf"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$data->ITEM_CODE}}</td>
                                            <td>{{$data->NAMA_BARANG}}</td>
                                            <td>{{$data->NO_LOT}}</td>
                                            <td>{{$data->BATCH}}</td>
                                            <td>{{$data->BERAT_FILTER}}</td>
                                            <td>{{number_format($data->BERAT_PER_LOT, 2, ",")}}</td>
                                            <td>{{$data->KET}}</td>
                                            <td>
                                                <button wire:click="edit({{$data->ID}})" 
                                                    type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button wire:click="confirm({{$data->ID}})" 
                                                    type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="11" class="text-center text-secondary">
                                                <h5>Tidak ada data yang tersedia</h5>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            {{$dataFormula->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('livewire.admin.formula.edit')

        @include('livewire.admin.formula.delete')

        @script
            <script>
                $('#productionDate').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm', 
                    icons: {time: 'far fa-clock'} 
                });

                $('#weighingDate').datetimepicker({
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
