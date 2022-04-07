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
    protected $data = [];

    public function getIzm() {
        $izm = IzmDate::all();

        if (isset($_REQUEST['date'])) {
            $izm = IzmDate::where('data', $_REQUEST['date'])->first();

            if (!$izm) {
                return response()->json([
                    'error' => [
                        'code' => 404,
                        'message' => 'Not found!'
                    ]
                ],404);
            }
        }

       // if (!isset($_REQUEST['date'])) {

        $izmArray = $izm->toArray();
        foreach ($izmArray as $item) {
            $tmp = [];
            foreach ($item['izm'] as $el) {
                $tmp[$el['gruppa']][] = $el;
            }
            $item['izma'] = '123';
        }

//            $izm->each(function ($item) {
//                $this->data = [];
//                $item->izm->each(function ($el) use ($item) {
//                    $this->data[$el->gruppa][] = $el;
//                    $item->izm = $this->data;
//                });
//            });
        //}


        return response()->json($izmArray);
    }
}
