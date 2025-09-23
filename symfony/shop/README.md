# Symfony Store

## Setup and Installation

Symfony is a framework that comes with binaries that help you to manage your
Symfony project, run a local webserver, and deploy apps. To get started,
[install Symfony](https://symfony.com/download) and run:

```zsh
symfony new YOUR_APP_NAME
```

This generates a project with all the files and directories you need to get
started. Here a quick overview of the files and their purpose.

- `public/index.php`: front controller that handles web requests
- `src`: where our app lives
  - `src/Controller`: where you respond to web requests
- `var`: symfony cache files
- `vendor`: where symfony and all other packages are installed
- `composer.json`: list all dependencies

## Composer and Packages

Symfony comes with `symfony/flex` which is a composer plugin that adds aliases
and recipes which is a set of files required to make the installed package work.

> Once we install fixer with `composer require cs-fixer-shim`, we can format our
> project to follow the symfony code styling guide by running:
> `./vendor/bin/php-cs-fixer fix`

## Templates with Twig

The most used templating library on symfony is `twig` which can be installed
thanks to `flex` with just: `composer require twig`. Now we have to modify our
controller so it extends the `AbstractController` in order to get shortcut
methods.

Inside the controller we can return our templates following a simple convention.
Every controller has to have its own folder inside the template directory and
each route/method should have a file named the same way.

```php
class AppController extends AbstractController
{
    public function home()
    {
        // return new Response(...)
        return $this->render('app/home.html.twig')
    }
}
```

```zsh
templates
├── app
│   └── home.html.twig
└── base.html.twig
```

> `base.html.twig` contains the template that is rendered on all views.

## Debug and Serialize JSON

Symfony has a powerful debugger which we can install thanks to `flex` with
just: `composer require debug`. This will add a development dependency which
renders a debug tool bar at the bottom of each webpage.

Just as we can return a simple response object, we can also return JSON in our
controller.

```php
class ProductApiController
{
  public function getCollection()
  {
    $products: [];
    return this->json($products);
  }
}
```

> However this doesn't work when we try to return an Object. For that, we can
> install `composer require serializer`. `this->json()` internally checks if the
> serializer plugin is installed and calls to convert PHP Objects into JSON.

## Services

At its core a service is an Object that does work. In symfony any work that is
done, is done by a service and so they are essential to how symfony works.
Services live inside a service container which centralizes the way objects are
constructed.

```zsh
bin/console debug:container
```

Behind these services we have bundles which give us services. Autowiring will
inject automatically dependencies into services which allows us to simplify the
configuration process.

```zsh
bin/console debug:autowiring
```
