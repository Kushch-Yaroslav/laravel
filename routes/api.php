<?php

use App\Enums\Role;
use App\Http\Controllers\UserController\AuthController;
use App\Http\Controllers\UserController\UserController;
use App\Http\Controllers\DishesController\DishesController;
use App\Http\Controllers\OrderController\OrderController;
use App\Http\Controllers\OrderToDishesController\OrderToDishesController;
use App\Http\Controllers\InvokeGet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
 * Authorization route
 */
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

/*
 * User routes
 */
Route::get('/user/{userId}', [UserController::class, 'show'])->middleware('check.token');
Route::get('/user/', [UserController::class, 'getAllUsers'])->middleware('check.token');
Route::put('/user/{userId}',[UserController::class,'editUser'])->middleware('check.token');
Route::delete('/user/{userId}',[UserController::class,'removeUser'])->middleware('check.token');

/*
 * Order routes
 */
Route::post('/order',[OrderController::class,'createOrder'])->middleware('check.token');
Route::get('/order/{order}',[OrderController::class,'getOrder'])->middleware('check.token');
Route::get('/order',[OrderController::class,'getAllOrders'])->middleware('check.token');
Route::put('/order/{orderId}',[OrderController::class,'editOrder'])->middleware('check.token');
Route::delete('/order/{orderId}',[OrderController::class,'removeOrder'])->middleware('check.token');

/*
 * Dishes routes
 */
Route::post('/dishes',[DishesController::class,'createDishes'])->middleware('check.token');
Route::get('/dishes/{dishesId}',[DishesController::class,'getDishes'])->middleware('check.token');
Route::get('/dishes',[DishesController::class,'getAllDishes'])->middleware('check.token');
Route::put('/dishes/{dishesId}',[DishesController::class,'editDishes'])->middleware('check.token');
Route::delete('/dishes/{dishesId}',[DishesController::class,'removeDishes'])->middleware('check.token');

/*
 * Orders to Dishes routes
 */
Route::post('/od',[OrderToDishesController::class,'createOD'])->middleware('check.token');
Route::get('/od/{id}',[OrderToDishesController::class,'getOD'])->middleware('check.token');
Route::get('/od',[OrderToDishesController::class,'getAllOD'])->middleware('check.token');
Route::put('/od/{id}',[OrderToDishesController::class,'editOD'])->middleware('check.token');
Route::delete('/od/{id}',[OrderToDishesController::class,'removeOD'])->middleware('check.token');

/*
 * ROLE:Admin routes
 */
Route::get('/admin',[])
    ->middleware('check.token')
    ->middleware('check.role:' . Role::Admin->value)
    ->middleware('check.role:' . Role::Moderator->value);


/*
 * Image routes
 */
Route::post('/image/upload',[ImageController::class,'upload']);
Route::get('/image/get/{imageId}',[ImageController::class,'get']);


//////INVOKE//////
Route::get('/invoke/{userId}',InvokeGet::class);


