<?php

Route::group([
  'prefix'     => config('backpack.base.route_prefix', 'admin'),
  'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
  'namespace'  => 'Backpack\Vercel\app\Http\Controllers\Admin',
], function () {
    Route::get('/vercel', 'VercelController@vercel');
    Route::get('/vercel/redeploy', 'VercelController@redeploy');
}); 

