<?php

require_once 'autoload.php';

$aBooks = Book::findAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raamatute nimekiri</title>
</head>
<body>
    <ul>
        <?php
        foreach ( $aBooks as $oBook ) {
            echo '<li><a href="book.php?id=' . $oBook->id . '">' . $oBook->title . '</a></li>';
        }
        ?>
    </ul>
</body>
</html>