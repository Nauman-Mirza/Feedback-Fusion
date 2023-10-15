<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegistrationRequest;
use App\Http\Requests\AdminLoginRequest;
use App\Services\AdminService;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function adminLogin(AdminService $adminService, AdminLoginRequest $request)
    {
        $validate = $request->validated();
		$admin = $adminService->login($validate);

		if (!$admin) {
			return response()->json([
				'message' => 'Invalid Credentials',
			], 401);
		}

		session(['user' => $admin]);
        session(['token' => $admin->createToken('token')->plainTextToken]);

        return redirect()->route('adDashboard');
    }

    public function showUser(AdminService $adminService)
    {
        $users = $adminService->user();
        return view('allUsers', compact('users'));
    }

    public function deleteUser($id, AdminService $adminService)
    {
        $message = $adminService->delete($id);
        return redirect()->route('users');
    }

    public function adminLogout()
    {
        Session::forget('user');
        Session::forget('token');

        return redirect()->route('AdminLogin'); 
    }
}
