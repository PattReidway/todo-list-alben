<?php
$pageNumber=1;
$pageTitle = "My Todo List";
require_once "database/functions.php";
include 'include/header.php';

$query = $dbCo->prepare("SELECT * FROM task WHERE done = 0 ORDER BY priority ASC;");
        $query->execute();
        $arrayTask = $query->fetchAll();
?>


    </div>
    <div>
        <ul class="task-list">
                <?php
                        foreach ($arrayTask as $task) {

                            echo "<li class=\"lili\">
                            <a href=\"database/action.php?action=down&id_task=".$task["id_task"]."\"><img src=\"img/down.png\"class=\"downbutton\" alt\"down_button></a>"
                            ."<a href=\"database/action.php?action=up&id_task=".$task["id_task"]."\"><img src=\"img/up.png\"class=\"upbutton\" alt\"up_button></a>"
                            ."<a href=\"database/action.php?action=done&id_task=".$task["id_task"]."\" >
                            <img src=\"img/greenbutton.png\"class=\"greenbutton\" alt\"valid_button></a>".$task["priority"].$task["description"]."
                            <input type=\"image\" class=\"image2\" src = \"img/optionButton.png\" alt=\"optionButton img\">
                            <input class=\"redbutton\" type=\"image\" src = \"img/redbutton.png\" alt=\"delete_button img\">"."</li>";

                        }
                ?>
            </ul>       
        </div>
        <footer class="footer">
    
<a href="./add-page.php" target="_blank"> <input type="button" class="add-button" value="ADD TASK" > </a>
    </footer>
</body>
</html>