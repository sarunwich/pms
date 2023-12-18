<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teach_bus extends Model
{
    use HasFactory;
    protected $fillable = [
        'teachID',
        'Stdid',
        'year',
        
    ];
}
