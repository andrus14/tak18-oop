<?php

require_once 'autoload.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$oBook = Book::findById($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muuda andmeid</title>
</head>
<body>
    <h1><?php echo $oBook->title; ?></h1>
    <form action="edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $oBook->id; ?>">
        <input type="text" name="title" value="<?php echo $oBook->title; ?>">
        <br><br>
        <input type="submit" value="Salvesta">
    </form>
</body>
</html>