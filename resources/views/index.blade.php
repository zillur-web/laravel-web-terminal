<!DOCTYPE html>
<html>
<head>
    <title>Laravel Web Terminal</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>Laravel Web Terminal</h1>

    <input type="text" id="command" placeholder="Enter Artisan command">
    <button onclick="runCommand()">Run</button>

    <pre id="output"></pre>

    <script>
        async function runCommand() {
            const command = document.getElementById('command').value;
            const token = "{{ config('web-terminal.access_token') }}";

            const response = await fetch("{{ url(config('web-terminal.prefix')) }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    "X-WEB-TERMINAL-TOKEN": token
                },
                body: JSON.stringify({ command, token })
            });

            const data = await response.json();
            document.getElementById('output').innerText = JSON.stringify(data, null, 2);
        }
    </script>
</body>
</html>