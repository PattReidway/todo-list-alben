<?php

try {
    $dbCo = new PDO(
        'mysql:host=localhost;dbname=todolist;charset=utf8',
        'Benal',
        'Benal'
    );

    $dbCo->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC
    );
}
 catch (Exception $e) {
    die("Unable to connect to the database." . $e->getMessage());
}

    $query = $dbCo->prepare("SELECT * FROM task WHERE done = 0;");
    $query->execute();
    $arrayTask = $query->fetchAll();

    ?>