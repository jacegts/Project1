<?php
namespace Common\Authentication;
require 'IAuthentication.php';

//FileAuth interface implementation
class FileAuth implements IAuthentication
{
    protected $username;
    protected $password;
    
    public function __construct($username, $password)
    {
        $this->username=$username;
        $this->password=$password;
    }
    public function authenticate()
    {
        $myFile = fopen("..\src\Common\Authentication\user.txt","r")or die("Unable to open file!");

        if($this->username!==rtrim(fgets($myFile),"\r\n"))
        {
            echo "Authentication failed";
            return false;
        }
        if($this->password!==rtrim(fgets($myFile),"\r\n"))
        {
            echo "Authentication failed";
            return false;
        }
        echo "Authentication success";
        return true;
        fclose($myFile);
    }
    
}