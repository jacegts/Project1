<?php

namespace Common\Authentication;

//creating an object from the $_POST variables 
class PostRequest
{
    private $username;
    private $password;
    private $authType;
    
    public function __construct($postArray)
    {
        postValidation($postArray);
        $this->username=clearHTML($postArray['username']);
        $this->password=clearHTML($postArray['password']);
        $this->authType=$postArray['authType'];        
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getAuthType()
    {
        return $this->authType;
    }
}