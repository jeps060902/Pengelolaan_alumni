<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    /** @use HasFactory<\Database\Factories\KategoriFactory> */
    use HasFactory;
    protected $fillable = ['slug', 'name', 'kategori'];
    public function post(): HasMany
    {
        return $this->hasMany(Post::class, 'kategori_id');
    }
}
