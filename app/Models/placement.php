<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class placement extends Model
{
    public $table = "placements";
    public $timestamps = false;
    use HasFactory;
}
