<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 28.05.2016
 * Time: 14:47
 */
namespace cl;

class ManageUsers
{
    public $link;

    function __construct()
    {
        $dbConnection = new DbConnection();
        $this->link = $dbConnection->connect();

    }

    function registerUsers($username, $email, $password, $ipAddress, $time, $date)
    {
        $sql = "INSERT INTO users(username,email,password,ip_address,time,date)  VALUES (?,?,?,?,?,?)";
        $query = $this->link->prepare($sql);
        $values = array($username, $email, $password, $ipAddress, $time, $date);
        $query->execute($values);
        $counts = $query->rowCount();
        return $counts;
    }

    function loginUsers($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $res = $this->link->query($sql);
        return $res->rowCount();
    }

    function getUserInfo($username)
    {
        $sql = "SELECT * FROM users WHERE username='$username'";
        $res = $this->link->query($sql);
        $rowCount = $res->rowCount();
        if ($rowCount == 1) {
            return $res->fetchAll();
        } else {
            return $rowCount;
        }
    }

}
