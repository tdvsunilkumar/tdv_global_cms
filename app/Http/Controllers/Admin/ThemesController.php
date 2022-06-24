<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Theme;
use App\Admin\Page;
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
            /* Create 3 pages by default home, about-us, contact-us */
            //echo 'called';exit;
                 $pageObj = new Page;
                 $homePage = $pageObj->where('page_name','home')->where('theme_id',$request->post('id'))->get();

                 if($homePage->isEmpty()){
                    $pageDataToSave = [
                        'page_name' =>'home',
                        'page_title'=>'page title',
                        'page_description'=>'page description',
                        'page_keywords' =>'page keywords',
                        'is_active' =>1,
                        'page_slug'=>'home',
                        'theme_id'=>$request->post('id')

                    ];
                    try {
                        $pageObj->create($pageDataToSave);
                    } catch (\Exception $e) {
                        
                    }
}
                    $aboutPage = $pageObj->where('page_name','about')->where('theme_id',$request->post('id'))->get();
                 if($aboutPage->isEmpty()){
                    $pageDataToSave = [
                        'page_name' =>'about',
                        'page_title'=>'page title',
                        'page_description'=>'page description',
                        'page_keywords' =>'page keywords',
                        'is_active' =>1,
                        'page_slug'=>'about-us',
                        'theme_id'=>$request->post('id')

                    ];
                    try {
                        $pageObj->create($pageDataToSave);
                    } catch (\Exception $e) {
                        
                    }
                 }

                 $contactPage = $pageObj->where('page_name','contact')->where('theme_id',$request->post('id'))->get();
                 if($contactPage->isEmpty()){
                    $pageDataToSave = [
                        'page_name' =>'contact',
                        'page_title'=>'page title',
                        'page_description'=>'page description',
                        'page_keywords' =>'page keywords',
                        'is_active' =>1,
                        'page_slug'=>'contact-us',
                        'theme_id'=>$request->post('id')

                    ];
                    try {
                        $pageObj->create($pageDataToSave);
                    } catch (\Exception $e) {
                        
                    }
                 }

                 $blogPage = $pageObj->where('page_name','blog')->where('theme_id',$request->post('id'))->get();
                 if($blogPage->isEmpty()){
                    $pageDataToSave = [
                        'page_name' =>'blog',
                        'page_title'=>'page title',
                        'page_description'=>'page description',
                        'page_keywords' =>'page keywords',
                        'is_active' =>1,
                        'page_slug'=>'blogs',
                        'theme_id'=>$request->post('id')

                    ];
                    try {
                        $pageObj->create($pageDataToSave);
                    } catch (\Exception $e) {
                        
                    }
                 }
                /* Create 3 pages by default home, about-us, contact-us */
    	}else{
    		$isThemeActive = 0;
    		$msg = "Your Theme deactivated Sucessfully !";
    	}
    	$dataToSave = [
           'is_theme_active' => $isThemeActive,
           'theme_id'        => $request->post('id')
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
