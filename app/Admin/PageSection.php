<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    protected $fillable = ['page_id', 'section_id', 'is_active','sort'];

    public function selectedPage($value='')
    {
    	return $this->hasOne(Page::class, 'id', 'page_id');
    }

    public function section($value='')
    {
    	return $this->hasOne(Module::class, 'id', 'section_id');
    }
}
