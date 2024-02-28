<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KategoriPermasalahan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_topik',
        'tim_id'
    ];
    public function tim(): BelongsTo
    {
        return $this->belongsTo(Tim::class);
    }
}
