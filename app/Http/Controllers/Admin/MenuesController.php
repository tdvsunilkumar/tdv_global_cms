<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Admin\Menu;
use App\Admin\Page;
use Illuminate\Validation\Rule;

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
        //dd(Rule::unique('menues')->ignore(10));
        if($this->isThemeActive == 0){
            $response = [
                     'status' =>'error',
                     'msg'    => 'No theme selected yet, Please visit to setting page and select your theme!'
                ];
            return  json_encode($response);    
        }
        $menuName = $request->post('menu_name');
        $menu_id =  $request->post('id');
        $themeId = $this->themeId;
    	if($request->post('id') != ''){
            $menuNameVa = [
               'required',
                Rule::unique('menues')->ignore($menu_id)->where(function ($query) use ($menuName, $menu_id, $themeId){
                    return $query->where('theme_id',$themeId);
                })
            ];
    	}else{
    		$menuNameVa = [
               'required',
                Rule::unique('menues')->where(function ($query) use ($menuName, $menu_id, $themeId){
                    return $query->where('theme_id',$themeId);
                })];
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
            'theme_id'      => $themeId
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
    	$menuData = $menuObj->where('theme_id',$this->themeId)->get();
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
        $pages = $pageObj->where('is_active',1)->where('theme_id',$this->themeId)->pluck('page_name','page_slug')->toArray();
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

    public function deleteMenu (Request $request)
    {
        $id = $request->post('id');
        //dd($id);
        $pageSecObj = new Menu;
        try {
            $pageSecObj->find($id)->delete();
            $response = [
                'status' => 'success',
                'msg'    => 'Menu removed successfully!'
            ];
        } catch (Exception $e) {
            $response = [
                'status' => 'error',
                'msg'    => $e->getMessage()
            ];
        }

        return json_encode($response);
    }


}
