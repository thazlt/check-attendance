<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;
    protected $table = "student_class";
    protected $fillable = [
        'studentID',
        'classID',
    ];
    protected $primaryKey = null;

public $incrementing = false;
}
