<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    public $table = 'contacts';
    protected $fillable = ['contact_option_id','data','customer_id'];
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function customer(){
        return  $this->belongsToMany(customers::class);
    }
    public function options(){
        return  $this->belongsTo(contact_options::class);
    }
}
