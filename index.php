<?php
spl_autoload_register();
use App\Controllers\TaskController;
$task = new TaskController;
$task->index();
exit;



$pageNumber=1;
$pageTitle = "My Todo List";
require_once "database/functions.php";
include 'include/header.php';

$query = $dbCo->prepare("SELECT * FROM task WHERE done = 0;");
        $query->execute();
        $arrayTask = $query->fetchAll();
?>


    </div>
    <div>
        <ul class="task-list">
                <?php
                        foreach ($arrayTask as $task) {
                            echo "<li class=\"lili\">"."<a href=\"database/action.php?action=done&id_task=".$task["id_task"]."\" ><img src=\"img/greenbutton.png\"class=\"greenbutton\" alt\"valid_button></a>"
                            ."<span class=task2>".$task["description"]."</span>".
                            "<a href=\"modifTask.php?action=edit&id_task=".$task["id_task"]."\"target=\"_blank\"><img src=\"img/optionbutton.png\" class=\"image2\" alt=\"optionButton</a>"
                           ."<input class=\"redbutton\" type=\"image\" src = \"img/redbutton.png\" alt=\"delete_button img\">"."</li>";
                        }
                
                ?>
            </ul>       
        </div>
        <footer class="footer">
    
<a href="./add-page.php" target="_blank"> <input type="button" class="add-button" value="ADD TASK" > </a>
    </footer>
</body>
</html>