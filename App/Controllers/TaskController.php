<?php

namespace App\Controllers;

use App\Models\Task;
use App\Views\Index;
use App\Views\Tasks;

class TaskController {

    public function index()
    {
        $task = new Task;
        $view = new Index([
            'title' => 'Liste des taches',
            'headertitle' => 'Taches'

        ]);
        $view->injectTask($task->getAll());
        $view->display();
    }
}