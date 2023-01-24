<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

        $categories = Category::all();

        return view('admin.category', compact('categories'));
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