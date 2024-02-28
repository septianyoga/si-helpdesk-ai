<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DampakPermasalahan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_dampak',
        'prioritas'
    ];
}
