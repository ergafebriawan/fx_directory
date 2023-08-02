<?php
$app->get('/', '\App\Controllers\HomeController:index');
$app->get('/about', '\App\Controllers\HomeController:about');

$app->get('/project', '\App\Controllers\ProjectController:index');
$app->any('/project-add', '\App\Controllers\ProjectController:add');
$app->get('/project-detail', '\App\Controllers\ProjectController:detail');

$app->get('/library', '\App\Controllers\LibraryController:index');
$app->any('/library-upload', '\App\Controllers\LibraryController:add');

$app->get('/update', '\App\Controllers\UpdateController:index');
$app->any('/update-add', '\App\Controllers\UpdateController:add');
