<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salling extends Model
{
    use HasFactory;
    protected $table = 'ver';
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['id', 'version', 'min_version'];

}
