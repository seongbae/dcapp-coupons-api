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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {
  $router->post('validate',  ['uses' => 'CouponController@validateCoupon']);

  // $router->get('coupons',  ['uses' => 'CouponController@showAllCoupons']);

  // $router->get('coupons/{id}', ['uses' => 'CouponController@showCoupon']);

  // $router->post('coupons', ['uses' => 'CouponController@create']);

  // $router->delete('coupons/{id}', ['uses' => 'CouponController@delete']);

  // $router->put('coupons/{id}', ['uses' => 'CouponController@update']);
});