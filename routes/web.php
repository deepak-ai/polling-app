<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollController;



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

Route::get('/', [PollController::class, 'index']);
Route::post('/submit-poll', [PollController::class, 'submitPoll']);

Route::get('/poll-result', [PollController::class, 'result']);
