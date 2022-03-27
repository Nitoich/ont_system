<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    public function getPage() {
        $tab = $_GET['tab'] ?? 'home';
        return View::make('admin')->with('tab', $tab);
    }

    public function getTemplate(Request $request) {
        return View::make('templates.AdminTemplates.' . $request->name);
    }

    public function getTeacherInfo(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => [
                    'code' => 400,
                    'message' => 'Validation error!',
                    'errors' => $validator->errors()
                ]
            ],400);
        }

        $user = User::where('id', $request->id)->first();
        if ($user) {
            return View::make('templates.AjaxSupports.TeacherInfo')->with('teacher', $user);
        }

        return response()->json([
            'error' => [
                'code' => 404,
                'message' => 'Not found'
            ]
        ],404);
    }
}
