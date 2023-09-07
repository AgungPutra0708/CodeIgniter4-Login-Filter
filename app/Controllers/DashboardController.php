<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmployeeModel;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    public function index()
    {
            $users = new UserModel();
            $employee = new EmployeeModel();
            $data['title'] = 'Dashboard';
            $data['jumlah_data_user'] = $users->countAll();
            $data['jumlah_data_employee'] = $employee->countAll();
            return view('template/header', $data)
            .view('template/sidebar', $data)
            .view('template/topbar', $data)
            .view('dashboard/index', $data)
            .view('template/footer');
    }
}
