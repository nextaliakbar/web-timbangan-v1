<div>
    <div class="content-wrapper">
        <section class="content-header">
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h4>Pengaturan Peran User</h4>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="storeOrUpdate">
                            @csrf
                            <div class="form-group">
                                <label>Nama Peran</label>
                                <input wire:model="role" type="text" class="form-control 
                                @error('role') is-invalid @enderror" placeholder="Misal : User">
                                @error('role')
                                    <div>
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <div>
                                    <label class="mr-4">Modul :</label>
                                    <div class="icheck-primary d-inline mr-2">
                                        <input wire:model="modules" type="checkbox" name="userTimbangan" id="userTimbangan" value="User Timbangan">
                                        <label for="userTimbangan">User Timbangan</label>
                                    </div>
                                    <div class="icheck-primary d-inline mr-2">
                                        <input wire:model="modules" type="checkbox" name="serahTerima" id="serahTerima" value="Serah Terima">
                                        <label for="serahTerima">Serah Terima</label>
                                    </div>
                                    <div class="icheck-primary d-inline mr-2">
                                        <input wire:model="modules" type="checkbox" name="timbangan" id="timbangan" value="Timbangan">
                                        <label for="timbangan">Timbangan</label>
                                    </div>
                                    <div class="icheck-primary d-inline mr-2">
                                        <input wire:model="modules" type="checkbox" name="gantiJo" id="gantiJo" value="Ganti JO">
                                        <label for="gantiJo">Ganti JO</label>
                                    </div>
                                    <div class="icheck-primary d-inline mr-2">
                                        <input wire:model="modules" type="checkbox" name="formula" id="formula" value="Formula">
                                        <label for="formula">Formula</label>
                                    </div>
                                    <div class="icheck-primary d-inline mr-2">
                                        <input wire:model="modules" type="checkbox" name="kartuStok" id="kartuStok" value="Kartu Stok">
                                        <label for="kartuStok">Kartu Stok</label>
                                    </div>
                                </div>
                                @error('modules')
                                    <div>
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
    
                            <div class="form-group float-right">
                                <button type="submit" class="btn btn-md btn-primary">
                                    <i class="fas fa-save mr-2"></i>
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>Daftar Peran <span class="badge badge-secondary p-2">{{$userRoles->total()}}</span></h4>
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
                                            <input wire:model.live="search" type="text" class="form-control" placeholder="Cari berdasarkan nama peran">
                
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
                                        <th>Nama Peran</th>
                                        <th>Daftar Module</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Status Peran</th>
                                        <th><i class="fas fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($userRoles as $data)
                                        <tr wire:key="{{$data->id}}">
                                            <td>{{$userRoles->firstItem() + $loop->index}}</td>
                                            <td>{{$data->role}}</td>
                                            <td>
                                                <div style="display: flex;">
                                                    @foreach (collect($data->modules)->chunk(3) as $chunk)
                                                        <div>
                                                            <ul>
                                                                @foreach ($chunk as $module)
                                                                    <li>{{ $module }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td>{{date('Y-m-d H:i', strtotime($data->created_at))}}</td>
                                            <td>
                                                <div class="custom-control custom-switch">
                                                    <input wire:click="updateStatus({{$data->id}})" type="checkbox" class="custom-control-input" id="status"
                                                    {{$data->status ? 'checked' : ''}}>
                                                    <label class="custom-control-label" for="status"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <button wire:click="edit({{$data->id}})" type="button" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-secondary">
                                                Tidak ada data yang tersedia
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">{{$userRoles->links()}}</div>
                    </div>
                </div>
            </div>
        </section>

        @script
            <script>
                Livewire.on('notifStoreOrUpdate', (evt)=> {
                    Swal.fire({
                        title: evt.title,
                        text: evt.text,
                        icon: evt.icon
                    });
                });

                Livewire.on('notifUpdateStatus', (evt)=> {
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
