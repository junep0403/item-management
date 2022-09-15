<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    public function list()
    {
        $users = User::all();
        return view('user.list', [
            'users' => $users,
        ]);
    }
}
