<?php
/**
 * File name: AuthController.php
 *
 * Project: Project1
 *
 * PHP version 5
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */

namespace Controllers;
//use Common\Authentication\IAuthentication;
use Common\Authentication\FileAuth;
use Common\Authentication\MemAuth;
use Common\Authentication\MySQLAuth;
use Common\Authentication\SQLiteAuth;
//use PostRequest;
/**
 * Class AuthController
 */
class AuthController extends Controller
{
    /**
     * Function execute
     *
     * @access public
     */

    //checks for the selected authentication type selected at login
    public function authTypeCheck($post)
    {
        if ($post->authType==='Mem')
        {
            return new MemAuth($post->username,$post->password);
        }
        if($post->authType==='File')
        {
            return new FileAuth($post->username,$post->password);
        }
        if ($authType==='MySQL')
        {
            return new MySQLAuth($post->username,$post->password);
        }
        if($authType==='SQLite')
        {
            return new SQLiteAuth($post->username,$post->password);
        }
    }   

    public function action()
    {
        $postData = $this->request->getPost();
        
        //$postRequest= new PostRequest($_POST);
        //echo 'Authenticate the above two different ways' . var_dump($postData);
        //echo $postData->username;
        //echo $postData->authType;
        
        if ($postData->authType==='Mem')
        {
            $Auth = new MemAuth($postData->username,$postData->password);
        }
        if($postData->authType==='File')
        {
            $Auth =  new FileAuth($postData->username,$postData->password);
        }
        
        if ($postData->authType==='MySQL')
        {
            $Auth = new MySQLAuth($postData->username,$postData->password);
        }
        if($postData->authType==='SQLite')
        {
            $Auth =  new SQLiteAuth($postData->username,$postData->password);
        }
        
        //authTypeCheck($postData)->authenticate();
        $Auth->authenticate();

        

        // example code: $auth = new Authentication($postData['username'], $postData['password']);
    }
}
