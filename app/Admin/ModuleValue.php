<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ModuleValue extends Model
{
    protected $fillable = ['module', 'value', 'theme_id', 'default_value'];}
