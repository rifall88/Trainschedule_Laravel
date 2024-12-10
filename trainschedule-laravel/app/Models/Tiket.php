<?php

namespace App\Models;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tabel_tiket';
    protected $primaryKey = 'Id_Tiket';

    protected $fillable = [
        'Stasiun_Asal',
        'Stasiun_Tujuan',
        'Class',
        'Tanggal_Berangkat',
        'Jumlah_PenumpangDewasa',
        'Jumlah_PenumpangBayi',
    ];
}
