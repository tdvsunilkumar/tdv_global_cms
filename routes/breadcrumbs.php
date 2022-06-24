<?php

Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', '');
});

Breadcrumbs::for('settings', function ($trail) {
	$trail->push('Dashboard', route('dashboard'));
    $trail->push('Website Setting', '');
});

Breadcrumbs::for('select_page', function ($trail) {
	$trail->push('Dashboard', route('dashboard'));
    $trail->push('Modules', '');
});

Breadcrumbs::for('add_module', function ($trail) {
	$trail->push('Dashboard', route('dashboard'));
    $trail->push('Modules', route('select_page'));
    $trail->push('Add New Module', '');
});

Breadcrumbs::for('pages', function ($trail) {
	$trail->push('Dashboard', route('dashboard'));
    $trail->push('Pages', '');
});

Breadcrumbs::for('add_page', function ($trail) {
	$trail->push('Dashboard', route('dashboard'));
    $trail->push('Pages', route('pages'));
    $trail->push('Add New', '');
});

Breadcrumbs::for('set_section', function ($trail) {
	$trail->push('Dashboard', route('dashboard'));
    $trail->push('Pages', route('pages'));
    $trail->push('Set Section', '');
});

Breadcrumbs::for('menu', function ($trail) {
	$trail->push('Dashboard', route('dashboard'));
    $trail->push('Menues', '');
});

Breadcrumbs::for('set_menu', function ($trail) {
	$trail->push('Dashboard', route('dashboard'));
    $trail->push('Menues', route('menue_list'));
    $trail->push('Set Menu', '');
});

Breadcrumbs::for('add_menu', function ($trail) {
	$trail->push('Dashboard', route('dashboard'));
    $trail->push('Menues', route('menue_list'));
    $trail->push('Add New Menu', '');
});

Breadcrumbs::for('edit_user', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
    $trail->push('Edit User', '');
});

Breadcrumbs::for('blogs', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
    $trail->push('Blogs', '');
});

Breadcrumbs::for('add_blogs', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
    $trail->push('Blogs', route('blogs'));
    $trail->push('Add/Update Blog', '');
});