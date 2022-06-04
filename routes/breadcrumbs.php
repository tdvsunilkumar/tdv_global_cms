<?php

Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', '');
});

Breadcrumbs::for('settings', function ($trail) {
    $trail->push('Website Setting', '');
});