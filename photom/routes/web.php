<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PhotoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get( '/', function () {
//     return view( 'upload' );
// });

Route::get( '/', [ PhotoController::class, 'index' ] ) -> name( 'photo.index' );
Route::get( '/upload', [ PhotoController::class, 'upload' ] ) -> name( 'photo.upload' );
Route::post( '/store', [ PhotoController::class, 'store' ] ) -> name( 'photo.store' );

Route::get( 'phpinfo', function() { return view( 'phpinfo' ); } );
