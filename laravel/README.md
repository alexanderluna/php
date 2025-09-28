# Laravel

## Requirements

Whether you want to use Laravel on your own machine or on a virtual machine you
will have to install a few things:

- PHP >= 8.1
- XML
- OpenSSL
- PDO
- Mbstring
- Tokenizer
- Ctype
- JSON
- BCMath
- Composer

## Development Environments

You have several development environments at your disposal to run your Laravel
application:

- `php -S localhost:8000 -t public`: simplest approach
- `php artisan serve`: same as php -S but easier to remember
- [laravel sail](https://github.com/laravel/sail): dockerized approach
- [laravel valet](https://laravel.com/docs/12.x/valet): easiest option for macOS
- [laravel herd](https://herd.laravel.com): valet app for macOS
- [laravel homestead](https://laravel.com/docs/5.2/homestead) configuration tool for Vagrant, a VM manager

## Creating a Laravel Project

```zsh
# Option 1: laravel installer tool
composer global require "laravel/installer"
laravel new YOUR_PROJECT

# Option 2: composer create-project feature
composer create-project laravel/laravel YOUR_PROJECT
```
