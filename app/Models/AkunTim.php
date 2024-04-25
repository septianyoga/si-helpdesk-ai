<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AkunTim extends Model
{
    use HasFactory;
    protected $table =  'akun_tim';
    protected $fillable = [
        'akun_id',
        'tim_id'
    ];

    public function tim(): BelongsTo
    {
        return $this->belongsTo(Tim::class);
    }

    public function akun(): BelongsTo
    {
        return $this->belongsTo(Akun::class);
    }
}
