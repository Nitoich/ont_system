<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    protected $data = [];

    public function getApiGroups() {
        Group::all()->each(function($group) {
            // $data[] = $group->nomer;
            array_push($this->data, $group->nomer);
        });
       return response()->json($this->data,200);
    }
}
