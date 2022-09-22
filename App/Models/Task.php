<?php

namespace App\Models;

class Task extends Model {
    public function getAll(){
        $query = self::$connection->query("SELECT id_task, description, color, priority, date_reminder, done, id_Users FROM task ORDER BY priority;");
        return $query->fetchAll();
    }
}

// return implode('',array_map(fn($d)=>"<li>.$d</li>",$data));

