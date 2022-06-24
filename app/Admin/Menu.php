<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menues';

    protected $fillable = ['menu_location', 'menu_name', 'menu_data', 'theme_id' ];
}
