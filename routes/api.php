<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TicketController;

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


Route::get('processed-tickets/', [TicketController::class ,'getProcessedTickets']);
Route::get('unprocessed-tickets/', [TicketController::class ,'getUnprocessedTickets']);
Route::get('user-tickets/{email}', [TicketController::class ,'getUserTickets']);
Route::get('ticket-stats', [TicketController::class ,'getStats']);
