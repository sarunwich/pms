<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;
    protected $fillable = [
        'agenciesTHname',
        'address',
        'county',
        'amphur',
        'district',
        'poststaion',
        'tel',
        'Email',
        'web',
        'type',
        'work',
        'fax',
        
    ];
}
