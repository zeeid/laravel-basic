<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingJenisBiaya extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'setting_tarif';

    public $timestamps = false;
}
