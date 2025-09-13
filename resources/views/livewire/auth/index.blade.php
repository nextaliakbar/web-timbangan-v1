<div>
    <div class="login-box">
        <section class="content-header">
            <div class="container-fluid">
                <div class="login-logo">
                    <img src="{{asset('assets/image/pattern_kokola.png')}}" class="img-fluid">
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body login-card-body">
                        <form wire:submit.prevent="login">
                            @csrf
                            <div class="form-group">
                                <div class="input-group">
                                    <input wire:model="nik" type="text" class="form-control" placeholder="Masukkan NIK" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input wire:model="password" type="password" class="form-control" placeholder="Masukkan Password" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-md btn-primary w-100">
                                    <span wire:loading.remove wire:target="login">Masuk</span>

                                    <span wire:loading wire:target="login">
                                        <i class="fas fa-spinner fa-spin mr-2"></i> 
                                        Loading...
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <div wire:ignore.self class="modal fade" id="selectPurposeModal">
            <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pilih Tujuan Masuk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <button wire:click="goToWeightApp" type="button" class="btn btn-md btn-info">
                                    <i class="fas fa-weight mr-2"></i>
                                    Masuk ke Aplikasi Timbangan
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <button wire:click="loginToManagementApp" type="button" class="btn btn-md btn-success">
                                    <i class="fas fa-window-restore mr-2"></i>
                                    Masuk ke Aplikasi Manajemen
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

        @include('livewire.auth.weight-modal')

        @script
            <script>

                $wire.on('openSelectPurposeModal', ()=> {
                    $('#selectPurposeModal').modal('show');
                });
                
                $wire.on('openWeightModal', ()=> {
                    $('#selectPurposeModal').modal('hide');
                    $('#weightModal').modal('show');
                });

                $wire.on('errorModal', (evt)=> {
                    Swal.fire({
                        title: evt.title,
                        text: evt.text,
                        icon: evt.icon,
                        heightAuto: false
                    });
                });
            </script>
        @endscript
    </div>
</div>
