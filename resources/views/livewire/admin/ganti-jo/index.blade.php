<div>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div wire:ignore class="col-sm-6">
                        <h1>Laporan Hasil Input di Lapangan
                            <span class="badge badge-info p-2">
                                Plant {{strtoupper(auth()->guard('admin')->user()->TEMPAT)}}
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
                            <h4>Daftar JO <span class="badge badge-secondary p-2">{{$dataJo->total()}}</span></h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="row">
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
        
                                    <div class="col-md-4">
                                        <select wire:model.live="interval" class="form-control">
                                            <option value="2">2 Bulan Terakhir</option>
                                            <option value="4">4 Bulan Terakhir</option>
                                            <option value="6">6 Bulan Terakhir</option>
                                            <option value="8">8 Bulan Terakhir</option>
                                            <option value="10">10 Bulan Terakhir</option>
                                            <option value="10">12 Bulan Terakhir</option>
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
                                            <input wire:model.live="search" type="text" class="form-control" placeholder="Cari berdasarkan id barang, nama barang, uniq id, id jo">
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
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr style="background-color: #f4f6f9">
                                            <th>#</th>
                                            <th>WAKTU</th>
                                            <th>ID BARANG</th>
                                            <th>NAMA BARANG</th>
                                            <th>BERAT</th>
                                            <th>UNIQ ID</th>
                                            <th>NO JO</th>
                                            <th><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr wire:target="search, interval, paginate, nextPage, previousPage, gotoPage" 
                                        wire:loading.delay.class="d-table-row" class="d-none">
                                            <td colspan="8" class="text-center py-4">
                                                <div class="spinner-border text-primary" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                                <h5 class="mt-2">Memuat data...</h5>
                                            </td>
                                        </tr>
                                        @forelse ($dataJo as $data)
                                            <tr wire:key="{{$data->Id}}" wire:loading.remove>
                                                <td>{{ $dataJo->firstItem() + $loop->index }}</td>
                                                <td>{{ date('Y-m-d H:i', strtotime($data->WAKTU)) }}</td>
                                                <td>{{ $data->ID_BARANG }}</td>
                                                <td>{{ $data->NAMA_BARANG }}</td>
                                                <td>{{ $data->BERAT_FILTER }}</td>
                                                <td>{{ $data->UNIQ_ID }}</td>
                                                <td>{!! empty($data->NO_JO) || $data->NO_JO == '-' 
                                                ? '<span class="badge badge-danger p-2">Tidak Tersedia</span>' : $data->NO_JO !!}</td>
                                                <td>
                                                    <button wire:click="edit('{{$data->Id}}')" type="button" class="btn btn-sm btn-warning"
                                                        data-toggle="modal" data-target="#editModal">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr wire:loading.remove>
                                                <td colspan="8" class="text-center text-secondary">
                                                    <h5>Tidak ada data yang tersedia</h5>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                    {{-- <tr>
                                        <td>1</td>
                                        <td>2025-08-15 12.00</td>
                                        <td>01031003020016</td>
                                        <td>Bs Kosong Ws Majoroll</td>
                                        <td>3.75 KG</td>
                                        <td>UNIMOS/1/60/WFR-PRP/VIII/25/11031</td>
                                        <td>JOD2012508-0005879</td>
                                        <td>
                                            <button wire:click="edit('1409114')" type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr> --}}
                                </table>
                                <div class="form-group">
                                    {{$dataJo->links()}}    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('livewire.admin.ganti-jo.edit')

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

                $wire.on('modalConfirmUpdate', ()=> {
                    Swal.fire({
                    title: "Anda yakin?",
                    text: "Apakah anda ingin merubah No. JO menjadi kosong?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Lanjutkan",
                    cancelButtonText: "Tidak",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $wire.call('forceUpdate');
                        }
                    });
                })
            </script>
        @endscript
    </div>
</div>
