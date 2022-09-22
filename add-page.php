<?php
$pageNumber=2;
$pageTitle = "ADD TASK";
require_once "database/functions.php";
include 'include/header.php';
if(isset($_POST)&& isset($_POST["taskDesc"])) {
    $_POST["taskDesc"] = strip_tags($_POST["taskDesc"]);
    $_POST["priority"] = strip_tags($_POST["priority"]);
    $_POST["date"] = strip_tags($_POST["date"]);
    if(strlen($_POST["taskDesc"]) <= 255){
            $_POST['color']= str_replace('#','',$_POST['color'] );
            $query = $dbCo->prepare("INSERT INTO task (description,color,date_reminder,priority,id_users) 
        VALUES (:description , :color, :date_reminder, :priority, :id_user)");
        $query->execute([
            "description" => $_POST['taskDesc'],
            "color" => $_POST['color'],
            "date_reminder" => $_POST['date'],
            "priority" => $_POST['priority'],
            "id_user" => 1,
            
        ]);}
    }
 
?>
<div>
    <form action="" method="post" class="form-example">
        <div class="form-example">
            <textarea name="taskDesc" rows="5" cols="30" maxlength="255" minlength="1" placeholder="description tache."></textarea><br>
            <label for="date-select">Choose a date:</label>
            <input type="date" class="choose-date" name="date"><br>
            <label for="tpriority">Choose a priority:</label>
            <input type="number" class="num-choose" name="priority" min="1" max="99">
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