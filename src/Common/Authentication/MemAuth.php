<?php
namespace Common\Authentication;
require 'IAuthentication.php';

//MemAuth interface implementation
class MemAuth implements IAuthentication
{
    protected $username;
    protected $password;
    protected $user=[];
    public function __construct($username, $password)
    {
//        $this->user[0]=$username;
//        $this->user[1]=$password;
        $this->username=$username;
        $this->password=$password;
//        echo $this->user[0];
//        echo $this->user[1];
    }
    public function authenticate()
    {
        if ($this->username !== 'memauth')
        {
            echo "Authentication failed.";
            return false;
        }
        if ($this->password !== '123456')
        {
            echo "Authentication failed";
            return false;
        }
        echo "Authentication success";
        return true;
    }
}