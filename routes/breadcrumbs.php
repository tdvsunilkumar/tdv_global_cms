<?php

Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', '');
});

Breadcrumbs::for('settings', function ($trail) {
    $trail->push('Website Setting', '');
});

Breadcrumbs::for('modules', function ($trail) {
    $trail->push('Modules', '');
});

Breadcrumbs::for('pages', function ($trail) {
    $trail->push('Pages', '');
});

Breadcrumbs::for('add_page', function ($trail) {
    $trail->push('Pages', route('pages'));
    $trail->push('Add New', '');
});

Breadcrumbs::for('set_section', function ($trail) {
    $trail->push('Pages', route('pages'));
    $trail->push('Set Section', '');
});