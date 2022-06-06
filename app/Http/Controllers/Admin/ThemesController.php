<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Theme;
use App\Admin\Setting;

class ThemesController extends Controller
{
    public function __construct()
    {
    	# code...
    }

    public function index()
    {
    	$themeObj = new Theme;
    	$themes = $themeObj->where('is_working',1)->get();
        $data['allThemes'] = $themes;
        $settingObj = new Setting;
        $data['allSettings'] = $settingObj->pluck('value','name')->toArray();
        return view('admin.themes.themesettings', compact("data"));
    }

    public function store(Request $request)
    {
    	if($request->post('action_type') == 'activate'){
    		$isThemeActive = 1;
    		$msg = "Your Theme activated Sucessfully !";
    	}else{
    		$isThemeActive = 0;
    		$msg = "Your Theme deactivated Sucessfully !";
    	}
    	$dataToSave = [
           'is_theme_active' => $isThemeActive,
           'theme_id'        => decrypt($request->post('id'))
    	]; 
    	$settingObj = new Setting;
        foreach ($dataToSave as $key => $value) {
        	$res = $settingObj->where('name',$key)
        	                  ->get();
        	if($res->isEmpty()){
        		$settingObj->create([
        			'name'  => $key,
        			'value' => $value
        		]);

        	}else{
        		$settingObj->where('name', $key)
        		    ->update([
        			'value' => $value
        		]);

        	}
        }
        return json_encode([
        	'status'=> 'success',
        	'msg'   => $msg
        ]);
    }
}
