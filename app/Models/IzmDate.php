<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IzmDate extends Model
{
    use HasFactory;

    protected $table = 'izm';
    public $timestamps = false;

    protected $with = [
        'izm'
    ];

    public function izm() {
        return $this->hasMany(Izm::class, 'id_izm', 'id');
    }
}
