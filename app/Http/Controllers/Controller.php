<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Admin\Setting;
use App\Admin\Theme;
use App\Admin\PageSection;
use App\Admin\Menu;
use Mail;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $currencyCodes = [
            'AUD' => 'AUD - Australian dollar',
            'BRL' => 'BRL - Brazilian dollar',
            'CAD' => 'CAD - Canadian dollar',
            'CZK' => 'CZK - Czech koruna',
            'DKK' => 'DKK - Danish krone',
            'EUR' => 'EUR - Euro',
            'HKD' => 'HKD - Hong Kong dollar',
            'HUF' => 'HUF - Hungarian forint',
            'INR' => 'INR - Indian rupee',
            'ILS' => 'ILS - Israeli',
            'JPY' => 'JPY - Japanese yen',
            'MYR' => 'MYR - Malaysian ringgit',
            'MXN' => 'MXN - Mexican peso',
            'TWD' => 'TWD - New Taiwan dollar',
            'NZD' => 'NZD - New Zealand dollar',
            'NOK' => 'NOK - Norwegian krone',
            'PHP' => 'PHP - Philippine peso',
            'PLN' => 'PLN - Polish złoty',
            'GBP' => 'GBP - Pound sterling',
            'RUB' => 'RUB - Russian ruble',
            'SGD' => 'SGD - Singapore dollar',
            'SEK' => 'SEK - Swedish krona',
            'CHF' => 'CHF - Swiss franc',
            'THB' => 'THB - Thai baht',
            'USD' => 'USD - United States dollar'
        ];

        public $defaultPages = [
            'home','about','contact','blog'
        ];

        public $settings;

        public $themeData = [];

        public $isThemeActive;

        public $mapedSettings;

        public $socialIcons;

        public $menues = [];

        public $themeId = 0;

        public function __construct()
        {
            //dd(public_path());
        	$seeting = new Setting;
            $settings = $seeting->get()->toArray();
            $this->settings = $settings;
            
            $newSettings = collect($this->settings);
            
            $theme = $newSettings->where('name','is_theme_active')->where('value',1);
            if($theme->isEmpty()){
                $this->isThemeActive = 0;
            }else{
                $themeId = $newSettings->where('name','theme_id')->values();
                $themeId = (isset($themeId['0']['value']))?$themeId['0']['value']:0;
                $themeObj = new Theme;
                $getThemeData = $themeObj->where('id',$themeId)->first()->toArray();
                if(!empty($getThemeData)){
                    $this->themeData = $getThemeData;
                    $this->themeId   = $getThemeData['id'];
                }
                $this->isThemeActive = 1;
            }
            
                $this->mapedSettings = $newSettings->mapWithKeys(function ($item, $key) {
                         return [$item['name'] => $item['value']];
                })->toArray();
                //dd($this->mapedSettings);
                $socialIcon = [
                    'fa-facebook-square' => (isset($this->mapedSettings['social_facebook_link']))?$this->mapedSettings['social_facebook_link']:'',
                    'fa-instagram' => (isset($this->mapedSettings['social_instagram_link']))?$this->mapedSettings['social_instagram_link']:'',
                    'fa-pinterest' => (isset($this->mapedSettings['social_pinterest_link']))?$this->mapedSettings['social_pinterest_link']:'',
                    'fa-twitter'   => (isset($this->mapedSettings['social_twitter_link']))?$this->mapedSettings['social_twitter_link']:'',
                    'fa-tumblr'    => (isset($this->mapedSettings['social_tumblr_link']))?$this->mapedSettings['social_tumblr_link']:'',
                    'fa-youtube'   => (isset($this->mapedSettings['social_youtube_link']))?$this->mapedSettings['social_youtube_link']:'',
                ];
                $this->socialIcons = $socialIcon;
                $menuObj = new Menu;
                $menues = $menuObj->get();
                $this->menues = $menues->where('theme_id',$this->themeId)->mapWithKeys(function ($item, $key) {
                         return [$item['menu_location'] => json_decode($item['menu_data'],0)];
                })->toArray();
                //dd($this->mapedSettings);
                config()->set('mail.driver','smtp');
                config()->set('mail.host',(isset($this->mapedSettings['smtp_server']))?$this->mapedSettings['smtp_server']:config('mail.host'));
                config()->set('mail.port',(isset($this->mapedSettings['smtp_port']))?$this->mapedSettings['smtp_port']:config('mail.port'));
                config()->set('mail.from.address',(isset($this->mapedSettings['email_from']))?$this->mapedSettings['email_from']:config('mail.address'));
                config()->set('mail.from.name',(isset($this->mapedSettings['email_name']))?$this->mapedSettings['email_name']:config('mail.from.name'));
                config()->set('mail.encryption',(isset($this->mapedSettings['smtp_encryption']))?$this->mapedSettings['smtp_encryption']:config('mail.encryption'));
                config()->set('mail.username',(isset($this->mapedSettings['smtp_username']))?$this->mapedSettings['smtp_username']:config('mail.username'));
                config()->set('mail.password',(isset($this->mapedSettings['smtp_password']))?$this->mapedSettings['smtp_password']:config('mail.password'));
                //dd(config());

        }

        public function sendEmail($sender = [], $view = "", $data= [])
        {
                try {
                    Mail::send($view, $data, function ($message) use ($sender) {
                $message->from(config('mail.from.address'), config('mail.from.name'));
                $message->to(Auth::user()->email)->subject((isset($sender['subject']))?$sender['subject']:'Test Subject
                    ');
                });
                    $res = [
                        'status'=>'success',
                        'msg'   =>'Email sent successfully, We will cantact you soon!'

                    ];
                } catch (\Exception $e) {
                    $res = [
                        'status'=>'error',
                        'msg'   =>$e->getMessage()

                    ];
                }

                return json_encode($res);
        }
}
