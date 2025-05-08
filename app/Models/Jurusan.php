<?php

namespace App\Models;

use App\Models\Alumni;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Jurusan extends Model
{
    protected $fillable = ['jurusan'];
    public function post(): HasMany
    {
        return $this->hasMany(Alumni::class, 'jurusan_id');
    }
}
