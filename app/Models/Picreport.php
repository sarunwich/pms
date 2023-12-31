<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picreport extends Model
{
    use HasFactory;
    protected $fillable = [
        'reportstd_id',
        'picname',
        'pictile',
    ];

    public function roport()
    {
        return $this->belongsTo(Reportstd::class);
    }
}
