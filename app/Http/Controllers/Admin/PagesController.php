<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Page;
use App\Admin\Module;
use App\Admin\PageSection;
use Validator;

class PagesController extends Controller
{
    public function __construct($value='')
    {
    	parent::__construct();
    }

    public function index($value='')
    {
    	$pageObj = new Page;
    	$pageData = $pageObj->get();
    	$data['pages'] = $pageData;
    	return view('admin.pages.index', compact("data"));
    }

    public function add($value='')
    {
    	$dataAfterSave  = [];
    	try {
    		$id = decrypt($value);
    		$pageObj = new Page;
        $dataAfterSave = $pageObj->find($id);
    	} catch (\Exception $e) {
    		$id = 0;
    	}
    	
    	$data['page'] = $dataAfterSave;
    	return view('admin.pages.add', compact("data"));
    }

    public function store(Request $request)
    {
    	if($request->post('id') != ''){
    		$pageNameVa = 'required|unique:pages,page_name,'.$request->post('id');
    		$pageSlug   = 'required|unique:pages,page_slug,'.$request->post('id');
    	}else{
    		$pageNameVa = 'required|unique:pages';
    		$pageSlug   = 'required|unique:pages';
    	}
    	$validator = Validator::make($request->all(), [
            'page_name'     => $pageNameVa,
            'page_title'     => 'required',
            'page_description' => 'required',
            'page_keywords'    => 'required',
            'is_active' => 'required',
            'page_slug' => $pageSlug
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
        	'page_name' => $request->post('page_name'),
        	'page_title' =>$request->post('page_title'),
        	'page_description' =>$request->post('page_description'),
        	'page_keywords' =>$request->post('page_keywords'),
        	'page_slug' => str_slug($request->post('page_slug')),
        	'is_active' => $request->post('is_active')
        ];
        $pageObj = new Page;
        $dataAfterSave = $pageObj->find($request->post('id'));
        if($dataAfterSave == null){
            try {
            	$pageObj->create($dataToSave);
            	$msg = "New Page created successfully!";
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
        		$msg = "New Page updated successfully!";
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

    public function setSection ($id='')
    {
    	try {
    		$id = decrypt($id);
    	} catch (\Exception $e) {
    		return redirect()->route('pages');
    	}
    	$pageObj = new Page;
    	$data['page'] = $pageObj->where('id',$id)->get()->first();
    	$modulObj = new Module;
    	$data['modules'] = $modulObj->pluck('module_name','id')->toArray();
    	//dd($data);
    	return view('admin.pages.setsection', compact("data"));
    }

    public function storeSection (Request $request)
    {
    	$dataTosave = [
    		'page_id'    => $request->post('page_id'),
    		'section_id' => $request->post('section_id'),
    		'is_active'  => 1,
    		'sort'       => 1
    	];
    	$pageSectionObj = new PageSection;
    	try {
    		$pageSectionObj->create($dataTosave);
    		$response = [
    			'status' => 'success',
    			'msg'    => 'Section successfully added to page!'
    		];
    	} catch (\Exception $e) {
    		$response = [
    			'status' => 'error',
    			'msg'    => $e->getMessage()
    		];
    	}

    	return json_encode($response);
    }
}
