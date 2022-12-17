<?php

namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class anggotaModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'anggota';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'username',
        'password',
        'nip',
        'nohp',
        'jenis_kelamin',
        'foto',
        'jabatan',
    ];
}
