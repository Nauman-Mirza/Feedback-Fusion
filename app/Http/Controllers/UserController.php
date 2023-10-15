<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegistrationRequest;
use App\Http\Requests\UserLoginRequest;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function userRegister(UserRegistrationRequest $request, UserService $userService)
    {
        $validate = $request->validated();
        $user = $userService->register($validate);  

        if(!$user)
        {
            return reponse()->json([
                'message' => 'something went wrong'
            ]);
        }

        return redirect()->route('UserLogin');
    }

    public function userLogin(UserService $userService, UserLoginRequest $request)
    {
        $validate = $request->validated();
		$user = $userService->login($validate);

		if (!$user) {
			return redirect()->route('UserLogin');
		}

		session(['user' => $user]);
        session(['token' => $user->createToken('token')->plainTextToken]);

        return redirect()->route('usersMain');
    }

    public function logout()
    {
        Session::forget('user');
        Session::forget('token');

        return redirect()->route('welcome'); 
    }
}