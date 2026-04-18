<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function destroy(User $user)
    {
        if ($user->role === 'admin') {
            return redirect()->back()->with('error', 'Vous ne pouvez pas supprimer un administrateur.');
        }
        
        $user->delete();
        return redirect()->back()->with('success', 'Utilisateur supprimé avec succès.');
    }
}