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
                                    Masuk
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        @script
            <script>
                $wire.on('errorModal', (evt)=> {
                    Swal.fire({
                        title: evt.title,
                        text: evt.text,
                        icon: evt.icon,
                        heightAuto: false
                    })
                })
            </script>
        @endscript
    </div>
</div>
