<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Divisi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_divisi',
    ];

    public function akun(): HasMany
    {
        return $this->hasMany(Akun::class);
    }
}
