<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 28.05.2016
 * Time: 23:01
 */

namespace cl;


class ManageTodo
{
    public $link;

    function __construct()
    {
        $dbConnection = new DbConnection();
        $this->link = $dbConnection->connect();

    }

    function createTodo($username, $title, $description, $dueDate, $createdOn, $label)
    {
        $sql = "INSERT INTO todo(username,title,description,due_date,created_date,label) VALUES (?,?,?,?,?,?)";
        $query = $this->link->prepare($sql);
        $values = [$username, $title, $description, $dueDate, $createdOn, $label];
        $query->execute($values);
        $counts = $query->rowCount();
        return $counts;
    }

    function listTodo($username, $label = null)
    {
        if (isset($label)) {
            $sql = "SELECT * FROM todo WHERE username = '$username' AND label ='$label' ORDER BY id DESC";
            $res = $this->link->query($sql);
        } else {
            $sql = "SELECT * FROM todo WHERE username = '$username' ORDER BY id DESC ";
            $res = $this->link->query($sql);
        }
        $counts = $res->rowCount();
        if ($counts >= 1) {
            $result = $res->fetchAll();
        } else {
            $result = $counts;
        }
        return $result;
    }

    function countTodo($username, $status)
    {
        $sql = "SELECT count(*) as total_Todo FROM todo. WHERE username = '$username' AND status = '$status'";
        $res = $this->link->query($sql);
        $res->setFetchMode(\PDO::FETCH_OBJ);
        $counts = $res->fetchAll();
        return $counts;
    }

    function editTodo($username, $id, $title, $description, $progress, $dueDate, $label)
    {
        $sql = "UPDATE todo SET title = '$title',description = '$description',progress = '$progress',due_date = '$dueDate',label = '$label' WHERE username = '$username' AND id = '$id'";
        $query = $this->link->query($sql);
        $counts = $query->rowCount();
        return $counts;
    }

    function deleteTodo($username, $id)
    {
        $sql = "DELETE FROM todo WHERE username = '$username' AND id = '$id' LIMIT 1";
        $res = $this->link->query($sql);
        return $res->rowCount();
    }

    function listIndTodo($param, $username)
    {
        foreach ($param as $key => $value) {
            $sql = "SELECT * FROM todo WHERE $key = '$value' AND username = '$username' LIMIT 1";
            $query = $this->link->query($sql);
        }
        $counts = $query->rowCount();
        if ($counts == 1) {
            $result = $query->fetchAll();
        } else {
            $result = $counts;
        }
        return $result;
    }
}