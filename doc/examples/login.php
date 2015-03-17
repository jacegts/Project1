<?php
	class PostRequest
	{
		private $username;
		private $password;
		
		public function __construct($postArray)
		{
			if(!isset($postArray['username'])) {
				throw new InvalidArgumentException(__METHOD__.'('.__LINE__.'): ERROR: no username dependency');
			}
			
			if(!isset($postArray['password'])) {
				throw new InvalidArgumentException(__METHOD__.'('.__LINE__.'): ERROR: no password dependency');
			}
			
			// Validate data type
			// Validate password requirements
			// Check html entities
			// Check html special entities
			$this->username = $postArray['username'];
			$this->password = $postArray['password'];
		}
		
		public function getUsername()
		{
			return $this->username;
		}
		
		public function getPassword()
		{
			return $this->password;
		}
		
		public function getFunkyCredentials()
		{
			return $this->username.':'.$this->password;
		}
	}

	$postRequest = new PostRequest($_POST);

	echo '<strong>'.__FILE__.'</strong><hr/>';
	
	echo 'original $_POST ^^'.var_dump($_POST);
	echo '$_GET  ^^'.var_dump($_GET);
	
	$_POST['username'] = 'kilroy';
	
	echo 'modified $_POST ^^'.var_dump($_POST);
	
	echo 'PostRequest: '.$postRequest->getFunkyCredentials();