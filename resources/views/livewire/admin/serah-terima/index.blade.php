<div>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div wire:ignore class="col-sm-6">
                    <h1>Daftar Serah Terima 
                        <span class="badge badge-info p-2">
                            {{'Plant ' . strtoupper(request()->route()->parameter('plant'))}}
                        </span>
                        <span class="badge badge-secondary p-2">{{$dataSerahTerima->total()}}</span>
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
                                        <a wire:navigate href="{{route('admin.serah-terima', ['plant' => 'unimos'])}}" 
                                            class="nav-link {{request()->route()->parameter('plant') == 'unimos' ? 'active' : ''}}">
                                            <h5>UNIMOS</h5>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a wire:navigate href="{{route('admin.serah-terima', ['plant' => 'mgfi'])}}" 
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
                                            <input wire:model.live="search" type="text" class="form-control" placeholder="Cari berdasarkan uniq id, nama user">
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr style="background-color: #f4f6f9">
                                        <th>#</th>
                                        <th>UNIQ ID</th>
                                        <th>NAMA USER</th>
                                        <th>WAKTU</th>
                                        <th>PIC SERAH</th>
                                        <th>PIC TERIMA</th>
                                        <th><i class="fas fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($dataSerahTerima as $data)
                                        <tr wire:key="{{$data->UNIQ_ID}}">
                                            <td>{{$dataSerahTerima->firstItem() + $loop->index}}</td>
                                            <td>{{$data->UNIQ_ID}}</td>
                                            <td>{{$data->NAMA_USER}}</td>
                                            <td>{{$data->WAKTU}}</td>
                                            <td>{!! $data->PIC_SERAH == '' || empty($data->PIC_SERAH) ? '<span class="badge badge-danger p-2">Tidak Tersedia</span>' : $data->PIC_SERAH !!}</td>
                                            <td>{!! $data->PIC_TERIMA == '' || empty($data->PIC_TERIMA) ? '<span class="badge badge-danger p-2">Tidak Tersedia</span>' : $data->PIC_TERIMA !!}</td>
                                            <td>
                                                <button wire:click="edit({{$data->UNIQ_ID}})" 
                                                    type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-secondary">
                                                <h5>Tidak ada data yang tersedia</h5>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            {{$dataSerahTerima->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('livewire.admin.serah-terima.edit')

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
