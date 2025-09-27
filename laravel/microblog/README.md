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
