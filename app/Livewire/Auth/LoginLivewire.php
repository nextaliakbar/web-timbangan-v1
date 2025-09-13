<?php

namespace App\Livewire\Auth;

use App\Models\UserEsa;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginLivewire extends Component
{
    public $nik, $password, $jenisPic,
    $pic, $passwordPic;

    public UserEsa $userEsa;

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
        
        $userEsa = UserEsa::where('USER', '=',$this->nik)->first();

        if ($userEsa && hash('sha256', $this->password) === $userEsa->PASS) {
            $this->userEsa = $userEsa;
            $this->dispatch('openSelectPurposeModal');
        } else {
            $this->dispatch('errorModal', title: 'Gagal', text: 'NIK atau Password Salah', icon: 'error');
        }
    }

    public function loginToManagementApp()
    {
        if(!$this->userEsa) {
            $this->dispatch('errorModal', title: 'Gagal', text: 'Terjadi kesalahan', icon: 'error');
            return;
        }

        if(empty($this->userEsa->HAK)) {
            $this->dispatch('errorModal', 'Gagal', 'Akun ini tidak memiliki hak akses');
            return;
        }

        Auth::guard('admin')->login($this->userEsa);


        if($this->userEsa->HAK == 'ADMIN') {
            $this->redirect(route('admin.peran-user'));
        } else {
            $modules = $this->userEsa->userEsaRole->modules ?? [];

            if($modules[0] == 'User Timbangan') {
                $this->redirect(route('admin.user-timbangan'));
            } elseif($modules[0] == 'Ganti JO') {
                $this->redirect(route('admin.ganti-jo'));
            }

            $routeName = match($modules[0]) {
                'Serah Terima' => 'admin.serah-terima',
                'Timbangan' => 'admin.timbangan',
                'Formula' => 'admin.formula',
                'Kartu Stok' => 'admin.kartu-stok',
            };
            $this->redirect(route($routeName, ['plant' => 'unimos']));
        }
    }

    public function goToWeightApp()
    {
        session()->put('guest', 'user');

        $this->jenisPic = $this->userEsa->PIC == 'PIC_SERAH' ? 'Terima' : 'Serah';

        $this->dispatch('openWeightModal');
    }

    public function loginToWeightApp()
    {
        $userEsa = UserEsa::where('PIC', '=', $this->jenisPic == 'Serah' ? 'PIC_SERAH' : 'PIC_TERIMA')
        ->where('USER', '=', $this->pic)
        ->first();

        if($userEsa && hash('sha256', $this->passwordPic) === $userEsa->PASS) {
            session()->put('user-pic', $userEsa);
            Auth::guard('user')->login($this->userEsa);
            $this->redirect(route('main-app.index'));
        } else {
            $this->dispatch('errorModal', title: 'Gagal', text: 'NIK atau Password Salah', icon: 'error');
        }
    }
}
