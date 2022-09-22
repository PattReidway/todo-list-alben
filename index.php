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

$query = $dbCo->prepare("SELECT * FROM task WHERE done = 0 ORDER BY priority ASC;");
        $query->execute();
        $arrayTask = $query->fetchAll();
?>


    </div>
    <div>
        <ul class="task-list">

       
            </ul>       
        </div>
        <footer class="footer">
            
            <a href="./add-page.php" target="_blank"> <input type="button" class="add-button" value="ADD TASK" > </a>
        </footer>
    </body>
    </html>
    <!-- foreach ($arrayTask as $task) {


    } -->