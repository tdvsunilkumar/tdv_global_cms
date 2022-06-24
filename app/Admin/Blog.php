<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['blog_name', 'blog_title', 'blog_description', 'blog_content', 'blog_image', 'is_feature','blog_slug', 'theme_id', 'blog_tags'];
}
