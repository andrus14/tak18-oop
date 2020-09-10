<?php

require_once 'autoload.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$aBookAuthors = BookAuthor::findAllByBookId($id);

foreach ($aBookAuthors as $oBookAuthor) {
    $oBookAuthor->delete();
}

$oBook = Book::findById($id);

$oBook->delete();

header("Location: index.php");