<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkirModel extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'transaksi_parkir';

    public $timestamps = false;
}
