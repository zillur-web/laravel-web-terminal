# Laravel Web Terminal

A secure web-based Artisan terminal for Laravel applications.

Laravel Web Terminal allows you to run selected Artisan commands
directly from your browser with proper security and command
whitelisting.

------------------------------------------------------------------------

## ✨ Features

- Run selected Artisan commands from browser
- Command whitelist protection
- Configurable route prefix
- Middleware protection (web + CSRF)
- Optional secret token for security (login-free access)
- Publishable configuration file and views
- Laravel auto-discovery support
- Compatible with Laravel 8 → 12
- Compatible with PHP 8.0 → 8.5

------------------------------------------------------------------------

## 📦 Installation

Install via Composer:

``` bash
composer require zillur-web/laravel-web-terminal
```

------------------------------------------------------------------------

## ⚙️ Publish Configuration

``` bash
php artisan vendor:publish --tag=web-terminal-config
```

Optional: Publish views

``` bash
php artisan vendor:publish --tag=web-terminal-views
```

------------------------------------------------------------------------

## 🚀 Usage

Visit /terminal route to access the terminal.

Optional secret token is required for access (login-free)

Token can be passed via query string or header (X-WEB-TERMINAL-TOKEN)

Example: /terminal?token=laravel-web-terminal

Or in JavaScript headers:
``` bash
headers: {
    "X-WEB-TERMINAL-TOKEN": "laravel-web-terminal"
}
```


------------------------------------------------------------------------

## 🔐 Security

For security reasons, only commands listed in the configuration file are
allowed.

Example config:

``` php
'allowed_commands' => [
    'migrate',
    'cache:clear',
    'config:clear',
    'route:clear',
    'queue:restart',
],
```

It is strongly recommended to use authentication middleware in
production.

------------------------------------------------------------------------

## ⚙️ Configuration

Config file: `config/web-terminal.php`

``` php
return [

    // Route prefix
    'prefix' => 'terminal',

    // Middleware
    'middleware' => ['web'],

    // Allowed artisan commands
    'allowed_commands' => [
        'migrate',
        'cache:clear',
        'config:clear',
        'route:clear',
        'queue:restart',
    ],

    // Optional secret token for security (login-free access)
    'access_token' => env('WEB_TERMINAL_TOKEN', 'laravel-web-terminal'),

];
```

------------------------------------------------------------------------

## 🖥 Requirements

- PHP 8.0 → 8.5
- Laravel 8 → 12

------------------------------------------------------------------------

## 🤝 Contributing

Contributions are welcome. Feel free to submit a pull request.

------------------------------------------------------------------------

## 📄 License

This package is open-sourced software licensed under the MIT license.
