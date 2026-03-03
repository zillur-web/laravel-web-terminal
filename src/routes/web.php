<?php

use Illuminate\Support\Facades\Route;
use Zillur\WebTerminal\Http\Controllers\TerminalController;

Route::group([
    'prefix' => config('web-terminal.prefix', 'terminal'),
    'middleware' => config('web-terminal.middleware', ['web']),
], function () {
    Route::get('/', [TerminalController::class, 'index']);
    Route::post('/', [TerminalController::class, 'execute']);
});