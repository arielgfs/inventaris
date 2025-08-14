<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aplikasi extends Model
{
    protected $table = 'aplikasi';
    protected $fillable = ['nama', 'gambar', 'deskripsi', 'type', 'klien_id', 'link'];

    public function klien()
    {
        return $this->belongsTo(Klien::class);
    }

    public function teknologi()
    {
        return $this->hasMany(Teknologi::class);
    }
    
}

