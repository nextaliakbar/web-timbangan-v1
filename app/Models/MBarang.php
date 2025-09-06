<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MBarang extends Model
{
    protected $table = 'm_barang';

    protected $fillable = [
        'Id', 'ID_BARANG', 'ID_SUNFISH',
        'NAMA_BARANG', 'itemCategoryType',
        'KATEGORI', 'SATUAN', 'MIN', 'MAX',
        'PENGURANGAN', 'FLAG', 'FLAG_UMS_2',
        'FLAG_MGFI', 'STATUS', 'INACTIVE'
    ];

    public $timestamps = false;
}
