<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 'studentID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'dob',
        'email',
        'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'dob' => 'date',
    ];
    public function classes(){
        return $this->hasManyThrough(MyClass::class, StudentClass::class, 'studentID', 'classID', 'studentID', 'classID');
    }
    public function schedules(){
        return $this->belongsToMany(Schedule::class, 'attendances', 'studentID', 'scheduleID', 'studentID', 'scheduleID')->withPivot('status')->orderBy('date');
    }
}
