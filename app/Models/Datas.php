<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datas extends Model
{
    use HasFactory;
    protected $table = 'datas';
    protected $primary_key = 'id';
    protected $fillable = [
        'name',
        'no_tlp',
        'product',
        'total',
        'harga'
    ];
}
