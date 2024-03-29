<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('issues', IssueController::class);
    $router->resource('pages', PageController::class);
    $router->resource('posts', PostController::class);
    $router->resource('menus', MenuController::class);
    $router->resource('projects', ProjectController::class);
    $router->resource('users', UserController::class);

});
