<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    public $table = "placements";
    public $timestamps = false;
    use HasFactory;
}
