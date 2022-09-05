<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\CampaignsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// can use route::resources('books','BooksController') here?

Route::get('/books',[BooksController::class, 'index']);
Route::post('/books',[BooksController::class, 'store']);
Route::get('/books/{id}',[BooksController::class, 'show']);
Route::put('/books/{id}',[BooksController::class, 'update']);
Route::delete('/books/{id}',[BooksController::class, 'delete']);

//Route::resource('campaigns',CampaignsController::class);

//Route::get('api.campaigns.show',[CampaignsController::class, 'show']);
//Route::get('api.campaigns.eligibleCheck',[CampaignsController::class, 'eligibleCheck']);

/* Route::get('campaigns',[CampaignsController::class, 'show'])->name('api.campaigns.show');
Route::get('campaigns',[CampaignsController::class, 'eligibleCheck'])->name('api.campaigns.eligibleCheck');
 */

Route::get('customers',[CustomersController::class, 'show'])->name('api.customers.show');
Route::get('customers',[CustomersController::class, 'getPurchases'])->name('api.customers.getPurchases');

Route::get('campaigns',[CampaignsController::class, 'eligibleCheck'])->name('api.campaigns.eligibleCheck');
//Route::get('campaigns',[CampaignsController::class, 'show'])->name('api.campaigns.show');