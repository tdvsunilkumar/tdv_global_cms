<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Module;
use Validator;
use App\Admin\ModuleValue;
use App\Admin\Page;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\UrlGenerator;

class ModulesController extends Controller
{
    public function __construct()
    {
    	parent::__construct();
    }

    public function index($id = '')
    {
        try {
            $id = decrypt($id);
        } catch (\Exception $e) {
            return redirect()->route('select_page');
        }
    	$moduleObj = new Module;
        $pageObj = new Page;
    	$moduleData = $moduleObj->where('page_id',$id)->get();
        $data['page']    = $pageObj->where('id',$id)->get()->first();
    	$data['modules'] = $moduleData;
    	return view('admin.modules.index', compact("data"));
    }


    public function customModule ($id = null)
    {
        try {
            $id = decrypt($id);
        } catch (\Exception $e) {
            return redirect()->route('modules');
        }
        $moduleObj = new Module;
        $moduleData = $moduleObj->where('id',$id)->get()->first();
        $data['module'] = $moduleData;
        return view('admin.modules.custommodule', compact("data"));
    }

    public function saveCustomModule(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'module_name'     => 'required|unique:modules',
            'module_description' =>'required'
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
            'module_name' => $request->post('module_name'),
            'module_code' =>str_slug($request->post('module_name','_')),
            'module_description' => $request->post('module_description'),
            'module_image' =>'Modules/default_module_image.png',
            'module_type' =>'custom',
            'page_id'     => $request->post('page_id'),
            'theme_id'    => 0
        ];
        $pageObj = new Module;
            try {
                $pageObj->create($dataToSave);
                $msg = "New Module created successfully!";
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
        

        return json_encode($response);
    }

    public function test($value='')
    {
        $moduleValueObj = new ModuleValue;
        $data['moduleValue'] = $moduleValueObj->get()->first()->toArray();
        return view('admin.modules.test',compact('data'));
    }

    public function autoSaveCustomModule (Request $request)
    {
        //dd($request->post());
        $jsonDataToSave = [
           'gjs-html' => $request->post('gjs-html'),
           'gjs-components' => $request->post('gjs-components'),
           'gjs-assets'  => $request->post('gjs-assets'),
           'gjs-css'     => $request->post('gjs-css'),
           'gjs-styles'  => $request->post('gjs-styles')
        ];
       //dd($jsonDataToSave);
       $dataToSave = [
        'module' =>$request->post('module_id'),
        'value'  =>json_encode($jsonDataToSave),
        'theme_id' => $this->themeData['id']
       ];
       $moduleValueObj = new ModuleValue;
       $alreadyExistsValue = $moduleValueObj->where('module',$request->post('module_id'))->where('theme_id',$this->themeData['id'])->get();
       //dd($dataToSave);
       if($alreadyExistsValue->isEmpty()){
       try {
           $dataToSave['default_value'] = json_encode($jsonDataToSave);
           //$dataToSave['default_value']
           //dd($dataToSave);
           $moduleValueObj->create($dataToSave);
           $msg = "Module data saved successfully!";
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
   }else{
       try {
           $moduleValueObj->where('module',$request->post('module_id'))->update($dataToSave);
           $msg = "Module data saved successfully!";
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
   }

       return json_encode($response);
    }


    public function autoLoadCustomModule($id='',Request $request)
    {
        $moduleValueObj = new ModuleValue;
        $moduleValue = $moduleValueObj->where('module',$id)->where('theme_id',$this->themeData['id'])->get()->first();
        if(isset($request->restore) && $request->restore ==true){
            try {
                $dataToUpdate = [
                    'value' => $moduleValue->default_value
                ];
                //dd($dataToUpdate);
                $moduleValueObj->where('module',$id)->where('theme_id',$this->themeData['id'])->update($dataToUpdate);
            } catch (\Exception $e) {
                
            }
        }
        $data = (array)json_decode($moduleValue->value);
        $dataToReturn = [
            'gjs-components' => $data['gjs-components'],
            'gjs-styles' => $data['gjs-styles'],
            'gjs-assets'=> $data['gjs-assets'],
            'gjs-css'=> $data['gjs-css'],
            'gjs-html' => $data['gjs-html']

        ];
        return response()->json($dataToReturn)->header('Content-Type', 'application/json');
    }

    public function uploadFileGrapes (Request $request)
    {
        $path = public_path('files/');
        $files = $request->file('files');
        $fileData = [];
        foreach ($files as $file) {
            $filename = $file->getClientOriginalName();
            $tmp_name = $file->getPathname();
            if(!file_exists("$path/$filename")){
                move_uploaded_file($tmp_name, "$path/$filename");
            }
            $websiteUrl = (isset($this->mapedSettings['site_url']) && $this->mapedSettings['site_url'] != '')?$this->mapedSettings['site_url']:url('/');
            $img = 
                [
                    'src'    => $websiteUrl.'/files/'.$filename,
                    'type'   => $file->getClientOriginalExtension(),
                    'height' => 100,
                    'width'  => 200
            ];
            $fileData[] = $img;
        }
      echo json_encode(['data'=>$fileData]);
    }

    public function selectPage($value='')
    {
        $pageObj = new Page;
        $pageData = $pageObj->where('is_active',1)->where('theme_id',$this->themeId)->get();
        $data['pages'] = $pageData;
        return view('admin.modules.selectpage', compact("data"));
    }
}
