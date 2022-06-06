<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Module;

class ModulesController extends Controller
{
    public function __construct()
    {
    	parent::__construct();
    }

    public function index($value='')
    {
    	$moduleObj = new Module;
    	$moduleData = $moduleObj->get();
    	$data['modules'] = $moduleData;
    	return view('admin.modules.index', compact("data"));
    }
}
