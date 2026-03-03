<!DOCTYPE html>
<html>

<head>
    <title>Web Terminal</title>
    <style>
        body {
            background: #000;
            color: #0f0;
            font-family: monospace;
            padding: 20px;
        }

        input {
            width: 100%;
            background: black;
            color: #0f0;
            border: none;
        }
    </style>
</head>

<body>

    <h3>Laravel Web Terminal</h3>

    <form id="terminalForm">
        <input type="text" name="command" autofocus>
    </form>

    <pre id="output"></pre>

    <script>
        document.getElementById('terminalForm')
            .addEventListener('submit', function(e) {
                e.preventDefault();

                fetch("{{ route('web-terminal.run') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            command: this.command.value
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        document.getElementById('output').innerText =
                            data.output ?? data.error;
                    });
            });
    </script>

</body>

</html>
