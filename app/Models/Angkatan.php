<?php

namespace App\Models;

use App\Models\Alumni;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Angkatan extends Model
{
    protected $fillable = ['angkatan'];
    public function post(): HasMany
    {
        return $this->hasMany(Alumni::class, 'angkatan_id');
    }
}
