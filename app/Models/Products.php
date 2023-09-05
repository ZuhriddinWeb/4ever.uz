<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'product_id',        
    ];

    protected $with = [
        'Category'
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeCategories($query,$category_id)
    {
        if(empty($category_id) == false){
            $query->whereIn('category_id', $category_id);
        }
    }

    public function scopeGender($query,$gender_id)
    {
        if($gender_id != null){
            $query->where('tree_id', $gender_id);
        }
    }

}
