<?php

namespace App\Http\Controllers;

use App\Models\Rasp;
use App\Models\Izm;
use App\Models\IzmDate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class IzmController extends Controller
{
    public function getIzm() {
        if(isset($_REQUEST['date'])) {
            $validator = Validator::make(['date' => $_REQUEST['date']], [
                'date' => 'required|date'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $res = IzmDate::where('data', $_REQUEST['date'])->first();

            if (!$res) {
                return response()->json()->setStatusCode(404);
            }

            return response()->json($res, 200);

        }
        return response()->json(IzmDate::all());
    }

    public function getIzmById(Request $request) {

        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric'
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $izm = Izm::where('id_izm', $request->id);
        if (isset($_REQUEST['group'])) {
            $izm = $izm->where('gruppa', $_REQUEST['group']);
        }
        $izm = $izm->get();

       // return response()->json($izm);

        $data = [];

        for($i = 0; $i <= count($izm) - 1; $i++) {
            $data[$izm[$i]->gruppa][] = $izm[$i];
        }

        return response()->json($izm);
    }
}
