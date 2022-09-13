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

    if (isset($_POST['id_task']) && $_POST['action'] === 'up' && isset($_POST('id_task')){
        $query1 = $dbCo->prepare("UPDATE tasks"
        SET priority = priority -1
        WHERE priority = $orderTaks AND done = 0;")";
        $squery->execute();
    }

    // foreach($_POST["priority"] as $orderTask) {
    //     sort($orderTask)
    //     var_dump($ordertask)
    // }

    $orderTask = $dbCo->prepare("UPDATE INTO 'task' ('priority') VALUES (:number)");
    $orderTask->execute([
        "priority" => 
    ])

    $orderTask = $dbCo->query("SELECT priority FROM task");
    $orderTask->execute();
    $resultOrder = $orderTask->fetchAll();
    sort($resultOrder);

    
    // foreach($resultOrder as priorityOrder)


    var_dump($orderTask);


    header('Location: http://localhost/grandprojet2/');
    exit
?>