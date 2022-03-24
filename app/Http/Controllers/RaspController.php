<?php

namespace App\Http\Controllers;

use App\Models\Rasp;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RaspController extends Controller
{
    protected $data = [];

    public function getRaspByGroup(Request $request) {
        $validator = Validator::make($request->all(), [
            'group' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => [
                    'code' => 400,
                    'message' => 'Validation error',
                    'errors' => $validator->errors()
                ]
            ],400);
        }

        $allRasp = Rasp::where('gruppa', $request->group)->get()->sortBy('id_rasp');

        $allRasp->each(function($para){
            $this->data[$para->day['den']][] = $para;
        });

        return View::make('templates.AjaxSupports.RaspElements')->with('data', $this->data);
    }
}
