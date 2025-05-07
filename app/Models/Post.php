<?php

namespace App\Models;

use App\Models\User;
use App\Models\Kategori; // ← Tambahkan baris ini
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author', 'body'];
    protected $with = ['author', 'kategoris'];
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function kategoris(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
