# Laravel Web Terminal

A secure web-based Artisan terminal for Laravel applications.

Laravel Web Terminal allows you to run selected Artisan commands
directly from your browser with proper security and command
whitelisting.

------------------------------------------------------------------------

## ✨ Features

-   Run selected Artisan commands from browser
-   Command whitelist protection
-   Configurable route prefix
-   Configurable middleware
-   Publishable configuration file
-   Publishable views
-   Laravel auto-discovery support

------------------------------------------------------------------------

## 📦 Installation

Install via Composer:

``` bash
composer require zillur/laravel-web-terminal
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

After installation, visit:

    /terminal

(Default prefix is `terminal`, configurable in config file.)

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

    'prefix' => 'terminal',

    'middleware' => ['web', 'auth'],

    'allowed_commands' => [
        'migrate',
        'cache:clear',
        'config:clear',
        'route:clear',
        'queue:restart',
    ],

];
```

------------------------------------------------------------------------

## 🖥 Requirements

-   PHP 8.0 → 8.5
-   Laravel 8 → 12

------------------------------------------------------------------------

## 🤝 Contributing

Contributions are welcome. Feel free to submit a pull request.

------------------------------------------------------------------------

## 📄 License

This package is open-sourced software licensed under the MIT license.
