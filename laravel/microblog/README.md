# Laravel

## Setup and Requirements

```sh
brew install php

brew install composer # add Composer to your path afterwards

composer global require laravel/installer

composer global require laravel/valet # development environment for laravel

valet install

cd path/where/you/store/projects

valet park # access each directory: http://<directory-name>.test
```

## Routes

Within the `routes/web.php` file laravel is responsible for handling routes and
rendering views.

## Views

The views and templates are inside the `resources/views` directory. In there,
you can create a components folder and add a `layout.blade.php` file. A layout
component is a template where you can inject content with the special `$slot`
variable.

```html
<head>
    <title>{{ isset($title) ? $title . ' - Chirper' : 'Chirper' }}</title>
</head>
<main class="flex-1 container mx-auto px-4 py-8">
    {{ $slot }}
</main>
```

We can inject content into the layout with the `x-layout` tag. The `x-title` tag
lets us set title in our layout.

```html
<x-layout>
    <x-slot:title>
        Welcome
    </x-slot:title>

    <h2>...</h2>
</x-layout>
```

## Controllers

To generate a controller you can use artisan and tell it if you want it to be
an empty controller, a resource or something else.

```zsh
php artisan make:controller
```

## Database

When we generate our laravel project we also created a database (depending your
choice). To make changes to it we can generate a migration and apply the
migration with artisan.

```zsh
php artisan make:migration

php artisan migrate

php artisan migrate:fresh # drop everything and reapply migrations
```

We can also experiment with our database by using the thinker command.

```zsh
php artisan tinker
```

Once we ran our migration we are going to need to a model which we can generate
with artisan.

```zsh
php artisan make:model

php artisan make:model Post -mrc # m = model, rc = resource controller
```
