<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $table = 'tabel_armada';
    protected $primaryKey = 'plat_nomor';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['plat_nomor', 'merk', 'tahun', 'transmisi'];
}