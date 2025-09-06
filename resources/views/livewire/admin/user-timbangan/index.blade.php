<div>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>User Timbangan <span class="badge badge-secondary p-2">{{$userEsa->total()}}</span></h1>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">  
                <!-- cart header -->
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <button wire:click="create" class="btn btn-primary" type="button" data-toggle="modal" data-target="#createModal">
                                <i class="fas fa-plus mr-1"></i>Tambah
                            </button>
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
                                        <input wire:model.live="search" type="text" class="form-control" placeholder="Cari berdasarkan nik, nama">
            
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
                <!-- /.card-header -->
    
                <!-- cart body -->
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr style="background-color: #f4f6f9">
                            <th style="width: 10px">#</th>
                            <th>NIK</th>
                            <th>NAMA USER</th>
                            <th>PLANT</th>
                            <th>PIC</th>
                            <th>BAGIAN</th>
                            <th>PROGRAM</th>
                            <th>DEPARTMENT</th>
                            <th>HAK</th>
                            <th style="width: 100px;"><i class="fas fa-cog"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($userEsa as $usrEsa)
                            <tr wire:key="{{$usrEsa->USER}}">
                                <td>{{$userEsa->firstItem() + $loop->index}}</td>
                                <td>{{$usrEsa->USER}}</td>
                                <td>{{$usrEsa->NAMA}}</td>
                                <td>{!! $usrEsa->TEMPAT == '' || empty($usrEsa->TEMPAT) ? '<span class="badge badge-danger p-2">Tidak Tersedia</span>' : $usrEsa->TEMPAT !!}</td>
                                <td>{!! $usrEsa->PIC == '' || empty($usrEsa->PIC) ? '<span class="badge badge-danger p-2">Tidak Tersedia</span>' : $usrEsa->PIC !!}</td>
                                <td>{!! $usrEsa->BAGIAN == '' || empty($usrEsa->BAGIAN) ? '<span class="badge badge-danger p-2">Tidak Tersedia</span>' : $usrEsa->BAGIAN !!}</td>
                                <td>{!! $usrEsa->AKSES == 1 ? 'Desktop' : ($usrEsa->AKSES == 2 ? 'Web' : ($usrEsa->AKSES == 3 ? 'Desktop & Web' : '<span class="badge badge-danger p-2">Tidak Tersedia</span>')) !!}</td>
                                <td>{!! $usrEsa->DEPT == '' || empty($usrEsa->DEPT) ? '<span class="badge badge-danger p-2">Tidak Tersedia</span>' : $usrEsa->DEPT !!}</td>
                                <td>{!! $usrEsa->HAK == '' || empty($usrEsa->HAK) ? '<span class="badge badge-danger p-2">Tidak Tersedia</span>' : $usrEsa->HAK !!}</td>
                                <td>
                                    <button wire:click="edit('{{$usrEsa->USER}}')" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button wire:click="confirm('{{$usrEsa->USER}}')" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal">
                                        <i class="fas fa-trash"></i>
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
                    {{$userEsa->links()}}    
                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
    <!-- create modal -->
    @include('livewire.admin.user-timbangan.create')
    <!-- /.create modal -->

    <!-- edit modal -->
    @include('livewire.admin.user-timbangan.edit')
    <!-- /.edit modal -->

    <!-- delete modal -->
    @include('livewire.admin.user-timbangan.delete')
    <!-- /.delete modal -->
    @script
        <script>
            'use-strict';

            $wire.on('closeModalCreate', (evt)=> {
                $('#createModal').modal('hide');
                Swal.fire({
                    title: evt.title,
                    text: evt.text,
                    icon: evt.icon
                });
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
    <!-- /.content-wrapper -->
</div>
