<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
class Methods extends Model
{
    use HasFactory;
    protected $fillable = ['created_at','updated_at','name','description'];
    protected $primaryKey = 'id';



       /**
     * Scope a query to only include todos matching search.
     *
     * @param Builder $query
     * @param string|null $search
     *
     * @return Builder
     */
    public function scopeSearch(Builder $query, ?string $search = null)
    {
        if (is_null($search)) {
            return $query;
        }

        return $query->where(DB::raw('LOWER(name)'), 'like', '%'.strtolower($search).'%');
    }
}
