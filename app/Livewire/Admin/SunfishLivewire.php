<?php

namespace App\Livewire\Admin;

use App\Models\DariKe;
use App\Models\TbTimbang;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SunfishLivewire extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $plant, $search1, $search2,
    $paginate1, $paginate2, $uniqId,
    $idBarang, $namaBarang, $wta, $wht,
    $dariKe;

    public function mount($plant)
    {
        $this->plant = $plant;
    }

    public function updatedPaginate1()
    {
        $this->resetPage("page1");
    }


    public function updatedPaginate2()
    {
        $this->resetPage("page2");
    }

    public function updatingSearch1()
    {
        $this->resetPage('page1');
    }

    public function updatingSearch2()
    {
        $this->resetPage('page2');
    }

    public function render()
    {
        $data = [
            'dataTimbang1' => TbTimbang::selectRaw("Id, UNIQ_ID, WAKTU, WTA, WHT, COUNT(Id) as before_total,
            IF(WAKTU <= (DATE_SUB(NOW(), INTERVAL 1 MONTH)), '1', '0') as filter_by_interval")
            ->where('PLANT', '=', $this->plant == 'unimos' ? 2 : 7)
            ->when($this->dariKe, function($query) {
                $query->where(function($sql) {
                    $sql->where('UNIQ_ID', 'like', '%'.$this->dariKe.'%');
                    $sql->when(substr($this->dariKe, -3) == 'NDM', function($q) {
                        $subKalimat = substr($this->dariKe, -3);
                        $q->orWhere('UNIQ_ID', 'like', '%'.$subKalimat.'%');
                    });
                });
            })
            ->where(function ($query) {
                $query->whereNull('WHT')
                    ->orWhereNull('WTA');
            })
            ->whereBetween('WAKTU', [DB::raw('DATE_SUB(NOW(), INTERVAL 2 MONTH)'), DB::raw('NOW()')])
            ->where('UNIQ_ID', 'like', '%' . $this->search1 . '%')
            ->groupBy('UNIQ_ID', 'WAKTU', 'WTA', 'WHT', 'Id')
            ->orderBy('WAKTU', 'DESC')
            ->paginate($this->paginate1 ?? 10, ['*'], 'page1'),

            'dataTimbang2' => TbTimbang::selectRaw("
            ID, TIME(WAKTU) as JAM, DATE(WAKTU) AS WAKTU, 
            ID_BARANG, UNIQ_ID, NAMA_BARANG, BERAT_FILTER, WTA, WHT
            ")
            ->where('PLANT', '=', $this->plant == 'unimos' ? 2 : 7)
            ->when($this->dariKe, function($query) {
                $query->where('UNIQ_ID', 'like', '%'.$this->dariKe.'%');
            })
            ->where(function($query) {
                $query->where('ID_BARANG', 'like', '%'.$this->search2.'%')
                ->orWhere('UNIQ_ID', 'like', '%'.$this->search2.'%')
                ->orWhere('NAMA_BARANG', 'like', '%'.$this->search2.'%')
                ->orWhere('WAKTU', 'like', '%'.$this->search2.'%')
                ->orWhere('BERAT_FILTER', 'like', '%'.$this->search2.'%')
                ->orWhere('WTA', 'like', '%'.$this->search2.'%')
                ->orWhere('WHT', 'like', '%'.$this->search2.'%');
            })
            ->orderBy('WAKTU', 'DESC')
            ->paginate($this->paginate2 ?? 10, ['*'], 'page2'),

            'dataDariKe' => DariKe::where('PLANT', '=', $this->plant == 'unimos' ? 2 : 7)
            ->get()
        ];

        return view('livewire.admin.timbangan.sunfish.index', $data);
    }

    public function exportPdf($uniqId)
    {
        // $date = date('Y-m-d', strtotime('2018-03-05T00:00'));

        $data = TbTimbang::select('tb_timbang_temp.*', 'push_daftar_barang.SATUAN')
        ->leftJoin('push_daftar_barang', 'tb_timbang_temp.ID_BARANG', '=', 'push_daftar_barang.ID_SUNFISH')
        ->leftJoin('m_barang', 'tb_timbang_temp.ID_BARANG', '=', 'm_barang.ID_SUNFISH')
        ->where('tb_timbang_temp.UNIQ_ID', '=', $uniqId)
        ->first();

        $items = TbTimbang::selectRaw('
            MAX(UNIQ_ID) as UNIQ_ID,
            ID_BARANG,
            MAX(NAMA_BARANG) as NAMA_BARANG,
            TGL_PRODUKSI,
            SHIFT_PRODUKSI,
            MAX(WTA) as WTA,
            MAX(WHT) as WHT,
            MAX(WAKTU) as WAKTU,
            SUM(BERAT_FILTER) as BERAT_FILTER,
            SUM(QTY) as REALQTY,
            SUM(PCS) as PCS,
            COUNT(QTY) as QTY
        ')
        ->where('UNIQ_ID', '=', $uniqId)
        ->groupBy('ID_BARANG', 'TGL_PRODUKSI', 'SHIFT_PRODUKSI')
        ->orderByRaw('MAX(WAKTU) DESC')
        ->get();

        // $time = TbTimbang::where('UNIQ_ID', '=', $uniqId)->value('WAKTU');
        // $weights = (object)[];
        // $tableName = $time < $date ? 'm_barang' : 'push_daftar_barang';

        // foreach ($items as $item) {
        //     if($item->REALQTY > 1) {
        //         $query = "SELECT a.*, b.SATUAN 
        //                 FROM tb_timbang_1 a, {$tableName} b 
        //                 WHERE a.ID_BARANG = b.ID_SUNFISH 
        //                 AND a.UNIQ_ID = ? 
        //                 AND a.ID_BARANG = ?
        //                 AND a.QTY = ?";
        //         $weights = DB::select($query, [
        //             $uniqId,
        //             $item->ID_BARANG,
        //             $item->REALQTY
        //         ]);
        //     } else {
        //         $query = "SELECT a.*, b.SATUAN 
        //                 FROM tb_timbang_1 a, {$tableName} b 
        //                 WHERE a.ID_BARANG = b.ID_SUNFISH 
        //                 AND a.UNIQ_ID = ? 
        //                 AND a.ID_BARANG = ?
        //                 AND a.TGL_PRODUKSI = ?
        //                 AND a.SHIFT_PRODUKSI = ?";
        //         $weights = DB::select($query, [
        //             $uniqId,
        //             $item->ID_BARANG,
        //             $item->REALQTY,
        //             $item->TGL_PRODUKSI,
        //             $item->SHIFT_PRODUKSI
        //         ]);
        //     }
        // }

        // $elements = [];

        // foreach($weights as $weight) {
        //     $gs = substr($weight->BERAT, 0, 4);
        //     if($gs == 'ST,+' || $gs == '@02s' || $weight->BERAT == '1') {
        //         $elements[] = '<span class="badge badge-dark p-2">'.round($weight->BERAT_FILTER).'</span>';
        //     } else {
        //         $elements[] = '<span class="badge badge-danger p-2">'.round($weight->BERAT_FILTER).'</span>';
        //     }
        // }
        $pdfContent = Pdf::loadView('livewire.admin.timbangan.sunfish.report-sunfish-pdf', [
            'plant' => strtoupper($this->plant),
            'data' => $data,
            'items' => $items,
            // 'elements' => $elements
        ])
        ->output();
        $fileName = 'Laporan Serah Terima Plant ' . strtoupper($this->plant . '.pdf');

        return response()->streamDownload(fn() => print($pdfContent),$fileName);
    }

    public function edit($uniqId)
    {
        $data = TbTimbang::where('UNIQ_ID', '=', $uniqId)
        ->firstOrFail();

        $this->uniqId = $data->UNIQ_ID;
        $this->idBarang = $data->ID_BARANG;
        $this->namaBarang = $data->NAMA_BARANG;
        $this->wta = $data->WTA;
        $this->wht = $data->WHT;
    }

    public function rules()
    {
        return [
            'wta' => 'required|numeric',
            'wht' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'wta.required' => 'WTA tidak boleh kosong',
            'wta.numeric' => 'WTA harus berupa angka',
            'wht.required' => 'WHT tidak boleh kosong',
            'wht.numeric' => 'WHT harus berupa angka'
        ];
    }

    public function update()
    {
        $this->validate();

        TbTimbang::where('UNIQ_ID', '=', $this->uniqId)
        ->update([
            'WTA' => $this->wta,
            'WHT' => $this->wht
        ]);

        $this->dispatch('closeModalEdit', title: 'Sukses', text: 'Data berhasil perbarui', icon: 'success');
    }
}
