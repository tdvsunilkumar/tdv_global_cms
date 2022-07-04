<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Page;
use App\Admin\Module;
use App\Admin\ModuleValue;
use App\Admin\PageSection;
use Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class PagesController extends Controller
{
    public function __construct($value='')
    {
    	parent::__construct();
    }

    public function index($value='')
    {
    	$pageObj = new Page;
    	$pageData = $pageObj->where('theme_id',$this->themeId)->get();
    	$data['pages'] = $pageData;
        $data['defaultPages'] = $this->defaultPages;
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
        $data['defaultPages'] = $this->defaultPages;
    	return view('admin.pages.add', compact("data"));
    }

    public function store(Request $request)
    {
        //dd();
        if($this->isThemeActive == 0){
            $response = [
                     'status' =>'error',
                     'msg'    => 'No theme selected yet, Please visit to setting page and select your theme!'
                ];
            return  json_encode($response);    
        }

        $pageName = $request->post('page_name');
        $pageSlug = $request->post('page_slug');
        $themeId  = $this->themeId;
    	if($request->post('id') != ''){
    		/*$pageNameVa = 'required|unique:pages,page_name,'.$request->post('id');
    		$pageSlug   = 'required|unique:pages,page_slug,'.$request->post('id');*/
            $pageId = $request->post('id');
            $pageNameVa = [
               'required',
                Rule::unique('pages')->ignore($pageId)->where(function ($query) use ($pageName, $themeId){
                    return $query->where('theme_id',$themeId);
                })];
            $pageSlug = [
               'required',
                Rule::unique('pages')->ignore($pageId)->where(function ($query) use ($pageSlug, $themeId){
                    return $query->where('theme_id',$themeId);
                })];
    	}else{
    		/*$pageNameVa = 'required|unique:pages';
    		$pageSlug   = 'required|unique:pages';*/
            $pageNameVa = [
               'required',
                Rule::unique('pages')->where(function ($query) use ($pageName, $themeId){
                    return $query->where('theme_id',$themeId);
                })];
            $pageSlug = [
               'required',
                Rule::unique('pages')->where(function ($query) use ($pageSlug, $themeId){
                    return $query->where('theme_id',$themeId);
                })];    
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
        	'page_name'        => $request->post('page_name'),
        	'page_title'       =>$request->post('page_title'),
        	'page_description' =>$request->post('page_description'),
        	'page_keywords'    =>$request->post('page_keywords'),
        	'page_slug'        => str_slug($request->post('page_slug')),
        	'is_active'        => $request->post('is_active'),
            'theme_id'         => $request->post('theme_id')
        ];
        $pageObj = new Page;
        $dataAfterSave = $pageObj->find($request->post('id'));
        $previousPagename = $dataAfterSave->getOriginal('page_name');
        $previousPageslug = $dataAfterSave->getOriginal('page_slug');
        if(in_array($previousPagename,$this->defaultPages)){
            $dataToSave['page_name'] = $dataAfterSave->getOriginal('page_name');
            $dataToSave['page_slug'] = $dataAfterSave->getOriginal('page_slug');
        }
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
    	$pageSectionObj = new PageSection;
    	$selectedSections = $pageSectionObj->with('section','selectedPage')->where('page_id',$id)->get()->toArray();
    	//dd($selectedSections);
    	$pageObj = new Page;
    	$data['page'] = $pageObj->where('id',$id)->get()->first();
    	$modulObj = new Module;
    	$data['modules'] = $modulObj->where('page_id',$id)->pluck('module_name','id')->toArray();
    	$data['pageSection'] = $selectedSections;
    	return view('admin.pages.setsection', compact("data"));
    }

    public function storeSection (Request $request)
    {
    	$pageSectionObj = new PageSection;
    	$getNumberOfSection = $pageSectionObj->where('page_id',$request->post('page_id'))->get()->count();
    	//dd($getNumberOfSection);
    	$dataTosave = [
    		'page_id'    => $request->post('page_id'),
    		'section_id' => $request->post('section_id'),
    		'is_active'  => 1,
    		'sort'       => (int)($getNumberOfSection+1)
    	];
    	
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

    public function deleteSection (Request $request)
    {
        $id = $request->post('id');
        $pageSecObj = new PageSection;
        try {
            $pageSecObj->where('id', $id)->delete();
            $response = [
                'status' => 'success',
                'msg'    => 'Section removed from page successfully!'
            ];
        } catch (Exception $e) {
            $response = [
                'status' => 'error',
                'msg'    => $e->getMessage()
            ];
        }

        return json_encode($response);
        
    }


    public function deletePage(Request $request)
    {
        //dd('deletePage');
        $id = $request->post('id');
        //dd($id);
        $pageSecObj = new Page;
        try {
            $pageSecObj->find($id)->delete();
            $response = [
                'status' => 'success',
                'msg'    => 'Page removed successfully!'
            ];
        } catch (Exception $e) {
            $response = [
                'status' => 'error',
                'msg'    => $e->getMessage()
            ];
        }

        return json_encode($response);
    }

    public function makeClone(Request $request)
    {
        if($this->isThemeActive == 0){
            $response = [
                     'status' =>'error',
                     'msg'    => 'No theme selected yet, Please visit to setting page and select your theme!'
                ];
            return  json_encode($response);    
        }
        $themeId  = $this->themeId;
        $pageId = $request->post('id');
        $pageObj = new Page;
        $module  = new Module;
        $moduleValue  = new ModuleValue;
        $pageSection = new PageSection;
        $pageData = $pageObj->with(['modules.value','modules.pagesection'])->where('id',$pageId)->get()->first();
        /* Create a new Page */
        $newPageName = $pageData->page_name." page clone ".Carbon::now();
        $newPageData = [
            'page_name'          => $newPageName,
            'page_title'         => $pageData->page_title,
            'page_description'   => $pageData->page_description,
            'page_keywords'      => $pageData->page_keywords,
            'is_active'          => 0,
            'page_slug'          => str_slug($newPageName,'-'),
            'theme_id'           => $themeId,
        ];
        try {
            //dd($pageData->modules->toArray());
            $newPageObj = $pageObj->create($newPageData);
            if(!$pageData->modules->isEmpty()){
                foreach ($pageData->modules as $module) {
                    $dataToSave = [
                        'module_name' => $module->module_name,
                        'module_code' => $module->module_code,
                        'module_description' => $module->module_description,
                        'module_image' => $module->module_image,
                        'module_type' => $module->module_type,
                        'page_id' => $newPageObj->id,
                        'theme_id' => 0

                    ];
                    //dd($newPageObj->modules);
                    $newModuleObj = $module->updateOrCreate(['module_name'=>$module->module_name,'page_id'=>$newPageObj->id],$dataToSave);
                    if(isset($module->value) && $module->value != null){
                    $moduleValueData = [
                        'module' => $newModuleObj->id,
                        'value' => $module->value->value,
                        'default_value' => $module->value->default_value,
                        'theme_id' => $module->value->theme_id

                    ];
                    $moduleValue->create($moduleValueData);
                }

                if(isset($module->pagesection) && $module->pagesection != null){
                    $pageSectionData = [
                        'page_id' => $newPageObj->id,
                        'section_id' => $newModuleObj->id,
                        'is_active' => 1,
                        'sort' => $module->pagesection->sort

                    ];
                    $pageSection->create($pageSectionData);
                }
                }

        }
                    $response = [
                'status' => 'success',
                'msg'    => 'Clone Page created successfully!'
            ];
        } catch (\Exception $e) {
            $response = [
                'status' => 'error',
                'msg'    => $e->getMessage()
            ];
        }
        
        return json_encode($response);
    }

    public function updateSortField (Request $request)
    {
        //dd($request->post());
        $pageSectionId = $request->post('page_section_id');
        $sortData = $request->post('sort');
        $pageSectionObj = new PageSection;
        try {
            $pageSectionObj->find($pageSectionId)->update(['sort'=>$sortData]);
            $response = [
                'status' => 'success',
                'msg'    => 'Sort Updated successfully!'
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
