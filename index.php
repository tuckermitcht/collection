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
//echo '<pre>';
//print_r($beers);
//echo '</pre>';
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
    <a class="active" href="#addbeer">Add to Collection</a>
    <a href="#contact">Looking for a beer</a>
    <input type="text" placeholder="Search..">
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
            . '<h2>' . $beer['breweryname'] . '</h2>'
            . '<h2> <a>' . $beer['beername'] . '</a></h2>'
            . '<img src="' . $beer['imgsource'] . '" alt=beer>'
            . '<p>' . $beer['ABV'] . '</p>'
            . '<p>' . $beer['comment'] . '</p>'
            . '<p>' . $beer['year'] . '</p>'
            . '<p>' . $beer['style'] . '</p>'
            . '</div>';
    }
    echo $html;
    ?>
</div>

<h3>Add to Collections
    <h3>
        <h4>Cheers, save my beer</h4>
</body>
</html>