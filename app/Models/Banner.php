<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_banner';
    protected $fillable = [
        'name', 'image'
    ];
    protected $primaryKey = 'id';
}
