<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Observers\PageObserver;

class Page extends Model
{

    protected $fillable = ['page_name', 'page_title', 'page_description', 'page_keywords', 'is_active', 'page_slug', 'theme_id'];

    public function pagesections($value='')
    {
    	return $this->hasMany(PageSection::class,'page_id')->where('is_active',1)->orderBy('sort','ASC');
    }

    public function modules($value='')
    {
    	return $this->hasMany(Module::class,'page_id');
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($model) {
        	$model->modules()->delete();
        	$model->pagesections()->delete();
        });
    }

    
}
