<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;

    protected $table = 'address'; // Nama tabel jika tidak sesuai dengan konvensi

    protected $fillable = [
        'customer_id',
        'address',
    ];

    public function customer()
    {
        return $this->belongsTo(table_customers::class, 'customer_id');
    }

    public function rents()
    {
        return $this->hasMany(Rent::class, 'address_id');
    }
}
