<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class overtime extends Model
{
    use HasFactory;
    protected $table = 'overtime';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user',
        'reason',
        'number',
        'status',
        'id_Admin',
        'approved_time',
        
    ];

    // protected $ = 'overtime';


}

