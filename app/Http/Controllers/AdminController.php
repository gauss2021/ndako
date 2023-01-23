<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index()
    {
        if (!Gate::allows('access-admin')) {

            abort('403', 'Vous n\'avez pas acces a cette page');
        }

        return view('admin.dashboard');
    }
}