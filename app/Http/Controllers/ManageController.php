<?php

namespace App\Http\Controllers;

use App\Models\manage;
use App\Models\Admin;

use App\Http\Requests\StoremanageRequest;
use App\Http\Requests\UpdatemanageRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class ManageController extends Controller
{



    public function index()
    {



        return view('manage.index'); // Load trang quản lý
    }


}
