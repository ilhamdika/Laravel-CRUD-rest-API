<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataDiri extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'data_diri';
    protected $fillable = [
        'username',
        'nama',
        'adress',
    ];

    protected $hidden = [];
}
