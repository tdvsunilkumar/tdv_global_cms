<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    protected $fillable = ['page_id', 'section_id', 'is_active'];
}
