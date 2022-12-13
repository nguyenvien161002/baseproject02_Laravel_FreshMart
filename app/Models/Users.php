<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_users';
    protected $fillable = [
        'fullname', 'email', 'avatar', 'password', 'confirm_password', 'state', 'token', 'id_authorization'
    ];
    protected $primaryKey = 'id';
    public function scopeSearch ($users, $query)
    {
        if($query) {
            $users = $users -> where('fullname','LIKE',"%{$query}%");
            return $users;
        }
    }
}
