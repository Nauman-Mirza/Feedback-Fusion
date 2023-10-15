<?php

namespace App\Services;

use App\Models\Admin;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

class AdminService
{
	public function login(array $data)
	{
		$email = $data['email'];
		$password = $data['password'];

		try {
			$admin = Admin::where('email', $email)->first();
			if (!$admin || !Hash::check($password, $admin->password)) {
				return [];
			}
			return $admin;
		} catch (Exception $e) {
			return [];
		}
	}

	public function user()
	{
		$users = User::all();
		return $users;
	}

	public function delete($id)
	{
		User::find($id)->delete();
		return 'deleted';
	}
}