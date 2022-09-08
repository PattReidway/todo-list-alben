<?php
require_once "database/functions.php";


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

    $query = $dbCo->prepare("SELECT * FROM task;");
    $query->execute();
    $arrayTask = $query->fetchAll();
    
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
            <h1 class="main-ttl">My Todo List</h1>
        </header>
    </div>
    <div>
        <ul class="task-list">
                <?php
                        foreach ($arrayTask as $task) {
                            echo "<li>".$task["description"]."</li>";
                        }
                
                ?>
            </ul>       
        </div>
        <footer class="footer">
    
<a href="./add-page.php" target="_blank"> <input type="button" class="add-button" value="ADD TASK" > </a>
    </footer>
</body>
</html>