<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanData extends Model
{
    use HasFactory;

    protected $table = "permintaan_datas";

    protected $fillable = [
        'user_id',
        'judul',
        'pengantar',
        'proposal',
        'pernyataan',
        'file_pendukung_satu',
        'file_pendukung_dua',
        'unsur_iklim',
        'status',
        'file_data',
        'alasan',
        'pesan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
