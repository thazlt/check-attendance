<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherClass extends Model
{
    use HasFactory;
    protected $table = "teacher_class";
    protected $fillable = [
        'teacherID',
        'classID',
    ];
    protected $primaryKey = null;

    public $incrementing = false;
}
