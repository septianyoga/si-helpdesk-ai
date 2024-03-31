<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Respon extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'pesan',
        'tipe',
        'action_by',
        'tiket_id',
    ];

    public function lampiran(): HasMany
    {
        return $this->hasMany(Lampiran::class);
    }

    public function agent(): BelongsTo
    {
        return $this->belongsTo(Akun::class, 'action_by');
    }
}
