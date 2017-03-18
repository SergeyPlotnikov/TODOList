<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 31.05.2016
 * Time: 18:28
 */
include_once 'session.php';
$init = new \cl\ManageTodo();
if (isset($_GET['delete'])) {
    $id = strip_tags($_GET['delete']);
    $delete = $init->deleteTodo($sessionName, $id);
    if($delete ==1){
        header("Location:index.php");
    }
    else{
        $error = "Sorry there was an error";
    }
}