<?php
$app->get('/', '\App\Controllers\HomeController:index');
$app->get('/about', '\App\Controllers\HomeController:about');

$app->get('/project', '\App\Controllers\ProjectController:index');
$app->any('/project-add', '\App\Controllers\ProjectController:add');
$app->get('/project-detail/{id}', '\App\Controllers\ProjectController:detail');
$app->get('/project-delete{id}', '\App\Controllers\ProjectController:delete');
$app->any('/project-update/{id}', '\App\Controllers\ProjectController:edit');

$app->get('/library', '\App\Controllers\LibraryController:index');
$app->any('/library-upload', '\App\Controllers\LibraryController:add');
$app->get('/library-delete/{id}', '\App\Controllers\LibraryController:delete');
$app->get('/library-download/{id}', '\App\Controllers\LibraryController:download');

$app->get('/update', '\App\Controllers\UpdateController:index');
$app->any('/update-add', '\App\Controllers\UpdateController:add');
$app->get('/update-detail/{id}', '\App\Controllers\UpdateController:detail');
$app->get('/update-delete/{id}', '\App\Controllers\UpdateController:delete');
$app->any('/update-edit/{id}', '\App\Controllers\UpdateController:edit');

$app->any('/login/{token}', '\App\Controllers\AuthController:login');
$app->get('/logout', '\App\Controllers\AuthController:logout');
$app->post('/riddle', '\App\Controllers\AuthController:riddle');