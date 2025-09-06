<?php

namespace App\Livewire\Admin;

use App\Models\DariKe;
use App\Models\JoTimbang;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class KonversiJoLivewire extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search, $idJo, $uniqId, $namaBrg,
    $beratFilter, $waktu, $noJoLama, $noJo;

    public $interval = "3";

    public $paginate = "10";

    public function render()
    {

        return view('livewire.admin.konversi-jo.index');
    }
}
