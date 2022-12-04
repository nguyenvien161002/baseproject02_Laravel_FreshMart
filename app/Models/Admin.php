<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_admin';
    protected $fillable = [
        'admin_name', 'password', 'id_authorization'
    ];
    protected $primaryKey = 'id';
}
