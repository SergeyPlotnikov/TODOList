<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 31.05.2016
 * Time: 0:20
 */
include_once 'session.php';

$list = new \cl\ManageTodo();
if (isset($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    $listTodo = $list->listIndTodo(array('id' => $id), $sessionName);
} else {
    if (isset($_GET['label'])) {
        $label = strip_tags($_GET['label']);
        $listTodo = $list->listTodo($sessionName, $label);
    } else {
        $listTodo = $list->listTodo($sessionName);
    }
}