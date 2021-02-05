<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Character extends Model
{
    use SoftDeletes;

    protected $table = 'characters';

    protected $guarded = [
        'id'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'deleted_at',
        'updated_at'
    ];
}
