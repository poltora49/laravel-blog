<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            "email" => ["required", "email", "string"],
            "password" => ["required"]
        ]);

        if(auth("web")->attempt($data)) {
            return redirect(route("blog"));
        }

        return redirect(route("login"))->withErrors(["email" => "User not found or username or password entered incorrectly"]);
    }

    public function logout()
    {
        auth("web")->logout();

        return redirect(route("blog"));
    }

    public function showRegisterForm()
    {
        return view("auth.register");
    }


    public function register(Request $request)
    {
        $data = $request->validate([
            "name" => ["required", "string"],
            "email" => ["required", "email", "string", "unique:users,email"],
            "password" => ["required", "confirmed"]
        ]);

        $user = User::create([
            "name" => $data["name"],
            "email" => $data["email"],
            "password" => bcrypt($data["password"])
        ]);

        if($user) {
            //event(new Registered($user));

            auth("web")->login($user);
        }

        return redirect(route("blog"));
    }
}
