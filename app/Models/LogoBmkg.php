<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogoBmkg extends Model
{
    use HasFactory;

    protected $fillable = [
        'desc',
        'img',
    ];
}
