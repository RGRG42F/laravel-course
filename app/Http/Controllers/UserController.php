<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    // Вход
    public function signin()
    {
        return view("signin");
    }

    public function signin_process(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);
        $user = [
            "email" => $request->email,
            "password" => $request->password,
        ];
        if(Auth::attempt($user)){
            return redirect("/")->with("success", "");
        }
    }

    // Регистрация
    public function signup()
    {
        return view("signup");
    }

    public function signup_process(Request $request)
    {
        $request->validate([
            "email"=> "required|email|unique:users",
            "name"=> "required",
            "password"=> "required",
            "password_confirm" => "required|same:password"
        ]);
        $user = $request->all();

        User::create([
            "email"=>$user["email"],
            "name"=>$user["name"],
            "password"=>Hash::make($user["password"]),
            "role_id" => "2",
        ]);

        return redirect("/")->with("success", "");
    }

    // Выход
    public function signout()
    {
        Auth::logout();
        return redirect("/")->with("success", "");
    }



    public function account()
    {
        $users = User::all();
        return view("account", [
            "all_user"=>$users
        ]);
    }


}
