<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tim extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tim',
    ];

    public function akun(): HasMany
    {
        return $this->hasMany(Akun::class);
    }
}
