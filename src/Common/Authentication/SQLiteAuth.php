<?php

namespace Common\Authentication;
require 'IAuthentication.php';
use PDO;

class SQLiteAuth implements IAuthentication
{
    public function __construct($username, $password)
    {        
        $this->username=$username;
        $this->password=$password;
        try
        {
            $this->conn = new PDO('sqlite:../src/Common/Authentication/SQLitetest.sqlite');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo 'ERROR: ' .$e->getMessage();
        }
    }
    public function authenticate()
    {
        $data=$this->conn->query('SELECT Username FROM Test WHERE UserName= '.$this->conn->quote($this->username).'AND Password = '.$this->conn->quote($this->password));
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