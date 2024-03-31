<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tiket extends Model
{
    use HasFactory;
    use SoftDeletes;

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

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    public function akun(): BelongsTo
    {
        return $this->belongsTo(Akun::class);
    }

    public function penjawab(): BelongsTo
    {
        return $this->belongsTo(Akun::class, 'penjawab_id');
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
        return $this->hasMany(Respon::class)->orderBy('created_at', 'asc');
    }
}
