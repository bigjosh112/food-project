<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
//    view all users
    public function users()
    {
        $users = User::all();
        return view('allUsers', compact('users'));
    }

    public function viewUserById(string $name)
    {
        $user = User::where('name', $name)->first();
        return view('viewUser', compact('user'));
    }

    public function profile()
    {
        $loggedInUser = auth()->user()->id;
        $user = User::where('id', $loggedInUser)->first();
        return response()->json([
            'status' => true,
            'message' => 'User',
            'data' => $user
        ], 200);
    }

}
