<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class report_rows extends Model
{
    use HasFactory;
    protected $fillable = ['method_id', 'data','report_id'];
    public $timestamps = false;
    public function item(){
        return $this->belongsTo(Items::class,'method_id');
    }
}
