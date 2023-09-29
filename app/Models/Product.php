<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'gst_artikel';
    protected $primaryKey = 'ArtikelNr';
    protected $keyType = 'string';
    public $incrementing = false;
}
