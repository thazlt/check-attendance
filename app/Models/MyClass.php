<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyClass extends Model
{
    use HasFactory;

    protected $primaryKey = 'classID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'begin',
        'end',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'begin' => 'date',
        'end' => 'date',
    ];
    public function teachers(){
        return $this->belongsToMany(User::class, 'teacher_class', 'classID', 'teacherID');
    }
    public function schedules(){
        return $this->hasMany(Schedule::class, 'classID', 'classID');
    }
}
