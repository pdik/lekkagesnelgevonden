<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_options extends Model
{
    use HasFactory;

    protected $fillable = ['title','type'];
    public $timestamps = false;
}
