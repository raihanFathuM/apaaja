<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'name', 'price', 'code', 'description', 'date_of_entry', 'date_of_out'
    ];
}
