<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $fillable = [
        'PROVINCE_ID',
        'PROVINCE_CODE',
        'PROVINCE_NAME',
        'PROVINCE_NAME_ENG',
        'GEO_ID',
    ];
}
