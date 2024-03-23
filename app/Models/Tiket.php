<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tiket extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'ringkasan_masalah',
        'status',
        'tipe',
        'penyebab',
        'akun_id',
        'kategori_permasalahan_id',
        'dampak_permasalahan_id',
        'penjawab_id',
    ];

    public function akun(): BelongsTo
    {
        return $this->belongsTo(Akun::class);
    }

    public function kategori_permasalahan(): BelongsTo
    {
        return $this->belongsTo(KategoriPermasalahan::class);
    }

    public function dampak_permasalahan(): BelongsTo
    {
        return $this->belongsTo(DampakPermasalahan::class);
    }

    public function respon(): HasMany
    {
        return $this->hasMany(Respon::class);
    }
}
