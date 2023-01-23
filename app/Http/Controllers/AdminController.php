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

    public function category()
    {
        if (!Gate::allows('access-admin')) {

            abort('403', 'Vous n\'avez pas acces a cette page');
        }

        return view('admin.category');
    }

    public function house()
    {
        if (!Gate::allows('access-admin')) {

            abort('403', 'Vous n\'avez pas acces a cette page');
        }

        return view('admin.house');
    }

    public function message()
    {
        if (!Gate::allows('access-admin')) {

            abort('403', 'Vous n\'avez pas acces a cette page');
        }

        return view('admin.message');
    }
}