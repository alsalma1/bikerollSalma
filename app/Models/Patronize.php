<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patronize extends Model
{
    use HasFactory;
    protected $table = "patronize";
    protected $fillable=['sponsor_id' , 'race_id'];
}
?>