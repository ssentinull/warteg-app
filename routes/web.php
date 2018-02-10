<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

	$router->get('/', function () use ($router) 
		{
		    // return $router->app->version();
		});

	$router->group(['prefix' => 'v1'], function($router)
		{
			//Routes for CRUD method on Users object
			$router->post('users', 'UsersController@add');
			$router->get('users/{id}', 'UsersController@view');
			$router->put('users/{id}', 'UsersController@edit');
			$router->delete('users/{id}', 'UsersController@delete');
			$router->get('users', 'UsersController@allUser');

			//Routes for CRUD method on Restaurants object
			$router->post('restaurants', 'RestaurantsController@add');
			$router->get('restaurants/{id}', 'RestaurantsController@view');
			$router->put('restaurants/{id}', 'RestaurantsController@edit');
			$router->delete('restaurants/{id}', 'RestaurantsController@delete');
			$router->get('restaurants', 'RestaurantsController@allUser');
		});

	
