<?php

namespace App\Controllers;

use App\Models\Task;
use App\Views\TaskList;

class TaskController {

    public function index() {
        $task= new Task;
        $view = new TaskList([
            'taskList' => TaskList::getLiFromArray(array_map(fn($t)=>$t['description'], $task->getAll()))
        ]);
        $view->display();


    }

}