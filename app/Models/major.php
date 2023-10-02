<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class major extends Model
{
    use HasFactory;
    protected $fillable = [
        'majors_name',
        'status',
        'branch_id',
    ];
}
