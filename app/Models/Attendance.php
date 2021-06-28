<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $primaryKey = null;

    protected $fillable = [
        'scheduleID',
        'studentID',
        'status',
    ];

    public function schedule(){
        return $this->hasOne(Schedule::class, 'scheduleID', 'scheduleID');
    }
}
