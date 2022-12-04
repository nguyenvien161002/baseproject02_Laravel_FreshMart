<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_products';
    protected $fillable = [
        'name', 'price', 'discount', 'description', 'details', 'state', 'image', 'image2', 'image3', 'image4', 'id_category_product'
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
