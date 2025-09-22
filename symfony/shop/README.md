# Symfony Store

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

Symfony comes with `symfony/flex` which is a composer plugin that adds aliases
and recipes which is a set of files required to make the installed package work.

> Once we install fixer with `composer require cs-fixer-shim`, we can format our
> project to follow the symfony code styling guide by running:
> `./vendor/bin/php-cs-fixer fix`
