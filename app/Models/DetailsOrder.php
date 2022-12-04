<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsOrder extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_details_order';
    protected $fillable = [
        'order_code', 'id_product', 'name', 'quantity', 'unit_of_measure', 'price', 'discount', 'into_money', 'id_category_product'
    ];
}
