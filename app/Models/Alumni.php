<?php

namespace App\Models;

use App\Models\Jurusan;
use App\Models\Angkatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Alumni extends Model
{
    protected $fillable = ['nama', 'angkatan_id', 'jurusan_id'];
    protected $with = ['Jurusans', 'Angkatans'];
    public function Jurusans(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function Angkatans(): BelongsTo
    {

        return $this->belongsTo(Angkatan::class, 'angkatan_id');
    }
}
