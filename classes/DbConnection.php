<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 28.05.2016
 * Time: 14:08
 */
namespace cl;
class DbConnection
{
    protected $dbConn;
    public $dbName = 'todo';
    public $dbUser = 'root';
    public $dbPassword = '21091992';
    public $dbHost = 'localhost';

    function connect()
    {
        try {
            $this->dbConn = new \PDO("mysql:dbname=$this->dbName;host=$this->dbHost", $this->dbUser, $this->dbPassword);
            return $this->dbConn;
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }
}