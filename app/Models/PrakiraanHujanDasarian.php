<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrakiraanHujanDasarian extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'desc',
        'first_img',
        'first_pdf',
        'second_img',
        'second_pdf',
        'three_img',
        'three_pdf',
    ];
}
