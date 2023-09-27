<?php
echo '<pre>';
print_r($_POST);
echo '</pre>';
$breweryFromForm = $_POST['brewery'];
echo $breweryFromForm;
$beerFromForm = $_POST['beer'];
echo $beerFromForm;
$abvFromForm = (float)$_POST['abv'];
echo $abvFromForm;
$styleFromForm = $_POST['style'];
echo $styleFromForm;
$countryFromForm = $_POST['country'];
echo $countryFromForm;
$ratingFromForm = (float)$_POST['rating'];
echo $ratingFromForm;
$imageFromForm = $_POST['image'];
echo $imageFromForm;

echo '<p><a href="index.php">Back to home page</a></p>';
