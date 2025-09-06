<div>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div wire:ignore class="col-sm-6">
                        <h1>Laporan Hasil Input di Lapangan
                            <span class="badge badge-info p-2">
                                Plant UNIMOS
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
                            <h4>Daftar JO</h4>
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
        
                                    <div class="col-md-3">
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
                                        
                                    </tbody>
                                </table>
                                <div class="form-group">
                                       
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('livewire.admin.konversi-jo.edit')

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
