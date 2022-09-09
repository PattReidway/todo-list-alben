<?php  
    

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
    
        $query = $dbCo->prepare("SELECT * FROM task WHERE done = 0;");
        $query->execute();
        $arrayTask = $query->fetchAll();
    

        // if($_GET["action"] === "done"){
        //         "UPDATE task
        //         SET done = 1 
        //         WHERE id_task = $task[id_task]";
        //     }

        echo $_GET["action"];
        echo $_GET["done"];

        $query = $dbCo->prepare("UPDATE 'task' SET done = :done  WHERE id_task = :id_task");
        $query->execute([
            "id_task" => $_GET["id_task"],
            "done" => 0
        ]) 



    ?>