<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(){

        return view('users.login');
    }
    public function store(Request $req){

        $val = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($val)){
            request()->session()->regenerate();

            return redirect()->route('dashboard')->with('session', 'Welcome to Brgy Kupal');
        }

        return redirect()->back()->withErrors(['email', 'Login Failed'])->onlyInput('email');
    }

    public function register(){

        return view('users.register');
    }
    public function create(UserRequest $req){

        $val = $req->validated();

        if($req->has('profile')){
            $profile = $req->file('profile');
            $ext = $profile->getClientOriginalExtension();
            $path = 'profiles/';
            $profileName = time(). '-' . $ext;
            $profile->move($path, $profileName);
        }

        $val['profile'] = $path . $profileName;
        $val['password'] = Hash::make($val['password']);

        $this->userService->UserRegisterStoreService($val)->assignRole('user');

        return redirect()->route('login')->with( 'success', 'Created Account is Successfully !' );

    }

    public function logout(){

        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout Account is Successfully !');

    }

    // -------------- users dashboard

    public function index(){

        $users = $this->userService->UserViewAllService();
        return view('users.index', ['users' => $users]);
    }

    public function profile($id){

        $user = $this->userService->UserProfileService($id);
        return view('users.profile', ['user' => $user]);
    }

}
