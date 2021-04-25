<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    public $table = 'customer_detials';
    protected $fillable = ['contact_option_id','data','customer_id'];
    public $timestamps = false;
    protected $primaryKey = 'id';
    public function customer(){
        return  $this->belongsToMany(customers::class);
    }
    public function options(){
        return  $this->belongsTo(contact_options::class,'contact_option_id');
    }
}
