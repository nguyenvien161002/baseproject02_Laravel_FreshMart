<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_orders';
    protected $fillable = [
        'id_user', 'username', 'number_phone', 'address', 'payment_method', 'total_money', 'state', 'note'
    ];
}
