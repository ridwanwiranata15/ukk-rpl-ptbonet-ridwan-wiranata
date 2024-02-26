<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'foto';
    protected $fillable = [
        'galery_id',
        'file',
        'judul'
    ];
    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
