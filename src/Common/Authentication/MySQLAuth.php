<?php

namespace Common\Authentication;
require 'IAuthentication.php';
use PDO;

//MySQLAuth interface implementation
class MySQLAuth implements IAuthentication
{
    protected $username;
    protected $password;
    protected $conn;

    public function __construct($username, $password)
    {
        $this->username=$username;
        $this->password=$password;
        try
        {
            $this->conn = new PDO('mysql:host=localhost;dbname=test','root','1234');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo 'ERROR: ' .$e->getMessage();
        }
    }
    public function authenticate()
    {
        $data=$this->conn->query('SELECT UserName FROM USER WHERE BINARY UserName= '.$this->conn->quote($this->username).'AND BINARY Password = '.$this->conn->quote($this->password));
//        echo var_dump($data);
        $result=$data->fetchAll();
        if (count($result)!=1)
        {
          echo "Authentication failed";   
          return;
        }
        echo "Authentication success";
    }
    
}