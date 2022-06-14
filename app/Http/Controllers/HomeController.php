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
        $pages = $page->where('is_active',1)->where('page_name','home')->with('pagesections.section.value')->get()->first()->toArray();
        $data['page']     = $pages;
        $data['settings'] = $settings;
        //dd($data);
        if(!empty($this->themeData) && !empty($pages
        )){
            //Display relevent theme data
            return view('frontent.Themes.'.$this->themeData['theme_name'].'.index',compact('data'));
        }else if($data['page'] == null) {
            $data['msg'] = 'Please create a page with name "home" from admin panel';
            return view('welcome',compact('data'));
        }else{
            //Display blank page with message no theme activated please activate the theme
            $data['msg'] = 'No theme activated please login to Admin Panel and select your theme';
            return view('welcome',compact('data'));

        }
    }


    public function otherPages ($slug ='')
    {
        $settings = $this->settings;
        $page = new Page;
        $pages = $page->where('is_active',1)->where('page_slug',$slug)->with('pagesections.section.value')->get()->first()->toArray();
        $data['page']     = $pages;
        $data['settings'] = $settings;
        //dd($data);
        if(!empty($this->themeData) && !empty($pages
        )){
            //Display relevent theme data
            return view('frontent.Themes.'.$this->themeData['theme_name'].'.index',compact('data'));
        }else if($data['page'] == null) {
            $data['msg'] = 'Please create a page with name "home" from admin panel';
            return view('welcome',compact('data'));
        }else{
            //Display blank page with message no theme activated please activate the theme
            $data['msg'] = 'No theme activated please login to Admin Panel and select your theme';
            return view('welcome',compact('data'));

        }
    }

    
}
