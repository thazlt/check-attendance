<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $primaryKey = null;
    public $incrementing = false;

    protected $fillable = [
        'scheduleID',
        'studentID',
        'status',
    ];
}
