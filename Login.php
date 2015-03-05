<?php

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

//common auth interface
interface CommonAuthInterface
{
    public function __construct($post);
    public function authenticate();
}

//FileAuth interface implementation
class FileAuth implements CommonAuthInterface
{
    protected $username;
    protected $password;
    
    public function __construct($post)
    {
        $this->username=$post->getUsername();
        $this->password=$post->getPassword();
    }
    public function authenticate()
    {
        $myFile = fopen("user.txt","r")or die("Unable to open file!");
/*        $user=rtrim(fgets($myFile),"\r\n");
        $pass=rtrim(fgets($myFile),"\r\n");
        echo $user;
        echo $this->username;
        echo $pass;
        echo $this->password;*/
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

//MemAuth interface implementation
class MemAuth implements commonAuthInterface
{
    protected $username;
    protected $password;
    
    public function __construct($post)
    {
        $this->username=$post->getUsername();
        $this->password=$post->getPassword();
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

//used in PostRequest constructor to validate post variables before creating object 
function postValidation($postArray)
{
    if (!isset($postArray['username']))
    {
        throw new InvalidArgumentException(__METHOD__.'('.__LINE__.')Error; no username dependency');
    }
    if (!isset($postArray['password']))
    {
        throw new InvalidArgumentException(__METHOD__.'('.__LINE__.')Error; no password dependency');
    }
    if (!isset($postArray['authType']))
    {
        throw new InvalidArgumentException(__METHOD__.'('.__LINE__.')Error; no authType dependency');
    }
    //validate dataType
}

//used when assigning PostRequest values to clear any special/html chars and entities
function clearHTML($html)
{
    return preg_replace('/[^a-zA-Z0-9\s]/', '', strip_tags(html_entity_decode($html)));
}

//checks for the selected authentication type selected at login
function authTypeCheck($post)
{
    if ($post->getAuthType()==='Mem')
    {
        return new MemAuth($post);
    }
    if($post->getAuthType()==='File')
    {
        return new FileAuth($post);
    }
}   

//check username and password for correct format
function formatCheck($postRequest)
{
    $regex='^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$^';
    if(preg_match($regex,$postRequest->getUsername())!=1)
    {
        echo "Invalid username format please try again";
        return false;
    }
    if(preg_match($regex,$postRequest->getPassword())!=1)
    {
        echo "Invalid password format please try again";
        return false;
    }
    return true;
}
//echo $_POST['username'];
//echo $_POST['password'];
//echo $_POST['authType'];
$postRequest= new PostRequest($_POST);
//if(formatCheck($postRequest))

authTypeCheck($postRequest)->authenticate();
