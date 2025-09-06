<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        return view('livewire.navbar');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        $this->redirect(route('login'));
    }
}
