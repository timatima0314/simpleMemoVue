<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimpleMemo extends Model
{
    use HasFactory;
    protected $table = 'simpleMemos';

    protected $fillable = [
        'content', 'user_id'
    ];
    // protected $casts = [
    //     'user_id' => 'int'
    // ];
}
