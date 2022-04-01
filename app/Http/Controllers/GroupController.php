<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{
    protected $data = [];

    public function getApiGroups() {
        $query = $_GET['query'] ?? '';

        $groups = Group::where('nomer', 'like', '%' . $query . '%')->get();

        $groups->each(function($group) {
            // $data[] = $group->nomer;
            array_push($this->data, $group->nomer);
        });
       return response()->json($this->data,200);
    }

    public function addGroup(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json()->setStatusCode(400);
        }

        $group = Group::where('nomer', $request->name)->first();

        if($group) {
            return response()->setStatusCode(400);
        } else {
            Group::create([
                'nomer' => $request->name
            ]);
            return response()->json()->setStatusCode(200);
        }
    }
}
