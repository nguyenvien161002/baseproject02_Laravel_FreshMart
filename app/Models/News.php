<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_news';
    protected $fillable = [
        'title', 'content', 'author'
    ];
    protected $primaryKey = 'id';
}
