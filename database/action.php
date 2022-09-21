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
//----------------------------- the task is gone
    if (isset ($_GET["id_task"])&& isset($_GET["action"])&& ($_GET["action"]==="done")){
        $query = $dbCo->prepare("UPDATE task SET done = :done  WHERE id_task = :id_task;");
        $query->execute([
            "id_task" => $_GET["id_task"],
            "done" => 1
        ]);
    }

    
=======
// ------------------------------------- priority of the task
    $query = $dbCo->prepare("SELECT priority
    FROM task
    WHERE id_task = :id_task;");
    $query->execute([
        "id_task" => $_GET["id_task"]
    ]);
    $resultQuery1 = $query->fetchColumn(); 
    $descResult = ($resultQuery1+1);
    $ascResult = ($resultQuery1-1);
    var_dump($resultQuery1);
    var_dump($descResult);
    var_dump($ascResult);
//-------------------------------------- get the max priority
$queryMP = $dbCo->prepare("SELECT MAX(priority) AS max_prio FROM task WHERE id_users = 1;");
$queryMP->execute();
$MP = $queryMP->fetchColumn();
var_dump(isset($_GET['action']) , $_GET['action'] === "down" , isset($_GET["id_task"]) , $resultQuery1 < $MP, $resultQuery1, $MP);
        if (isset($_GET['action']) && $_GET['action'] === "down" && isset($_GET["id_task"]) && $resultQuery1 < $MP) {

            var_dump($_GET, 1);

            $degageDown = $dbCo->prepare("UPDATE task SET priority =:priority  WHERE priority = :newPriority AND done = 0;");
            $degageDown->execute([
                "priority" => $resultQuery1,
                "newPriority" => $descResult
            ]);

            $sameDown = $dbCo->prepare("UPDATE task SET priority = :priority WHERE id_task =  :id_task ;");
            $sameDown->execute([
                "id_task" => $_GET["id_task"],
                "priority" => $descResult
            ]);
            $action = "down";
        } elseif (isset($_GET['action']) && $_GET['action'] === "up" && isset($_GET["id_task"]) && $resultQuery1 > 1) {
            $queryMP = $dbCo->prepare("SELECT MAX(priority) AS max_prio FROM task WHERE id_users = 1;");
            $queryMP->execute();
            $MP = $queryMP->fetchColumn();

                 var_dump($_GET, 2);
            
                 $degageDown = $dbCo->prepare("UPDATE task SET priority =:priority  WHERE priority = :newPriority AND done = 0;");
                 $degageDown->execute([
                     "priority" => $resultQuery1,
                     "newPriority" => $ascResult
                 ]);
     
                 $sameDown = $dbCo->prepare("UPDATE task SET priority = :priority WHERE id_task =  :id_task ;");
                 $sameDown->execute([
                     "id_task" => $_GET["id_task"],
                     "priority" => $ascResult
                 ]);

                $action = "up";
         }

    header('Location: http://localhost/Todo-list-alben/');

    exit
?>

