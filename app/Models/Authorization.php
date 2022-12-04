<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authorization extends Model
{
    use HasFactory;
    protected $table = 'tbl_authorization';
    protected $fillable = [
        'name', 'description'
    ];
    protected $primaryKey = 'id';
}
