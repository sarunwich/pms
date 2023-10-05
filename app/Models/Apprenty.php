<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprenty extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'agency_id',
        'year',
        'level',
        'startday',
        'lastday',
        'Profile',
        'Transcript',
        'Permission',
        'send_to',
        'sent',
        'status',
        
    ];
  
}
