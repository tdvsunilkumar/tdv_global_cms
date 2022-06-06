<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['page_name', 'page_title', 'page_description', 'page_keywords', 'is_active', 'page_slug'];
}
