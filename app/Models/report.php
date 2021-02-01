<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class report extends Model
{
    use HasFactory;
    public $table = 'report';
    protected $fillable = ['created_at','updated_at','customer_id','status','data','created_by'];
    protected $primaryKey = 'id';

    /**
     * Created by user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class,'customer_id');
    }

    /**
     * For customer
     */
    public function customer(){
        return $this->belongsTo(customers::class,'customer_id');
    }

}
