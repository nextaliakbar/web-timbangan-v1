<?php

namespace App\Livewire\Auth;

use App\Models\UserEsa;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginLivewire extends Component
{
    public $nik, $password;

    public function render()
    {
        return view('livewire.auth.index');
    }

    public function login()
    {
        $this->validate([
            'nik' => 'required',
            'password' => 'required'
        ]);
        
        $user = UserEsa::where('USER', '=',$this->nik)->first();

        if ($user && hash('sha256', $this->password) === $user->PASS) {
            Auth::guard('admin')->login($user);

            if(empty($user->HAK)) {
                $this->dispatch('errorModal', 'Gagal', 'Akun ini tidak memiliki hak akses');
                return;
            }

            if($user->HAK == 'ADMIN') {
                $this->redirect(route('admin.peran-user'));
            } else {
                $modules = $user->userEsaRole->modules ?? [];

                if($modules[0] == 'User Timbangan') {
                    return redirect()->route('admin.user-timbangan');
                } elseif($modules[0] == 'Ganti JO') {
                    return redirect()->route('admin.ganti-jo');
                }

                $routeName = match($modules[0]) {
                    'Serah Terima' => 'admin.serah-terima',
                    'Timbangan' => 'admin.timbangan',
                    'Formula' => 'admin.formula',
                    'Kartu Stok' => 'admin.kartu-stok',
                };
                $this->redirect(route($routeName, ['plant' => 'unimos']));

            }
        } else {
            $this->dispatch('errorModal', title: 'Gagal', text: 'NIK atau Password Salah', icon: 'error');
        }
    }
}
