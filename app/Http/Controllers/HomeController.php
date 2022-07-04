<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Page;
use App\Admin\Blog;
use Validator;
use Illuminate\Support\Facades\Auth;

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
        $pages = $page->where('is_active',1)->where('page_name','home')->where('theme_id',$this->themeId)->with('pagesections.section.value')->get()->first()->toArray();
        $data['page']     = $pages;
        $data['settings'] = $settings;
        //dd($data);
        if(!empty($this->themeData) && !empty($pages
        )){
            //Display relevent theme data
            return view('frontent.themes.'.$this->themeData['theme_name'].'.index',compact('data'));
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
        $pages = $page->where('is_active',1)->where('page_slug',$slug)->where('theme_id',$this->themeId)->with('pagesections.section.value')->get()->first();
        //dd($pages);
        $data['page']     = ($pages == null)?[]:$pages->toArray();
        $data['settings'] = $settings;
        if(!empty($this->themeData) && !empty($pages
        )){
            if(isset($pages->page_name) && $pages->page_name == 'blog'){
                $blogObj = new Blog;
                $blogData = $blogObj->where('theme_id',$this->themeId)->simplePaginate(10);
                $data['blogs'] = $blogData;
                $recentBlogs = $blogObj->where('theme_id',$this->themeId)->orderBy('id','DESC')->limit(3)->get();
        $data['recentBlogs'] = $recentBlogs;
                return view('frontent.themes.'.$this->themeData['theme_name'].'.blog',compact('data'));
            }else{
                return view('frontent.Themes.'.$this->themeData['theme_name'].'.other_pages',compact('data'));
            }
            
        }else if($data['page'] == null) {
            $data['msg'] = '404 Error';
            return view('frontent.themes.'.$this->themeData['theme_name'].'.404',compact('data'));
        }else{
            //Display blank page with message no theme activated please activate the theme
            $data['msg'] = 'No theme activated please login to Admin Panel and select your theme';
            return view('welcome',compact('data'));

        }
    }


    public function detailBlog($slug ='')
    {
        $blogobj = new Blog;
        $blogDetail = $blogobj->where('blog_slug',$slug)->where('theme_id',$this->themeId)->get()->first();
        $data['blog'] = $blogDetail;
        $featuredBlogs = $blogobj->where('theme_id',$this->themeId)->where('id','!=',$blogDetail->id)->where('is_feature',1)->get();
        $data['featuredBlog'] = $featuredBlogs;
        if($blogDetail != null){
            return view('frontent.Themes.'.$this->themeData['theme_name'].'.blog_details',compact('data'));
        }else{
            return redirect(route('slug_url','blogs'));
        }
    }


    public function sendEmailContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'email'     => 'required|email',
            'subject'    => 'required',
        ]);
        if ($validator->fails()) {
            $validationErrors =  $validator->errors();
            $res = [
              'status'   =>'validation_error',
              'data'     =>$validationErrors
            ];
            return  json_encode($res);
        }
        $res = $this->sendEmail(['subject'=>'New Customer Query through Contact Form'],'frontent.email.contact_form',['data'=>$request->post()]);
        return $res;
    }


    
}
