<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class DashboardController extends Controller
{
    public $title = 'Dashboard';

    public $breadCrumbs = [
     'Dashboard' => ['Dashboard' => '']
    ];

    public function index(Request $request)
    {
    	
    	return view('admin.dashboard.index');
    }
}
