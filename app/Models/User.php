<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'user';
    protected $primaryKey = "ID";
    public $timestamps = false;
    protected $fillable = [
        'ID', 'USER', 'PASS',
        'PIC', 'TEMPAT', 'BAGIAN',
        'HAK', 'FLAG', 'FLAG_UMS_2',
        'FLAG_MGFI'
    ];
}
