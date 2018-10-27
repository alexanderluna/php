# Learning PHP

> In order to work with PHP we need a PHP server. For the simplest option is to
> use a docker conatiner and compose it up withe current directory mounted as
> a volume. View [docker-compose.yml](docker-compose.yml)

## Format HTML

PHP is used to format HTML and inject dynamic content. This archived through a
server capable of parsing PHP and the special PHP tag
(**<?php code_goes_here ?>**):

```php
// print the version in the browser
<?php echo phpversion() ?>
```

## Working with Dates

PHP has built in functions to work with dates:

- mktime() - (timestamp for a time)
- time() - (get today's date)
- 