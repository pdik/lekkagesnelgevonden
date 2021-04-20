<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Items extends Model
{
    protected $fillable = ['name', 'description', 'price','type_id'];
    use HasFactory;

    /**
     * Item used in reports for analitics
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reports(){
        return $this->hasMany(report::class);
    }
    public function type(){
        return $this->belongsTo(Types::class,'type_id');
    }

      public function scopeByname($query,$search = null, $selected = [])
    {
        if(count($selected) >= 1){
            return $query->whereNotIn('id', $selected)->get();
        }elseif(isset($search) && $search > ''){
            return $query->where('name','like','%'.$search.'%')->get();
        }
        else{
          return Items::all();
        }
    }
}
