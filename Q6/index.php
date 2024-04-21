<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Snail Climbing Out of Well</title>
</head>
<body>

<h2>Snail Climbing Out of Well</h2>

<?php
// Define parameters
$climb_per_day = 3; // meters climbed during the day
$slide_per_night = 2; // meters slid down at night
$well_depth = 11; // depth of the well

// Initialize variables
$current_height = 0; // initial height of the snail
$days = 0; // number of days taken

// Loop until the snail reaches or exceeds the well depth
while ($current_height < $well_depth) {
    // Snail climbs up during the day
    $current_height += $climb_per_day;
    $days++; // increment the number of days

    // Check if the snail has reached or exceeded the well depth
    if ($current_height >= $well_depth) {
        break; // exit the loop if the snail has reached or exceeded the well depth
    }

    // Snail slides down at night
    $current_height -= $slide_per_night;
}

// Output the result
echo "<p>The snail will come out of the well in $days days.</p>";
?>

</body>
</html>
