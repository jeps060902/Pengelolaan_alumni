<?php

namespace App\Models;

use App\Models\Jurusan;
use App\Models\Angkatan;
use App\Models\Prestasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Alumni extends Model
{
    protected $fillable = ['Nama', 'angkatan', 'jurusan'];
    protected $with = ['prestasi'];
    public function prestasi(): HasMany
    {

        return $this->hasMany(Prestasi::class, 'alumni_id');
    }
}
