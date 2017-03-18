<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 30.05.2016
 * Time: 1:18
 */


if (isset($_POST['createTodo'])) {
    $init = new \cl\ManageTodo();
    $title = $_POST['title'];
    $description = $_POST['description'];
    $dueDate = $_POST['due_date'];
    $label = $_POST['label_under'];

    if (empty($title) || empty($dueDate) || empty($label)) {
        $error = "All fields are required accept the optional one";
    } else {
        $title = strip_tags($title);
        $description = strip_tags($description);
        $username = $sessionName;
        $createdOn = date("Y-m-d");

        $createTodo = $init->createTodo($username, $title, $description, $dueDate, $createdOn, $label);
        if ($createTodo == 1) {
            $success = "Todo created successfully";
        } else {
            $error = "There was an error";
        }
    }
}