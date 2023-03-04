<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index()
    {
        if (!Gate::allows('access-admin')) {

            abort('403', 'Vous n\'avez pas acces a cette page');
        }

        $users = User::all();

        return view('admin.dashboard', compact('users'));
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

    public function contact()
    {
        return view('admin.contact');
    }

    public function contactStore(Request $request)
    {

        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['email'],
            'message' => ['required'],
        ]);

        Message::create([
            'expediteur' => $request->name,
            'email' => $request->email,
            'contenu' => $request->message,
            'destinateur' => 'van'
        ]);

        return redirect()->route('admin.contact')->with('success', 'Votre message a ete envoye avec success');
    }

    public function editUser(Request $request,)
    {

        return view('admin.editUser');
    }

    public function deleteUser(User $user)
    {
        $nom = $user->name;
        $user->delete();

        return redirect()->route('dashboard')->with('removeUser', "L'utilisateur $nom a ete supprime");
    }
}
