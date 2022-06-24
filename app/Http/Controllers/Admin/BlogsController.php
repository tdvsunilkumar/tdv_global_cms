<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Blog;
use Illuminate\Validation\Rule;
use Validator;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogObj = new Blog;
        $blogData = $blogObj->where('theme_id',$this->themeId)->get();
        $data['blogs'] = $blogData;
        return view('admin.blogs.index', compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($value = null)
    {
        $dataAfterSave  = [];
        try {
            $id = decrypt($value);
            $blogObj = new Blog;
            $dataAfterSave = $blogObj->find($id);
        } catch (\Exception $e) {
            $id = 0;
        }
        $data['blog'] = $dataAfterSave;
        return view('admin.blogs.create', compact("data"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->isThemeActive == 0){
            $response = [
                     'status' =>'error',
                     'msg'    => 'No theme selected yet, Please visit to setting page and select your theme!'
                ];
            return  json_encode($response);    
        }
        $pageSlug = $request->post('blog_slug');
        $pageName = $request->post('blog_name');
        $themeId  = $this->themeId;
        if($request->post('id') != ''){
            $pageId = $request->post('id');
            $pageNameVa = [
               'required',
                Rule::unique('blogs')->ignore($pageId)->where(function ($query) use ($pageName, $themeId){
                    return $query->where('theme_id',$themeId);
                })];
            $pageSlug = [
               'required',
                Rule::unique('blogs')->ignore($pageId)->where(function ($query) use ($pageSlug, $themeId){
                    return $query->where('theme_id',$themeId);
                })];
        }else{
            /*$pageNameVa = 'required|unique:pages';
            $pageSlug   = 'required|unique:pages';*/
            $pageNameVa = [
               'required',
                Rule::unique('blogs')->where(function ($query) use ($pageName, $themeId){
                    return $query->where('theme_id',$themeId);
                })];
            $pageSlug = [
               'required',
                Rule::unique('blogs')->where(function ($query) use ($pageSlug, $themeId){
                    return $query->where('theme_id',$themeId);
                })];    
        }
        $validator = Validator::make($request->all(), [
            'blog_name'     => $pageNameVa,
            'blog_title'     => 'required',
            'blog_content' => 'required',
            'blog_image'    => 'required',
            'blog_slug'    => $pageSlug
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
            'blog_name'        => $request->post('blog_name'),
            'blog_title'       => $request->post('blog_title'),
            'blog_description' => $request->post('blog_description'),
            'blog_content'     => $request->post('blog_content'),
            'blog_image'       => $request->post('blog_image'),
            'is_feature'       => $request->post('is_feature'),
            'blog_slug'        => $request->post('blog_slug'),
            'blog_tags'        => $request->post('blog_tags'),
            'theme_id'         => $request->post('theme_id')
        ];
        //dd($dataToSave);
        $pageObj = new Blog;
        $dataAfterSave = $pageObj->find($request->post('id'));
        if($dataAfterSave == null){
            try {
                $pageObj->create($dataToSave);
                $msg = "New Blog created successfully!";
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
                $msg = "New Blog updated successfully!";
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //dd('deletePage');
        $id = $request->post('id');
        //dd($id);
        $pageSecObj = new Blog;
        try {
            $pageSecObj->find($id)->delete();
            $response = [
                'status' => 'success',
                'msg'    => 'Blog removed successfully!'
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
