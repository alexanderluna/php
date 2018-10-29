# Learning PHP

> In order to work with PHP we need a PHP server. For the simplest option is to
> use a docker conatiner and compose it up withe current directory mounted as
> a volume. View [docker-compose.yml](docker-compose.yml)

## The Basics

### Variables

Variables start with a dollar sign ($) and are case sensitive. The scope of the
variable depends on where you set it. It is possible to make variable gloablly
available using the **global** keyword:

```php
$normal_var = 'I have my own scope';
global $global_variable = 'I can be accessed anywhere';
```

### Numbers and Arithmetic

PHP supports basic arithmetic operators: (+, -, /, *, %, +=, -=,).
Some common numeric functions which come in handy:

- abs();
- pi();
- round();
- sqrt();

### Strings

Strings can be enclosed in single or double quotes. The difference between both
is that single quoted string return that exact string while double quoted
strings evalute any variable inside the string before returning the string.
Some common string functions include:

- htmlenteties(); // convert string to html
- html_entity_decode(); // convert html to string
- str_pad();
- str_repeat();
- str_replace();
- strtoupper();

### Control Structure

PHP supports all the common control structures:

- if/else
- switch
- while
- for

```php
if ($today == 'Sunday') {
  echo 'I do not have time on sunday';
} else {
  echo 'I do not have time in the week either';
}

switch($today) {
  case 'Monday':
    echo 'Monday is free';
    break;
  case 'Tuesday':
    echo 'Tuesday is busy';
    break;
  default:
    echo 'The other days are fexible call me';
}

while($today != 'Sunday'):
  echo 'Another busy day';
endwhile;

for($i = 0; $i < 10; $i++) {
  echo "This is round number $i";
}
```

## Format HTML

PHP is used to format HTML and inject dynamic content. This archived through a
server capable of parsing PHP and the special PHP tag
(**<?php code_goes_here ?>**):

```php
// print the version in the browser
<?php echo phpversion() ?>
```

We can inject HTML partials into our main HTML in a similar way:

```php
<body>
  <h1>My awesome title</h1>
  <?php include 'content.php'; ?>
</body>
```

> Note: variables declared in a partial are accessable where ever you include
> the partial.

## Working with Dates

PHP has built in functions to work with dates:

- mktime() - (timestamp for a time)
- time() - (get today's date)
- date() - (get and format date)