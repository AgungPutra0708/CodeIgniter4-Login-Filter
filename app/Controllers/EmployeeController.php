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
            return view('template/header', $data)
            .view('template/sidebar', $data)
            .view('template/topbar', $data)
            .view('employee/index', $data)
            .view('template/footer');
        }else{
            return redirect('/');
        }
    }
    public function create() {
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'name' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        // jika data valid, simpan ke database
        if($isDataValid){
            $employee = new EmployeeModel();
            $validationFile =  \Config\Services::validation();
            $validationFile->setRules([
                'file_upload' => 'uploaded[file_upload]|mime_in[file_upload,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_upload,300]',
            ]);
            $isDataValidFile = $validationFile->withRequest($this->request)->run();
            if ($isDataValidFile) {
                $upload = $this->request->getFile('file_upload');
                $upload->move(WRITEPATH . '../public/assets/img/');
                $employee->insert([
                    "name" => $this->request->getPost('name'),
                    "nik" => $this->request->getPost('nik'),
                    "address" => $this->request->getPost('address'),
                    "img" => $upload->getName(),
                    "created_at" => date('Y-m-d H:i:s')
                ]);
                return redirect('employee');
            }else{
                $employee->insert([
                    "name" => $this->request->getPost('name'),
                    "nik" => $this->request->getPost('nik'),
                    "address" => $this->request->getPost('address'),
                    "created_at" => date('Y-m-d H:i:s')
                ]);
                return redirect('employee');
            }
        }
        // tampilkan form create
        return redirect('employee');
    }
    public function edit()
    {
        // ambil artikel yang akan diedit
        $employee = new EmployeeModel();
        $id = $this->request->getPost('id');
        
        // lakukan validasi data artikel
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'name' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        // jika data vlid, maka simpan ke database
        if($isDataValid){
            $validationFile =  \Config\Services::validation();
            $validationFile->setRules([
                'file_upload' => 'uploaded[file_upload]|mime_in[file_upload,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_upload,300]',
            ]);
            $isDataValidFile = $validationFile->withRequest($this->request)->run();
            if ($isDataValidFile) {
                $dt = $employee->where([
                    'id' => $id,
                ])->first();
                $gambar = $dt['img'];
                $path = '../public/assets/img/';
                @unlink($path.$gambar);
                $upload = $this->request->getFile('file_upload');
                $upload->move(WRITEPATH . '../public/assets/img/');
                $employee->update($id, [
                    "name" => $this->request->getPost('name'),
                    "nik" => $this->request->getPost('nik'),
                    "address" => $this->request->getPost('address'),
                    "img" => $upload->getName(),
                    "created_at" => date('Y-m-d H:i:s')
                ]);
                return redirect('employee');
            }else{
                $employee->update($id, [
                    "name" => $this->request->getPost('name'),
                    "nik" => $this->request->getPost('nik'),
                    "address" => $this->request->getPost('address'),
                    "created_at" => date('Y-m-d H:i:s')
                ]);
                return redirect('employee');
            }
        }

        // tampilkan form edit
        return redirect('employee');
    }
    public function delete(){
        $employee = new EmployeeModel();
        $id = $this->request->getPost('id');
        $dt = $employee->where([
            'id' => $id,
        ])->first();
        $gambar = $dt['img'];
        $path = '../public/assets/img/';
        @unlink($path.$gambar);
        $employee->delete($id);
        return redirect('employee');
    }
}
