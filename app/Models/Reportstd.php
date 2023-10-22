<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reportstd extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'detail',
        'date_add',
        'note',
        'intendant',
        'Advisors',
    ];
}
