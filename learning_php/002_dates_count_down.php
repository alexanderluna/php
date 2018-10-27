<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>002 | Dates Count Down</title>
</head>
<body>
    <?php
    $future_date = mktime(0,0,0,11,9,2020);
    $today = time();

    $time_difference = $future_date - $today;
    $seconds_in_day = 86400;
    $days = (int) $time_difference / $seconds_in_day;

    echo $future_date / $seconds_in_day;
    print "The even occures in $days days";
    ?>
</body>
</html>