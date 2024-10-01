<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class table_customers extends Model
{
    use HasFactory;
    protected $table = 'table_customers'; // Nama tabel jika tidak sesuai dengan konvensi

    protected $fillable = [
        'full_name',
        'salutation',
    ];

    public function addresses()
    {
        return $this->hasMany(Address::class, 'customer_id');
    }

    public function rents()
    {
        return $this->hasMany(Rent::class, 'customer_id');
    }
}
