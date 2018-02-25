<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Title</title>
  </head>
  <body>
    <?php

    $my_name = 'alexander';
    $arr = ['a', 'b', 'c'];
    // $arr = (int) $arr;

    if (is_int($arr)) {
      echo "this array is an integer: $arr";
    } else {
      echo 'this array is not an integer';
    }

    $large_number = 9223372036854775807;
    var_dump($large_number);

    for ($i=0; $i < count($arr); $i++) {
      echo "array: $arr[$i]\n";
    }

    foreach ($arr as $char) {
      echo $char;
    }
    ?>
  </body>
</html>
