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

We can also generate partials to clean up our templates.

```twig
{{ include('app/_homeAside.html.twig) }}
```

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

We can and should create our services. In fact, controllers and repositories
are services. We create our services inside the `src` directory. You can use
your own created services by adding them as method arguments (method injection)
or you can add them to the constructor (constructor injection). Constructor
injection will instantiate the service for each route while method injection
gives you more granular control.

## Routing

Inside our controller we handle routing with the route decorator.

```php
#[Route('/path/to/endpoint', methods: ['GET'])]
#[Route('/path/to/endpoint/{placeholder}', methods: ['GET'])]
```

We can also generate named routes which allow us to reference routes inside our
templates.

```php
#[Route('/product/{id}', name: 'product_show')]
```

```twig
<td>
    <a href="{{ path('product_show', {id: product.id} ) }}">
        {{ product.name }}
    </a>
</td>
```

## CSS, Javascript and Images with Asset Mapper

Symfony has a component that helps us manage our assets in an efficient manner
called Asset Mapper. It will automatically add asset versioning which to
optimize caching

```zsh
composer require symfony/asset-mapper
composer require symfony/asset
```

Now can run `bin/console debug:asset` to list all the logical paths to our
assets and insert them in our templates using the `asset()` function. We can
even add tailwind now.

```zsh
composer require symfonycasts/tailwind-bundle

bin/console tailwind:init
bin/console tailwind:build -w
```

In order to run tailwind everytime the server runs create a
`.symfony.local.yaml` file.

```yaml
workers:
  tailwind:
      cmd: ['symfony', 'console', 'tailwind:build', '--watch']
```
