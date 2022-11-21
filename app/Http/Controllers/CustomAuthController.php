<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;


class CustomAuthController extends Controller
{
    public function index () {
        return view('auth.index');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect('/')->withSuccess('Signed in');
        }
        return redirect('/auth')->withSuccess('Login details are not valid');
    }

    public function register(Request $request){
        $request->validate([
            'reg-email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed:password_confirmation'
        ]);
        $data = $request->all();
        $check = $this->create($data);

        return(redirect('/auth'))->withSuccess('You haved signed-up');
    }

    public function create (array $data){
        $newUser = new User();
        $newUser->email = $data['reg-email'];
        $newUser->password = Hash::make($data['password']);
        if(isset($data['isAdmin'])){
            $newUser->roleId = Role::where('description', 'Admin')->first()->id;
        }else {
            $newUser->roleId = Role::where('description', 'Regular')->first()->id;
        }
        return $newUser->save();
    }

    public function logout() {
        Session::flush();
        Auth::logout();
  
        return redirect('auth');
    }
}
