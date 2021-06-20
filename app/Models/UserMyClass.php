<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMyClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacherID',
        'classID',
    ];
}
