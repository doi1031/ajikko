<?php

use Illuminate\Routing\Router;
use App\Admin\Controllers\EiyoController;
use App\Admin\Controllers\AjjikoRecipeController;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('eiyos', EiyoController::class);
    $router->resource('ajikko-recipes', AjjikoRecipeController::class);

});
