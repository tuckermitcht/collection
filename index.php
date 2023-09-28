<?php
require_once 'connecttodb.php';
$query = $pdo->prepare(
    'SELECT `brewery`, `beers`.`name` AS "beername", `ABV`, `rating`, `comment`, `beers`.`year`, `style`, `imgsource`, `breweries`.`name` AS "breweryname"'
    . 'FROM `beers`'
    . 'INNER JOIN `breweries`'
    . 'ON `brewery` = `breweries`.`id`;'
);

$query->execute();
$beers = $query->fetchALL();

$query = $pdo->prepare(
    'SELECT `id`, `name` FROM `breweries`'
);

$query->execute();
$breweries = $query->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Beer Collection</title>
    <meta name="description" content="Intro to forms with PHP">
    <meta name="author" content="iO Academy">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Germania+One&family=Montserrat&family=Philosopher:wght@400;700&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="images/favicon.png" sizes="192x192">
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="apple-touch-icon" href="images/favicon.png">
</head>

<body>
<div class="topnav">
    <a class="addbeer" href="#addbeer">Add to Collection </a>
</div>

<div id="project-wrapper">
    <div class="recent-projects" id="recent-projects">
    </div>
</div>
<h1>My Beer Collection</h1>
<div class="grid-container">
    <?php
    $html = "";
    foreach ($beers as $beer) {
        $html .= '<div class="column">'
            . '<h2 class="breweryname">' . $beer['breweryname'] . '</h2>'
            . '<h2> ' . $beer['beername'] . '</h2>'
            . '<img src="' . $beer['imgsource'] . '" alt=beer>'
            . '<p>ABV - ' . $beer['ABV'] . '</p>'
            . '<p>Style - ' . $beer['style'] . '</p>'
            . '<p>First brewed - ' . $beer['year'] . '</p>'
            . '<p>Tastes - ' . $beer['comment'] . '</p>'
            . '<p>Rating - ' . $beer['rating'] . '</p>'
            . '</div>';
    }
    echo $html;
    ?>
</div>

<h3>Add to Collections</h3>
<div id="addbeer" class="addtocollection">
    <form autocomplete="off" method="POST" action="processform.php" id="addbeerform">

        <label for="brewery">Brewery </label>
        <select id="brewery" name="brewery">
            <?php
            $brewerieshtml = '';
            foreach ($breweries as $brewery) {
                $brewerieshtml .= '<option value="' . $brewery['id'] . '">' . $brewery['name'] . '</option>';
            }
            echo $brewerieshtml;
            ?>
        </select>

        <label for="beer">Beer </label>
        <input type="text" name="beer" id="beer">

        <label for="abv">ABV</label>
        <input type="text" name="abv" id="abv">

        <label for="style">Style </label>
        <input type="text" name="style" id="style">

        <label for="brewed">First Brewed </label>
        <input type="text" name="brewed" id="brewed">

        <label for="tastes">Tastes </label>
        <input type="text" name="tastes" id="tastes">

        <label for="rating">Rating</label>
        <input type="text" name="rating" id="rating">

        <label for="image">Image</label>
        <input type="text" name="image" id="image">

        <button type="submit" name="submit" id="submit">Cheers, save my beer</button>

    </form>
</div>
<h5>© 2023 Mitch Tucker. All rights reserved. </h5>
</body>
</html>
