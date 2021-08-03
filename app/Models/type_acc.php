<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;
    protected $table = 'type_acc';
    protected $primaryKey = 'id_type';

    protected $fillable = [
        'type_name',
        'id_type'
    ];

}
