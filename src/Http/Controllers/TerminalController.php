<?php

namespace Zillur\WebTerminal\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class TerminalController extends Controller
{
    public function index(Request $request)
    {
        // Token check (optional, login-free security)
        $token = $request->query('token') ?? $request->header('X-WEB-TERMINAL-TOKEN');
        if ($token !== config('web-terminal.access_token')) {
            abort(403, 'Unauthorized');
        }

        return view('web-terminal::index'); // Blade view
    }

    public function execute(Request $request)
    {
        $token = $request->input('token') ?? $request->header('X-WEB-TERMINAL-TOKEN');
        if ($token !== config('web-terminal.access_token')) {
            abort(403, 'Unauthorized');
        }

        $command = $request->input('command');

        // Only allow whitelisted commands
        if (!in_array($command, config('web-terminal.allowed_commands'))) {
            return response()->json([
                'status' => 'error',
                'message' => 'Command not allowed.'
            ], 403);
        }

        try {
            Artisan::call($command);
            $output = Artisan::output();
            return response()->json([
                'status' => 'success',
                'output' => $output
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}