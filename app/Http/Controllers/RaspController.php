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
        $this->data = [];
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


        // Сортировка
        foreach ($this->data as $day) {
            for($j = 0; $j < count($day); $j++) {
                for($i = 0; $i < count($day) - $j - 1; $i++) {
                    if ($day[$i]->para > $day[$i + 1]->para) {
                        $tmp_var = $day[$i + 1]->para;
                        $day[$i + 1]->para = $day[$i]->para;
                        $day[$i]->para = $tmp_var;
                    }
                }
            }
        }

        return View::make('templates.AjaxSupports.RaspElements')->with('data', $this->data);
    }



    public function getRaspByGroupJSON(Request $request) {
        $this->data = [];
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


        // Сортировка
        foreach ($this->data as $day) {
            for($j = 0; $j < count($day); $j++) {
                for($i = 0; $i < count($day) - $j - 1; $i++) {
                    if ($day[$i]->para > $day[$i + 1]->para) {
                        $tmp_var = $day[$i + 1]->para;
                        $day[$i + 1]->para = $day[$i]->para;
                        $day[$i]->para = $tmp_var;
                    }
                }
            }
        }

        if (count($this->data) == 0) {
            return response()->json([
                'error' => [
                    'code' => 404,
                    'message' => 'Not found!'
                ]
            ])->setStatusCode(404);
        }

        return response()->json($this->data,200);
    }
}
