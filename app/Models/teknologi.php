<?php

// app/Models/Teknologi.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teknologi extends Model
{
    protected $table = 'teknologi';
    protected $fillable = ['nama', 'versi', 'aplikasi_id'];
     public $timestamps = true;

    public function aplikasi()
    {
        return $this->belongsTo(Aplikasi::class);
    }
}
