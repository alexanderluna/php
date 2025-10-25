# Learning PHP

- [Basic Syntax](#basic-syntax)
  - [Variables](#variables)
  - [Arrays](#arrays)
  - [Conditionals](#conditionals)
  - [Strings](#strings)
  - [Functions](#functions)
  - [Loops](#loops)
  - [Classes & Inheritance](#classes-and-inheritance)
- [Practical Advice](#practical-advice)
  - [Formatting output](#format-output-with-printf-and-sprintf)
  - [Working with Date and Time](#working-with-date-and-time)
  - [Handling Files](#handling-files)
  - [Uploading Files](#uploading-files)
  - [System Calls](#system-calls)
- [Using a Database](#using-a-database)
- [Working with Forms](#working-with-forms)
  - [SQL Injection](#sql-injection)
- [Sessions and Session Variables](#sessions-and-session-variables)

## Basic Syntax

Every PHP program starts with a `<?php ?>` tag which encloses your PHP code. You
may omit the closing tag if your PHP file only has PHP code. Each command ends
with a semicolon and PHP doesn't care about spacing.

### Variables

When it comes to **variables** you have normal, static and global variables, as
well as constants and magic constants (predefined). Since PHP is loosely typed,
PHP will implicitly cast your variables. You can also explicitly cast them if
need to:

```php
// variables start with a letter or _
$player = "John";
$team_members = ['Bob', 'Ross', 'Jeff' ];
global $IS_ADMIN;
define("ROOT_LOCATION", "/usr/local"); // create a constant
echo $ROOT_LOCATION;
echo __FILE__; // predefined constants or magic constants
static $count = 0; // static variables keep their value each function call

$area = (int) ($length / $width)
```

### Arrays

You can use **arrays** in two ways. The normal way and the short syntax. The
normal way is useful for declaring two-dimensional arrays.

```php
$names = array('John', 'Bob', 'Jeff');
$names = ['John', 'Bob', 'Jeff'];
// $names[0] = 'John';
```

Arrays also have a lot of functions here are some of the most useful ones:

- `count`: return the number of elements in an array
- `sort`: directly sort the array (SORT_NUMERIC, SORT_STRING)
- `shuffle`: randomize an array directly
- `explode`: converts a string into an array

Beside your typical arrays, PHP also has **associative arrays** which are like
hashes, maps, dictionaries or objects in other languages.

```php
$team = array(
    'forward' => "John",
    'midfielder' => "Bob",
    'goalkeeper' => "Jeff"
);

echo $team['forward'];
```

> You typical **arithmetic**, **assignment** and **comparison** operators are
> also supported: `++`,`-`,`*=`,`%=`,`==`,`<>`. Beyond that PHP also has
> **logical** operators `&&`, `||`, '!' which uou can use as short circuits.

### Conditionals

As for conditionals, you have **if**, **elseif**, **switch** statements and the
short hand ternary operator.

```php
$bank_account = 0;
$transfer = 1000;

if (@$transfer > 1000) {
    $transfer_fee = $transfer * 0.05;
    $bank_account += $transfer - $transfer_fee;
} elseif ($transfer > 500) {
    $transfer_fee = $transfer * 0.02;
    $bank_account += $transfer - $transfer_fee;
} else {
    $transfer_fee = $transfer * 0.01;
    $bank_account += $transfer - $transfer_fee;
}

$bank_account = 0;
$transfer = 1000;

switch ($transfer) {
    case $transfer > 1000:
        $transfer_fee = $transfer * 0.05;
        $bank_account += $transfer - $transfer_fee;
        break;
    case $transfer > 500:
        $transfer_fee = $transfer * 0.02;
        $bank_account += $transfer - $transfer_fee;
        break;
    default:
        $transfer_fee = $transfer * 0.01;
        $bank_account += $transfer - $transfer_fee;
        break;
}

$bank_account += $transfer > 500 ? $transfer * 0.95 : $transfer * 0.99;
```

### Strings

> When converted to a string `TRUE` is converted to the string value "1" and
> `FALSE` becomes an empty string "".

**String concatenation** uses the period `echo "Hello " . "World\n";` while
**variable interpolation** uses curly braces `echo "Hello {$name}\n";`. For
**multiline strings** you have two options. You can use put multiple
lines between quotes or you use a here-document - heredoc.

```php
echo <<<_END
    New high score: {$score}
    Congratulation
_END;
```

### Functions

**Functions** are declared with the function keyword and can you can optionally
add type declaration:

```php
function today($timestamp): string
{
    // static variables keep their value each function call
    static $count = 0;
    $count++;
    $current_date = date("l F jS Y", $timestamp);
    return "# of times executed: {$count}, date: {$current_date}";
}

echo today(time());
```

PHP comes with a plethora of built-in functions. When writing your own functions
or when you want to use libraries by other programmers you can use the `include`
and `require` commands.

- `include`: attempts to load a PHP file and produces a warning upon failure
- `include_once`: same as `include` but it will check for already included files
- `require`: attempts to load a PHP file and produces a fatal error upon failure
- `require_once`: same as `require` but it will check for already included files

### Loops

PHP provides your common **loop** structures: `for`, `while`, `do while` and
`foreach as`.

```php
while ($player_status == "active") {
    echo "Moving forward 1 step";
    if ($steps > 1000) break;
}

do {
    if ($skip_frame) continue;
    echo "Rendering another frame";
} while ($game_running == true);

for ($attacks = 0; $attacks < 10; $attacks++) {
    $attack_strength = random_int(1, 25);
    echo "Attack round {$attacks}: You lost {$attack_strength}HP";
}

$team_members = array('John', 'Bob', 'Jeff');
foreach($team_members as $member)
{
    echo "{$member} joined the group";
}

$team = array(
    'forward' => "John",
    'midfielder' => "Bob",
    'goalkeeper' => "Jeff"
);
foreach($team_members as $position => $member)
{
    echo "{$member} plays as a {$position}";
}
```

> As seen earlier with the `switch` statement, you can also use a `break`
> statement within loops to break out of the loop and you can use the `continue`
> statement to stop the current iteration and go directly to the next iteration.

### Classes and Inheritance

For **Object-Oriented Programming**, PHP has the `class` keyword which you can
use to encapsulate your data and methods and exposing interfaces.

```php
class User
{
    public $email, $password;

    function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    function save()
    {
        echo "User was saved";
    }

    static function password_error_message()
    {
        echo "Password is too short";
    }
}

$john = new User("johndoe@example.com", "123456");
$john->email;

User::password_error_message();
```

> Static functions and variables called directly on a class not an object. You
> use the scope resolution operator to access them.

Once you have a class you can also derive subclasses from it using the `extends`
keyword. If a method has the same name in a subclass and it's parent class, the
subclass's statement will overwrite the parent's method. You can avoid this by
using the `parent` keyword to access the parent's method. When possible favor
composition over inheritance.

```php
class Admin extends User
{
    public $privileges;

    function __construct($email, $password, $privileges)
    {
        parent::__construct($email, $password);
        $this->privileges = $privileges;
    }

    function save()
    {
        parent::save();
        echo "Admin was saved";
    }
}
```

## Practical Advice

### Format output with printf and sprintf

While functions like `print` and `echo` work fine for most purposes, the
`printf` function gives you more control over the format of your output. You
can convert between values a specifier, control the precision and pad strings.

```php
// %b = binary, %c = ASCII, %d = int, %e = scientific notation
// %f = float, %o = octal, %s = string, %u = uint, %x/%X = lower/uppercase hex 
printf("There are %d player in your team", 11);

printf("The current temperature is %.2f Celsius", 15.54321) // 15.54

// justify right = %10, justify left = %-10
printf("The current temperature is %10.2f Celsius", 15.54321)
// The current temperature is      15.54 Celsius
```

If you don't want to output the result but want to use it somewhere else, you
use `sprintf`:

```php
$message = sprintf("The current temperature is %.2f Celsius", 15.54321)
```

### Working with Date and Time

If you want to work with time and dates you can use the `time`, `mktime` and
`date` functions. PHP uses the Unix timestamps (Unix epoch).

```php
// current time
echo time();

// time in 1 week = time + 7 days * 24h * 60m * 60s
echo time() + 7 * 24 * 60 * 60

// December 2025 = 0h, 0m, 0s, 12 month, 24 day, 2025 year
echo mktime(0, 0, 0, 12, 24, 2025);

// format the current time - Monday January 1st, 2025 - 1:30pm
echo date("l F jS, Y - g:ia", time());
```

### Handling files

To work with files in PHP you also have a lot of functions at your disposal:

- `file_exists`: check if a file already exists
- `file_get_contents`: fetch an entire file from disk or the internet
- `fopen`: opens a file in a given mode (r=read, w=write, a=append)
- `fwrite`: writes content into the file
- `fgets`: reads from a file by grabbing a whole line
- `fread`: read one or more lines
- `copy`: makes a copy of a given file
- `rename`: moves a file
- `unlink`: deletes a file
- `fseek`: move the file pointer
- `flock`: lock file to queue all other requests to the file to avoid corruption
- `fclose`: cleanup by closing the file manually and avoid open files

### Uploading Files

Uploading files in PHP is as simple as having a multipart HTML form and calling
the `move_uploaded_files` function.

```html
<form method='post' action='upload.php' enctype='multipart/form-data'>
    Select File:
    <input type='file' name='filename' size='10'>
    <input type='submit' value='Upload'>
</form>
```

```php
// move the file from a temporary location to a permanent one and done
$name = $_FILES['filename']['name'];
move_uploaded_file($_FILES['filename']['tmp_name'], $name);
```

### System Calls

Sometimes you want to run a command on your system programmatically and for that
PHP has the `exec` and `escapeshellcmd` functions.

```php
exec(escapeshellcmd("ls -laGh"), $output, $status);
```

## Using a Database

PHP has support for various database systems. The most popular option for PHP
is MySQL. We use the official mysql docker image to speed things up. Furthermore
, we install the **mysqli** extension to work with our mysql database:

```php
// connect to database
$conn = new mysqli(host, user, username);

// check for errors
if ($conn->connect_error) {
  echo 'ERROR: failed to connect to the database'.$conn.connect_error;
}

// perform an SQL query
$conn->query('SQL QUERY GOES HERE');

// display latest error
$conn->error;
```

## Working with Forms

You can access form field properties with the **$_POST/$_GET** variables which
holds all the post parameters and queries respectively:

```php
$name = $_POST['name'];

$conn = new msqli(init, db, connection);

// don't trust user input
$conn->escape_string($name);
```

### SQL Injection

As always, never trust user input. Any user can sneak in SQL statements into our
database if we don't clean up the input previously. For those reasons clean
and double check user inputs before inserting it into an SQL query.

## Sessions and Session Variables

Session variables persits across sites until the browser is closed or until we
terminate it explicitly. Sessions work by storing all the information using a
UID in a cookie. We can use Sessions in PHP like this:

```php
session_start();

<html>
...
```

We can then retrieve and set data in our Session using the **$_SESSION**
variables:

```php
// set data
$_SESSION['name'] = 'Alexander';
$_SESSION['country'] = 'Germany';

// get data
$_SESSION['name'];

// check if data exists
if (isset($_SESSION['name'])) {
  echo 'Name is already set';
} else {
  echo 'Name is not set';
}

// remove specific session data
unset($_SESSION['name'])

// remove all session data
session_destroy();
```
