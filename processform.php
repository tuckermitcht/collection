<?php

$breweryFromForm = $_POST['brewery'];
$beerFromForm = $_POST['beer'];
$abvFromForm = (int)['abv'];
$styleFromForm = $_POST['style'];
$countryFromForm = $_POST['country'];
$ratingFromForm = (int)$_POST['rating'];
$imageFromForm = $_POST['image'];

$output = '<p>Hi ' . $nameFromForm . '.</p>'
    . '<p>You are ' . $ageFromForm . ' years old.</p>';

echo $output;

echo '<p><a href="index.php">Back to home page</a></p>';
