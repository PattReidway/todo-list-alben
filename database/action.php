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

    if (isset ($_GET["id_task"])&& isset($_GET["action"])&& ($_GET["action"]==="done")){
        $query = $dbCo->prepare("UPDATE task SET done = :done  WHERE id_task = :id_task;");
        $query->execute([
            "id_task" => $_GET["id_task"],
            "done" => 1
        ]);
    
    }
    header('Location: http://localhost/Todo-list-alben/');
    exit
?>