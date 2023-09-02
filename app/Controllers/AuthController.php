<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function index()
    {
        if (session()->get('username') == '') {
            $data['title'] = 'Login';
            return view('auth/login', $data);
        }else{
            return redirect('dashboard');
        }
    }
    public function login()
    {
        $users = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $dataUser = $users->where([
            'username' => $username,
        ])->first();
            if ($dataUser) {
                if (password_verify((string)$password, $dataUser['password'])) {
                    session()->set([
                        'username' => $dataUser['username'],
                        'user_id' => $dataUser['id']
                    ]);
                    return redirect('dashboard');
                } else {
                    session()->setFlashdata('error', 'Username & Password Salah');
                    return redirect()->back();
                }
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
    }
    public function logout(){
        session()->destroy();
        return redirect()->to(('/'));		
	}
}
