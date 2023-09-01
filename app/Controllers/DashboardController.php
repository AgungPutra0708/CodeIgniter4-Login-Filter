<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Dashboard';
		return view('dashboard/index', $data);
    }
}
