<?php

$pagesArray = [
    ["pageNumber" => 1, "pageTitle" => "My Todo List"],
    ["pageNumber" => 2, "pageTitle" => "ADD Task"],
    ["pageNumber" => 3, "pageTitle" => "Modif Task"],
];

try {
    $dbCo = new PDO(
        'mysql:host=localhost;dbname=todolist;charset=utf8',
        'Cloud',
        'Ethan1109@Arya'
        
    );

    $dbCo->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC
    );
}
 catch (Exception $e) {
    die("Unable to connect to the database." . $e->getMessage());
}
    
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="all-css/style-css.css">
        <title>Todo list panda</title>
    </head>
<body class="dark-template">
    <div class="container">
        <header class="header">
            <h1 class="main-ttl"><?= isset($pageTitle) ? $pageTitle : "Titre par défaut" ?></h1>
        </header>