<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    use HasFactory;
    public $table = 'customers';
    protected $fillable = ['created_at','updated_at','first_name','last_name','adres','placename','postalcode'];
    protected $primaryKey = 'id';

    public function reports(){
        return  $this->hasMany(report::class,'id','customer_id');
    }

    public function detials(){
     return $this->hasMany(Contact::class,'customer_id','id');
    }
}
