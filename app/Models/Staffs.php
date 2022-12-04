<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staffs extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_staffs';
    protected $fillable = [
        'staff_name', 'password', 'id_authorization'
    ];
    protected $primaryKey = 'id';
}
