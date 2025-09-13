<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class UserEsa extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user_esa';

    protected $primaryKey = 'Id';

    public $timestamps = false;
    
    protected $fillable = [
        'Id',
        'USER',
        'NAMA',
        'PASS',
        'PASS2',
        'PIC',
        'TEMPAT',
        'BAGIAN',
        'HAK',
        'AKSES',
        'FLAG',
        'DEPT',
        'ID_USER',
        'PICPASS',
        'PIC_VERIFIKATOR',
        'TUJUAN'
    ];

    protected $casts = ['TUJUAN' => 'array'];

    public function userEsaRole()
    {
        return $this->hasOne(UserRole::class, 'role', 'HAK');
    }
}
