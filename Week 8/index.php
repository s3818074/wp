<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello World</title>
</head>
<!--
    Valid time: T12,T15,T18,T21,T00
    Discount: 
    Mon - Fri except T18 and T21
    Sat - Sun only T00
-->

<body>
    <?php
    function isDiscountOrFull($day, $hour)
    {
        if(in_array($day,['MON','TUE','WED','THU','FRI']))
        {
            if(in_array($hour,['T12','T15','T00'])) return 'Discount';
            if (in_array($hour,['T18','T21'])) return 'Full';
            return 'Invalid';
        }
        if(in_array($day,['SAT','SUN']))
        {
            if($hour == 'T00') return 'Discount';
            if (in_array($hour,['T12','T15','T18','T21'])) return 'Full';
            return 'Invalid';
        }
        return 'Invalid';
    }

    $days = ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN','FUN'];
    $hours = ['T12', 'T15', 'T18', 'T21', 'T00','T99'];

    foreach ($days as $day) {
        foreach ($hours as $hour) {
            echo "<p> {$day} - {$hour} - " . isDiscountOrFull($day,$hour) . "</p>";
        }
        # code...
    }

    ?>

</body>

</html>