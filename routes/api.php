<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/userinfo', [UserController::class, 'userInfo']);
Route::post('/fileupload', [UserController::class, 'fileUpload']);

/*
Question 7:
Create a route in Laravel that handles a POST request to the '/submit' URL. Inside the route closure, 
retrieve the 'email' input parameter from the request and store it in a variable called $email. 
Return a JSON response with the following data:
{
    "success": true,
    "message": "Form submitted successfully."
}
*/
Route::post('/submit', function (Request $request) {
    $email = $request->input('email');

    $data = [
        'success' => true,
        'message' => 'Form submitted successfully.'
    ];

    return response()->json($data);
});
