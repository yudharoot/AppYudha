<?php

namespace App\Models;
use App\Models\Photo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'cover']; // Data yang bisa diinput

    public function photos() {
        return $this->hasMany(Photo::class); // Relasi: satu album punya banyak foto
    }
}
