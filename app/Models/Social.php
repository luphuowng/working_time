<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;
    protected $table = 'social';
    protected $primaryKey = 'id_social';

    protected $fillable = [
        'provide_user_id',
        'provide',
        'id_user'
    ];

    //function getId($get){
        //$get::join('users', 'users.id', '=' , 'id_user')->select('id_user')->get();
    //}
}
