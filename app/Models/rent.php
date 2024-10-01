<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rent extends Model
{
    use HasFactory;

    protected $table = 'rent'; // Nama tabel jika tidak sesuai dengan konvensi

    protected $fillable = [
        'customer_id',
        'movie_id',
        'address_id',
    ];

    public function customer()
    {
        return $this->belongsTo(table_customers::class, 'customer_id');
    }

    public function movie()
    {
        return $this->belongsTo(table_movies::class, 'movie_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }
}
