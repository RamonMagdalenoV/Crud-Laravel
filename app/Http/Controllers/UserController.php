<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {

        return view('users.index',['users' => User::orderBy('id','DESC')->paginate(5)]);
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return $user;
    }

    public function edit(Request $request)
    {
        if ($request->ajax()){
            $user = User::find($request->id);
            return $user;
        }
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password){
            $user->password = Hash::make($request->password);
        }



        $user->save();

        return $user;
    }

    public function delete(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return $user;
    }

}
