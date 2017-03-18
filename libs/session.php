<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 30.05.2016
 * Time: 23:08
 */
session_start();
if (isset($_SESSION['todoName'])) {
    $sessionName = $_SESSION['todoName'];
} else {
    header('Location:login.php');
}