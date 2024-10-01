<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class table_movies extends Model
{
    use HasFactory;
    protected $table = 'table_movies'; // Nama tabel jika tidak sesuai dengan konvensi

    protected $fillable = [
        'movie_name',
    ];

    public function rents()
    {
        return $this->hasMany(Rent::class, 'movie_id');
    }
}
