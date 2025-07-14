<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Annoucement extends Model
{
    use HasFactory;

    // Define fillable properties
    protected $fillable = ['message', 'type', 'status'];
}
