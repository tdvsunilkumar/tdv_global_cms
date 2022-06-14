<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Admin\Setting;

class SettingsController extends Controller
{
    public function __construct()
    {
       parent::__construct();
    }


    public function index()
    {
        $settingObj = new Setting;
        $data['allSettings'] = $settingObj->pluck('value','name')->toArray();
    	return view('admin.settings.index', compact("data"));
    }

    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'website_name'     => 'required',
            'website_desc'     => 'required',
            'website_keywords' => 'required',
            'website_title'    => 'required',
        ]);
        if ($validator->fails()) {
            $validationErrors =  $validator->errors();
            $res = [
              'status'   =>'validation_error',
              'data'     =>$validationErrors
            ];
            return  json_encode($res);
        }
        $maintanaceMode = (isset($request->is_maintenance_mode) && $request->is_maintenance_mode == 'on')?1:0;
        $dataToSave = [
        	'is_maintenance_mode' => $maintanaceMode,
        	'website_name'        => $request->website_name,
        	'website_desc'        => $request->website_desc,
        	'website_keywords'    => $request->website_keywords,
        	'website_title'       => $request->website_title,
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
        	'msg'   => 'Settings Saved Sucessfully !'
        ]);
        
    }

    public function websiteLogo()
    {
    	$settingObj = new Setting;
        $data['allSettings'] = $settingObj->pluck('value','name')->toArray();
    	return view('admin.settings.websitelogo', compact("data"));
    }

    public function updateWebsiteLogo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'website_logo'     => 'required',
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
            'website_favicon'     => $request->website_favicon,
            'website_logo'        => $request->website_logo,
            'website_logo_white'  => $request->website_logo_white
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
            'msg'   => 'Settings Saved Sucessfully !'
        ]);
    }

    public function termsPolicy($value='')
    {
        $settingObj = new Setting;
        $data['allSettings'] = $settingObj->pluck('value','name')->toArray();
        return view('admin.settings.termspolicy', compact("data"));
    }

    public function updateTermsPolicy (Request $request)
    {
        $dataToSave = [
            'policy_content'       => $request->policy_content,
            'terms_content'        => $request->terms_content
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
            'msg'   => 'Settings Saved Sucessfully !'
        ]);
    }


    public function currencySettings ($value='')
    {
        $settingObj = new Setting;
        $data['allSettings'] = $settingObj->pluck('value','name')->toArray();
        $data['curreCodes'] = $this->currencyCodes;
        return view('admin.settings.currencysettings', compact("data"));
    }

    public function updateCurrencySettings (Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'currency_code'     => 'required',
            'currency_symbol'   => 'required'
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
            'currency_code'     => $request->currency_code,
            'currency_symbol'   => $request->currency_symbol
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
            'msg'   => 'Settings Saved Sucessfully !'
        ]);
    }

    public function emailSettings($value='')
    {
        $settingObj = new Setting;
        $data['allSettings'] = $settingObj->pluck('value','name')->toArray();
        return view('admin.settings.emailsettings', compact("data"));
    }

    public function updateemailSettings(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email_from'     => 'required',
            'email_name'     => 'required',
            'smtp_server'    => 'required',
            'smtp_port'      => 'required',
            'smtp_encryption'=> 'required',
            'smtp_username'  => 'required',
            'smtp_password'  => 'required'
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
            'email_from'        => $request->email_from,
            'email_name'        => $request->email_name,
            'smtp_server'       => $request->email_name,
            'smtp_port'         => $request->smtp_port,
            'smtp_encryption'   => $request->smtp_encryption,
            'smtp_username'     => $request->smtp_username,
            'smtp_password'     => $request->smtp_password,
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
            'msg'   => 'Settings Saved Sucessfully !'
        ]);
    }

    public function otherSettings()
    {
        $settingObj = new Setting;
        $data['allSettings'] = $settingObj->pluck('value','name')->toArray();
        return view('admin.settings.othersettings', compact("data"));
    }

    public function updateOtherSettings(Request $request)
    {
        //dd($request->post());
       $dataToSave = [
            'embed_head_javascript'       => $request->post('embed_head_javascript'),
            'embed_javascript'            => $request->post('embed_javascript'),
            'social_facebook_link'        => $request->post('social_facebook_link'),
            'social_instagram_link'       => $request->post('social_instagram_link'),
            'social_pinterest_link'       => $request->post('social_pinterest_link'),
            'social_twitter_link'         => $request->post('social_twitter_link'),
            'social_tumblr_link'          => $request->post('social_tumblr_link'),
            'social_youtube_link'         => $request->post('social_youtube_link'),
            'contact_tel'                 => $request->post('contact_tel'),
            'contact_email'               => $request->post('contact_email'),
            'company_name'                => $request->post('company_name'),
            
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
        return redirect()->route('other_settings');
    }
}
