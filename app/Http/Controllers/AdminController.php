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

    public function addTeacher(Request $request) {
        $validator = Validator::make($request->all(), [
            'login' => 'required|unique:prepod',
            'password' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'patronymic' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),400);
        }

        $user = User::create([
            'login' => $request->login,
            'Fam' => $request->last_name,
            'name' => $request->first_name,
            'patronymic' => $request->patronymic,
            'password' => $request->password,
            'FIO' => $request->last_name . ' ' . $request->first_name . ' ' . $request->patronymic,
            'token' => ''
        ]);

        if($user) {
            return response()->json()->setStatusCode(200);
        }
    }

    public function delTeacher(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),400);
        }

        $user = User::where('id', $request->id)->first();
        if ($user) {
            $user->delete();
            return response()->json()->setStatusCode(200);
        } else {
            return response()->json()->setStatusCode(404);
        }
    }

    public function getTeachersTemplates() {
        $query = $_GET['query'] ?? '';
        $teachers = User::where('FIO', 'like', '%' . $query . '%')->orWhere('login', 'like', '%' . $query . '%')->get();
        return View::make('templates.AjaxSupports.TeacherItems')->with('teachers', $teachers);
    }

    public function updateTeacher(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'login' => 'required',
            'password' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'patronymic' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),400);
        }

        $user = User::where('id', $request->id)->first();
        if ($user) {
            $user->password = $request->password;
            $user->name = $request->first_name;
            $user->Fam = $request->last_name;
            $user->patronymic = $request->patronymic;
            $user->FIO = $request->last_name . ' ' . $request->first_name . ' ' . $request->patronymic;
            $user->save();
            return response()->json()->setStatusCode(200);
        } else {
            return response()->json()->setStatusCode(404);
        }
    }
}
