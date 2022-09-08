<?php
$pageNumber=1;
$pageTitle = "My Todo List";
require_once "database/functions.php";
include 'include/header.php';
?>


    </div>
    <div>
        <ul class="task-list">
                <?php
                        foreach ($arrayTask as $task) {
                            echo "<li>"."<input type=checkbox>".$task["description"]."<input type=\"image\" class=\"image2\" src = \"img/optionButton.png\" alt=\"optionButton img\"><input class=\"redbutton\" type=\"image\" src = \"img/redbutton.png\" alt=\"delete_button img\">"."</li>";
                        }
                
                ?>
            </ul>       
        </div>
        <footer class="footer">
    
<a href="./add-page.php" target="_blank"> <input type="button" class="add-button" value="ADD TASK" > </a>
    </footer>
</body>
</html>