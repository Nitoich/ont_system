<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izm extends Model
{
    use HasFactory;

    protected $table = 'izm_rasp';
    public $timestamps = false;

    protected $with = [
        'teacherKogo',
        'teacherKto'
    ];

//    public function izmData() {
//        return $this->hasOne(IzmDate::class, 'id', 'id_izm');
//    }

    public function teacherKogo() {
        return $this->hasOne(User::class, 'id', 'teacher_kogo');
    }

    public function teacherKto() {
        return $this->hasOne(User::class, 'id', 'teacher_kto');
    }
}
