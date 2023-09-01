<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmployeeModel;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class UserController extends BaseController
{
    public function index()
    {
        if (session()->get('username') != '') {
            $users = new UserModel();
            $employee = new EmployeeModel();
            $data['users'] = $users->findAll();
            $data['employee'] = $employee->findAll();
            $data['title'] = 'User';
            return view('user/index', $data);
        }else{
            return redirect('/');
        }
    }
    public function create() {
        $validation =  \Config\Services::validation();
        $validation->setRules(['username' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if($isDataValid){
            $users = new UserModel();
            $password = $this->request->getPost('password');
            $p = password_hash((string)$password, PASSWORD_DEFAULT);
            $users->insert([
                "username" => $this->request->getPost('username'),
                "password" => $p,
                "created_at" => date('Y-m-d H:i:s')
            ]);
            return redirect('users');
        }
        // tampilkan form create
        return redirect('users');
    }
    public function edit()
    {
        // ambil artikel yang akan diedit
        $users = new UserModel();
        $id = $this->request->getPost('id');
        $data['users'] = $users->where('id', $id)->first();
        
        // lakukan validasi data artikel
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'id' => 'required',
            'username' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        $password = $this->request->getPost('password');
        $p = password_hash((string)$password, PASSWORD_DEFAULT);
        // jika data vlid, maka simpan ke database
        if($isDataValid){
            $users->update($id, [
                "password" => $p
            ]);
            return redirect('users');
        }

        // tampilkan form edit
        return redirect('users');
    }
    public function delete(){
        $users = new UserModel();
        $id = $this->request->getPost('id');
        $users->delete($id);
        return redirect('users');
    }
}
