<?php

namespace App\Controllers;

class Auth extends BaseController
{
	public function index()
	{
        return redirect()->to(site_url('login'));
	}

	public function login()
	{
		if(session('id_user')) {
			return redirect()->to(site_url('home'));
		}
        return view('auth/login');
	}

	public function loginProcess()
	{
		$post = $this->request->getPost();
		$query = $this->db->table('users')->getWhere(['email_user' => $post['email']]);
		$user = $query->getRow();

		if ($user) {
			// Verifikasi password
			if (password_verify($post['password'], $user->password_user)) {
				// Menyimpan data pengguna dalam session
				$params = [
					'id_user' => $user->id_user,
					'email_user' => $user->email_user,
					'role' => $user->role, // Menyimpan role pengguna
					'isLoggedIn' => true,
				];
				session()->set($params); // Set session data

				// Redirect berdasarkan role
				if ($user->role === 'Superadmin') {
					return redirect()->to(site_url('home'));
				} else {
					return redirect()->to(site_url('welcome'));
				}
			} else {
				return redirect()->back()->with('error', 'Password tidak sesuai');
			}
		} else {
			return redirect()->back()->with('error', 'Email tidak ditemukan');
		}
	}

	public function logout()
	{
		session()->remove('id_user');
		return redirect()->to(site_url('login'));
	}

}
