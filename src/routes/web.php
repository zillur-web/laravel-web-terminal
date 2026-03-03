<?php

use Illuminate\Support\Facades\Route;
use Zillur\WebTerminal\Http\Controllers\TerminalController;

Route::middleware(config('web-terminal.middleware'))
    ->prefix(config('web-terminal.prefix'))
    ->group(function () {
        Route::get('/', [TerminalController::class, 'index'])
            ->name('web-terminal.index');

        Route::post('/run', [TerminalController::class, 'run'])
            ->name('web-terminal.run');
    });
