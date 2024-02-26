<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'judul',
        'categori_id',
        'petugas_id',
        'isi',
        'status'
    ];
    public function kategori()
    {
        return $this->belongsTo(Category::class, 'id');
    }
    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }
    public function galery()
    {
        return $this->hasMany(Gallery::class, 'id');
    }
}
