<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 31.05.2016
 * Time: 19:00
 */

if (isset($_POST['editTodo'])) {
    $init = new \cl\ManageTodo();
    $username = $sessionName;
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $dueDate = $_POST['due_date'];
    $label = $_POST['label_under'];
    $progress = $_POST['progressValue'];
    $edit = $init->editTodo($username, $id, $title, $description, $progress, $dueDate, $label);
    if ($edit == 1) {
        header("Location:edit.php?id={$id}");
    } else {
        $error = 'There was an error';
    }
}