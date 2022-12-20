<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressUser extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_address_user';
    protected $fillable = [
        'id_user', 'fullname', 'address_default', 'number_phone', 'state'
    ];
}
