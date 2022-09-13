<?php
$pageNumber=2;
$pageTitle = "ADD TASK";
require_once "database/functions.php";
include 'include/header.php';
if(isset($_POST)) {
    // $_POST["description"] = strip_tags($_POST["description"]);
    // $_POST["color"] = strip_tags($_POST["color"]);
    // $_POST["priority"] = strip_tags($_POST["priority"]);
    // $_POST["date_reminder"] = strip_tags($_POST["date_reminder"]);
    // if(strlen($_POST["description"] <= 255 && is_int($_POST["priority"]) && (strtotime($_POST["date_reminder"] === 1 || $_POST["date_reminder"] === ""))));
            $_POST['color']= str_replace('#','',$_POST['color'] );
            $query = $dbCo->prepare("INSERT INTO task (description,color,date_reminder,priority,id_users) 
        VALUES (:description , :color, :date_reminder, :priority, :id_user)");
        $query->execute([
            "description" => $_POST['taskDesc'],
            "color" => $_POST['color'],
            "date_reminder" => $_POST['date'],
            "priority" => $_POST['priority'],
            "id_user" => 1,
            
        ]);
    }
    // if(isset($_POST)) {
    //     $_POST["description"] = strip_tags($_POST["description"]);
    //     $_POST["priority"] = strip_tags($_POST["priority"]);
    //     $_POST["date_reminder"] = strip_tags($_POST["date_reminder"]);
    //     if(strlen($_POST["description"] <= 255 && is_int($_POST["priority"]) && (strtotime($_POST["date_reminder"] === 1 || $_POST["date_reminder"] === ""))))
    //     $query = $tdlCo->prepare("INSERT INTO task ( description, priority, date_reminder, id_user) 
    //     VALUES (:description, :priority, :date_reminder, :id_user)");
    //     $query->execute([
    //         "description" => $_POST["description"],
    //         "priority" => $_POST["priority"],
    //         "date_reminder" => $_POST["date_reminder"],
    //         "id_user" => 1
    //     ]);
?>
<div>
    <form action="" method="post" class="form-example">
        <div class="form-example">
            <textarea name="taskDesc" rows="5" cols="30" maxlength="255" minlength="1" placeholder="description tache."></textarea><br>
            <label for="date-select">Choose a date:</label>
            <input type="date" class="choose-date" name="date"><br>
            <label for="tpriority">Choose a priority:</label>
            <input type="number" class="num-choose" name="priority" min="1" max="5">
            <label for="theme-select">Choose a color:</label>
                <input type="color" class="palette" name="color">
        </div>
        <div class="submit-button">
            <input type="submit" value="Entrez!">
        </form>
         </div>
</div>


    </body>
    </html>