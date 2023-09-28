<?php

require_once 'connecttodb.php';
$breweryFromForm = $_POST['brewery'];
$beerFromForm = $_POST['beer'];
$abvFromForm = (float)$_POST['abv'];
$styleFromForm = $_POST['style'];
$brewedFromForm = (float)$_POST['brewed'];
$tasteFromForm = $_POST['tastes'];
$ratingFromForm = (float)$_POST['rating'];
$imageFromForm = $_POST['image'];

$query = $pdo->prepare(query: "INSERT INTO `beers` (`brewery`, `name`, `abv`, `style`, `comment`, `rating`, `imgsource`) VALUES('$breweryFromForm','$beerFromForm','$abvFromForm','$styleFromForm','$tasteFromForm','$ratingFromForm','$imageFromForm');");

$query->execute();

header('Location: index.php');
