<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
class Module extends Model
{
    protected $fillable = ['module_name', 'module_code', 'module_description', 'module_image', 'module_type', 'page_id', 'theme_id'];

    public function value($value='')
    {
    	$controller = new Controller;
    	$themeId = (isset($controller->themeData['id']))?$controller->themeData['id']:0;
    	
    	return $this->hasOne(ModuleValue::class,'module','id')->where('theme_id',$themeId);
    }

    
}
