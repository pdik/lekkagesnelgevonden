<?php
// Home
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});
/*
 * Customers
 */
Breadcrumbs::for('klanten', function ($trail) {
    $trail->push('klanten.title', route('klanten.index'));
});
Breadcrumbs::for('klanten.create', function ($trail) {
    $trail->parent('klanten');
    $trail->push('klanten.create', route('klanten.create'));
});
Breadcrumbs::for('klanten.index', function ($trail) {
    $trail->push('klanten.index', route('klanten.index'));
});
Breadcrumbs::for('klanten.edit', function ($trail) {
     $trail->parent('klanten');
    $trail->push('klanten.edit');
});

/*
 * Customers
 */
Breadcrumbs::for('rapport', function ($trail) {
    $trail->push('rapport.title', route('rapport.index'));
});
Breadcrumbs::for('rapport.create', function ($trail) {
    $trail->parent('rapport');
    $trail->push('rapport.create', route('rapport.create'));
});
Breadcrumbs::for('rapport.index', function ($trail) {
    $trail->push('rapport.index', route('rapport.index'));
});
Breadcrumbs::for('rapport.edit', function ($trail) {
    $trail->parent('rapport');
    $trail->push('rapport.edit');
});

Breadcrumbs::for('profile', function ($trail) {
    $trail->push('profile.title');
});
Breadcrumbs::for('profile.edit', function ($trail) {
       $trail->parent('profile');
    $trail->push('profile.edit');
});
Breadcrumbs::for('profile.show', function ($trail) {
       $trail->parent('profile');
    $trail->push('profile.show');
});


