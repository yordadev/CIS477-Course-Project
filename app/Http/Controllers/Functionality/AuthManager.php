<?php

namespace App\Http\Controllers\Functionality;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\UserPermission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthManager extends Controller
{
    /**
     * * processLogout(Request $request)
     * 
     *  This method logs out an authenticated user.
     * 
     * @param Request $request
     * 
     * @return Route get.login
     */
    public function processLogout(Request $request)
    {
        Auth::logout();

        return redirect()->route('login');
    }


    /**
     * * processRegisteration(Request $request)
     * 
     *  Registers a new user
     * 
     * @param Request $request
     * 
     * @return Route home
     */
    public function processRegisteration(Request $request)
    {
        $request->validate([
            'name'             => 'required|string',
            'email'            => 'required|email|unique:users',
            'password'         => 'required',
            'confirm_password' => 'required|same:password',
            'type'             => 'nullable|string|max:86'
        ]);

        $user = $this->createUser($request);
        Auth::login($user, true);

        return redirect()->route('home');
    }


    /**
     * * createUser(Request $request)
     * 
     *  Creates a new user record in the db and returns it
     * 
     * @param Request $request
     * 
     * @return User $user
     */
    private function createUser(Request $request)
    {
        $user = User::create([
            'name' => ucfirst(strtolower($request->name)),
            'email' => strtolower($request->email),
            'password' => bcrypt($request->password),
        ]);

        $permission = Permission::where([
            'is_client' => true
        ])->first();


        UserPermission::create([
            'pivot_id' => UserPermission::generatePivotID(),
            'user_id' => $user->id,
            'permission_id' => $permission->permission_id
        ]);

        return $user;
    }


    /**
     * * processLogin(Request $request)
     * 
     *  This method logs out an authenticated user.
     * 
     * @param Request $request
     * 
     * @return Route home
     */
    public function processLogin(Request $request)
    {
        $request->validate([
            'email'      => 'required|email',
            'password'   => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }
        return redirect()->route('login')->withErrors(['Uh oh, your e-mail / password was incorrect.']);
    }
}
