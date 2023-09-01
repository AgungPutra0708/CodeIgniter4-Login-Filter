<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmployeeModel;
use App\Models\UserModel;

class EmployeeController extends BaseController
{
    public function index()
    {
        if (session()->get('username') != '') {
            $users = new UserModel();
            $employee = new EmployeeModel();
            $data['users'] = $users->findAll();
            $data['employee'] = $employee->findAll();
            $data['title'] = 'Employee';
            return view('employee/index', $data);
        }else{
            return redirect('/');
        }
    }
    public function create() {
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'username' => 'required',
            'file_upload' => 'uploaded[file_upload]|mime_in[file_upload,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_upload,3000]'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        // $upload = $this->request->getFile('file_upload');
        // $upload->move(WRITEPATH . '../public/assets/img/');
        $fileImage_name = "";
        if(isset($_FILES) && @$_FILES['file_upload']['error'] != '4') {
            if($fileImage = $this->request->getFile('file_upload')) {
                if (! $fileImage->isValid()) {
                    throw new \RuntimeException($fileImage->getErrorString().'('.$fileImage->getError().')');
                } else {            
 
                    $fileImage->move(WRITEPATH . '../public/assets/img/');
                    $fileImage_name = $fileImage->getName();
                }
            }
        }

        // jika data valid, simpan ke database
        if($isDataValid){
            $employee = new EmployeeModel();
            $employee->insert([
                "name" => $this->request->getPost('name'),
                "nik" => $this->request->getPost('nik'),
                "address" => $this->request->getPost('address'),
                "image" => $fileImage_name,
                "created_at" => date('Y-m-d H:i:s')
            ]);
            return redirect('employee');
        }
        // tampilkan form create
        return redirect('employee');
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
