<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rasp extends Model
{
    use HasFactory;
    protected $table = 'rasp_det';
    public $timestamps = false;
    public $with = ['teacher','cabinet','day'];

    public function day() {
        return $this->hasOne(Days::class, 'id', 'id_rasp');
    }

    public function teacher() {
        return $this->hasOne(User::class, 'id', 'prepod');
    }

    public function cabinet() {
        return $this->hasOne(Cabinet::class, 'id', 'id_kab');
    }
}
