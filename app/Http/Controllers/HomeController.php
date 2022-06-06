<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Page;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $settings = $this->settings;
        $page = new Page;
        $pages = $page->where('is_active',1)->where('page_name','home')->get()->first();
        $data['page']     = $pages;
        $data['settings'] = $settings;
        //dd($data);
        if(!empty($this->themeData)){
            //Display relevent theme data
            return view('frontent.Themes.'.$this->themeData['theme_name'].'.index',compact('data'));
        }else if(isset($this->mapedSettings['']) ){

        }else{
            //Display blank page with message no theme activated please activate the theme
            return view('welcome');

        }
    }

    
}
