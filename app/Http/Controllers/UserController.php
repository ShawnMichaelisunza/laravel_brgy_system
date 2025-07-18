<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login()
    {
        return view('users.login');
    }
    public function store(Request $req)
    {
        $val = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($val)) {
            request()->session()->regenerate();

            if(Auth::check()){

                $user = Auth::user();
                if($user->hasRole('user')){

                    return redirect()->route('brgy.index')->with('success', 'Welcome to Brgy Kupal');
                }

                    return redirect()->route('dashboard')->with('success', 'Welcome to Brgy Kupal');
            }
        }

        return redirect()
            ->back()
            ->withErrors(['email', 'Login Failed'])
            ->onlyInput('email');
    }

    public function register()
    {
        return view('users.register');
    }
    public function create(UserRequest $req)
    {
        $val = $req->validated();

        if ($req->has('profile')) {
            $profile = $req->file('profile');
            $ext = $profile->getClientOriginalExtension();
            $path = 'profiles/';
            $profileName = time() . '-' . $ext;
            $profile->move($path, $profileName);
        }

        $val['profile'] = $path . $profileName;
        $val['password'] = Hash::make($val['password']);

        $this->userService->UserRegisterStoreService($val)->assignRole('user');

        return redirect()->route('login')->with('success', 'Created Account is Successfully !');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout Account is Successfully !');
    }

    // -------------- users dashboard

    public function index()
    {
        $users = $this->userService->UserViewAllService();
        return view('users.index', ['users' => $users]);
    }

    // view a data

    public function profile($id)
    {
        $user = $this->userService->UserProfileService($id);
        return view('users.profile', ['user' => $user]);
    }

    // create and  store a new account
    public function userCreate()
    {
        $roles = Role::all();
        return view('users.create', ['roles' => $roles]);
    }
    public function userStore(UserRequest $req)
    {
        $val = $req->validated();
        $val['password'] = Hash::make($val['password']);

        $user = $this->userService->UserRegisterStoreService($val);
        $user->syncRoles($req->role);
        $user->save();

        return redirect()->route('user.index')->with('success', 'Created Account Successfully !');
    }

    // edit and update a account
    public function edit($id)
    {
        $user = $this->userService->UserEditService($id);
        $roles = Role::all();

        return view('users.edit', ['user' => $user, 'roles' => $roles]);
    }
    public function update($id, UserEditRequest $req)
    {
        $val = $req->validated();

        if ($req->has('profile')) {
            $profile = $req->file('profile');
            $ext = $profile->getClientOriginalExtension();
            $path = 'profiles/update/';
            $profileName = time() . '-' . $ext;
            $profile->move($path, $profileName);
        }

        if ($req['profile']) {
            $val['profile'] = $path . $profileName;
        }

        $val['password'] = Hash::make($val['password']);
        $user = $this->userService->UserUpdateService($id, $val);
        $user->syncRoles($req->role);
        $user->save();

        return redirect()->route('user.index')->with('success', 'Updated Account is Successfully !');
    }

    // deleted accounts
    public function deleted()
    {
        $users = $this->userService->UserDeletedService();
        return view('users.deleted', ['users' => $users]);
    }

    // delete account
    public function destroy($id)
    {
        $this->userService->UserDestroyService($id);
        return redirect()->back()->with('success', 'Deleted Account Successfully !');
    }

    // restore account
    public function restore($id)
    {
        $this->userService->UserRestoreService($id);
        return redirect()->back()->with('success', 'Restored Account Successfully !');
    }
}
