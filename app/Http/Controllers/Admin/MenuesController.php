<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Admin\Menu;
use App\Admin\Page;

class MenuesController extends Controller
{
    public function __construct($value='')
    {
    	parent::__construct();
    }

    public function index($value='')
    {
    	$dataAfterSave  = [];
    	try {
    		$id = decrypt($value);
    		$pageObj = new Menu;
        $dataAfterSave = $pageObj->find($id);
    	} catch (\Exception $e) {
    		$id = 0;
    	}
    	$data['menu'] = $dataAfterSave;
    	return view('admin.menues.index',compact('data'));
    }

    public function store(Request $request)
    {
    	if($request->post('id') != ''){
    		$menuNameVa = 'required|unique:menues,menu_name,'.$request->post('id');
    	}else{
    		$menuNameVa = 'required|unique:menues';
    	}
    	$validator = Validator::make($request->all(), [
            'menu_name'     => $menuNameVa,
            'menu_location'     => 'required'
        ]);
        if ($validator->fails()) {
            $validationErrors =  $validator->errors();
            $res = [
              'status'   =>'validation_error',
              'data'     =>$validationErrors
            ];
            return  json_encode($res);
        }
        
        $dataToSave = [
        	'menu_name' => $request->post('menu_name'),
        	'menu_location' =>$request->post('menu_location'),
        ];
        $menuObj = new Menu;
        $dataAfterSave = $menuObj->find($request->post('id'));
        if($dataAfterSave == null){
            try {
            	$menuObj->create($dataToSave);
            	$msg = "New Menu created successfully!";
            	$response = [
                     'status' =>'success',
                     'msg'    => $msg
            	];
            } catch (Exception $e) {
            	$msg = $e->getMessage();
            	$response = [
                     'status' =>'error',
                     'msg'    => $msg
            	];
            }
        }else{
        	try {
        		$dataAfterSave->update($dataToSave);
        		$msg = "New Menu updated successfully!";
        		$response = [
                     'status' =>'success',
                     'msg'    => $msg
            	];
        	} catch (Exception $e) {
        		$msg = $e->getMessage();
        		$response = [
                     'status' =>'error',
                     'msg'    => $msg
            	];
        	}

        }

        return json_encode($response);
    }


    public function menuList ($value='')
    {
    	$menuObj = new Menu;
    	$menuData = $menuObj->get();
    	$data['menues'] = $menuData;
    	return view('admin.menues.menuList', compact("data"));
    }

    public function setMenuItem ($value='')
    {
    	try {
    		$id = decrypt($value);
    		$menuObj = new Menu;
        $dataAfterSave = $menuObj->find($id);
    	} catch (\Exception $e) {
    		return redirect()->route('menue_list');
    	}
        $pageObj = new Page;
        $pages = $pageObj->where('is_active',1)->pluck('page_name','page_slug')->toArray();
        $data['menu']  = $menuObj->where('id',$id)->get()->first();
        
        $data['pages'] = $pages;
    	return view('admin.menues.setmenuitem',compact('data'));

    }

    public function savemenuItem (Request $request)
    {
    	$dataToSave = [
          'menu_data' => json_encode($request->post('menu_data'))
    	];
    	//dd(collect($request->post('menu_data'))->unique('name'));
    	$id = $request->post('menu_id');
    	$menuObj = new Menu;
    	try {
    		$dataAfterSave = $menuObj->find($id)->update($dataToSave);
    		$msg = "New Menu updated successfully!";
        		$response = [
                     'status' =>'success',
                     'msg'    => $msg
            	];
    	} catch (\Exception $e) {
    		$msg = $e->getMessage();
        		$response = [
                     'status' =>'error',
                     'msg'    => $msg
            	];
    	}

    	return json_encode($response);
    }


}
