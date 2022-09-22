<?php

namespace App\Views;


use App\Views\Tasks;


class Index extends View
{
    protected static string $filename = 'App/Templates/Index.html';

    public function injectTask(array $tasks):void
    {
        $html = "";
        foreach ($tasks as $task) {
            $li = new Tasks($task);
            $html .= $li->getHtml();
        }
        $this->addData('taskList',$html);
    }
}
