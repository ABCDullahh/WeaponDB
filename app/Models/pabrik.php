<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pabrik extends Model
{
    use HasFactory;
    protected $table = 'pabriks';
    protected $guarded = ['id'];
}
