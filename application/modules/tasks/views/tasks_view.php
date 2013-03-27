<?php

define('TAG', 'tasks_view');


 Modules::run('log/to_apache', TAG, "tasks_view");
 
echo base_url();

echo anchor('tasks/create', '<p>Create New Tasks</p>');

foreach ($query->result() as $row) {
    $edit_url = base_url().'tasks/create/'.$row->id;
    echo "<h2>" . $row->title . " &nbsp; &nbsp;<a href='".$edit_url."'>EDIT</a></h2>";
}

?>
