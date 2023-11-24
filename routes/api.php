<?php
$app->get('/api/project', '\App\Controllers\ProjectController:get_all');
$app->post('/api/project', '\App\Controllers\ProjectController:add_project');
$app->get('/api/project/{id}', '\App\Controllers\ProjectController:get_detail');
$app->put('/api/project/{id}', '\App\Controllers\ProjectController:update_project');
$app->delete('/api/project/{id}', '\App\Controllers\ProjectController:delete_project');
$app->put('/api/project/archive/{id}', '\App\Controllers\ProjectController:archive_project');