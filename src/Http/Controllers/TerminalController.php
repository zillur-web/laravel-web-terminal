<?php

namespace Zillur\WebTerminal\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;

class TerminalController extends Controller
{
    public function index()
    {
        return view('web-terminal::index');
    }

    public function run(Request $request)
    {
        $command = trim($request->command);
        $allowed = config('web-terminal.allowed_commands');

        if (!in_array($command, $allowed)) {
            return response()->json([
                'error' => 'Command not allowed.'
            ]);
        }

        Artisan::call($command);

        return response()->json([
            'output' => Artisan::output()
        ]);
    }
}
