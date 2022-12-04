<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_category_product';
    protected $fillable = [
        'name', 'description', 'state'
    ];
    protected $primaryKey = 'id';

    public function scopeSearch ($products, $query)
    {
        if($query) {
            $products = $products -> where('name','LIKE',"%{$query}%");
            return $products;
        }
    }
}
