<?php
$pageNumber=3;
$pageTitle = "Modif Task";
require_once "database/functions.php";
include 'include/header.php';
?>


</div>
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