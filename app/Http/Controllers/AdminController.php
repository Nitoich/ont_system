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
}
