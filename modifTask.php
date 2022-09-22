<?php
session_start();
if(isset($_SERVER['HTTP_REFERER']) <> "http://localhost/Todo-list-alben/"){
    echo "DEGAGE TA MERE";
    exit;
}
$pageNumber=3;
$pageTitle = "Modif Task";
require_once "database/functions.php";
include 'include/header.php';

if (isset($_GET["id_task"]) && isset($_POST["priority"])) {
    if($_POST['token']<>$_SESSION['securityToken']){
        var_dump($_POST['token']);
        echo "ALERTE MECHANT ALERTE MECHANT!!!!!!!";
    }
    $_POST['color'] = str_replace('#', '', $_POST['color']);

    $query = $dbCo->prepare("UPDATE task SET description = :description, priority =:priority, color =:color WHERE id_task = :id_task;");
    $query->execute([
        "id_task" => $_GET["id_task"],
        "description" => $_POST["taskDesc"],
        "priority" => $_POST["priority"],
        "color" => $_POST["color"]
    ]);
} 
else {
    $_SESSION['securityToken'] = md5(uniqid(mt_rand(), true));
}
    $query = $dbCo->prepare("SELECT description ,priority ,color ,date_reminder FROM task WHERE id_task =:id_task");
    $query->execute([
        "id_task"=> $_GET["id_task"]
    ]);
    $result = $query->fetch();
    $result["color"] = "#".$result["color"];


?>


</div>
    <div>
        <form action="" method="post" class="form-example">
            <div class="form-example">
            <label for="description">Definir une tache:</label>
                <textarea name="taskDesc" rows="5" cols="30" maxlength="255" minlength="1" name="description" placeholder="description tache."><?=$result["description"];?></textarea><br>
                <label for="date-select">Choose a date:</label>
                <input type="date" class="choose-date" name="date" value= <?=$result["date_reminder"];?>><br>
                <label for="tpriority">Choose a priority:</label>
                <input type="number" class="num-choose" name="priority" min="1" max="99" value= <?=$result["priority"];?>>
                <label for="theme-select">Choose a color:</label>
                <input type="color" class="palette" name="color" value= <?=$result["color"];?>>
                <input type="hidden" name="token"value="<?=$_SESSION['securityToken']?>">
            </div>
            <div class="submit-button">
                <input type="submit" value="Entrez!">
            </form>
            </div>

<?php

    

?>

