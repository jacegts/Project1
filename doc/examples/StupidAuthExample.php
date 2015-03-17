<?php
	define('NON_ACTIVE', 0);
	define('ACTIVE', 1);
	
	class InMemoryAuth3 implements CommonAuthInterface
	{
		protected $status;
		
		public function __construct($username = '', $password = '')
		{
			
		}
		
		public function authenticate($username = '', $password = '')
		{
			
		}
		
		public function getStatus()
		{
			return $this->status;
		}
	}

	abstract class CommonAuth
	{
		protected $username;
		protected $password;
		protected $status;
		protected $lastLogin;
		
		abstract function authenticate($username, $password);
		
		public function getStatus()
		{
			return $this->status;
		}
		
		public function getLastLogin()
		{
			return $this->lastLogin;
		}
	}
	
	class InMemoryAuth extends CommonAuth
	{
		public function __construct($username = '', $password = '')
		{
			$this->username = $username;
			$this->password = $password;
		}
		
		public function authenticate($username = '', $password = '')
		{
			if ($username !== '') {
				$this->username = $username;
			}
			
			if ($password !== '') {
				$this->password = $password;
			}
			
			if ($this->username !== 'joe') {
				$this->status = NON_ACTIVE;
				return false;
			}
			
			if ($this->password !== '1234pass') {
				$this->status = NON_ACTIVE;
				return false;
			}
			
			$this->username = $username;
			
			$this->password = $password;
			
			$this->status = ACTIVE;
			
			$this->lastLogin = time();
			
			return true;
		}
	}
	
	class InMemoryAuth2 extends CommonAuth
	{
		public function __construct($username = '', $password = '')
		{
			$this->username = $username;
			$this->password = $password;
		}
		
		public function authenticate($username = '', $password = '')
		{
			if ($username !== '') {
				$this->username = $username;
			}
			
			if ($password !== '') {
				$this->password = $password;
			}
			
			if ($this->username !== 'steve') {
				$this->status = NON_ACTIVE;
				return false;
			}
			
			if ($this->password !== '1234pass') {
				$this->status = NON_ACTIVE;
				return false;
			}
			
			$this->username = $username;
			
			$this->password = $password;
			
			$this->status = ACTIVE;
			
			$this->lastLogin = time();
			
			return true;
		}
	}
	
	$directAuth = new InMemoryAuth();
	$directAuth2 = new InMemoryAuth2();
	$directAuth3 = new InMemoryAuth3();
	
	function output(CommonAuthInterface $auth)
	{
		if (!$auth->authenticate('joe', '1234pass')) {
			print('no one has permission'.PHP_EOL);
			return false;
		}
		
		print('welcome, joe'.PHP_EOL);
		return true;	
	}

//	output($directAuth);
//	output($directAuth2);
//	output($directAuth3);
	

	interface CommonAuthInterface
	{
		public function authenticate($username, $password);
		public function getStatus($username);
		public function getProfile($username);
	}
	
	class TextFileAuth implements CommonAuthInterface
	{
		public function authenticate($username, $password) {
			FILE* fh = fopen("auth.txt", "r");
			
			fgets($fileUsername, fh);
			fgets($filePassword, fh);
			
			fclose(fh);
			
			if($fileUsername !== $username || $filePassword !== $password) {
				return "NOT AUTHORIZED";
			}
			
			return "WELCOME";
		}
		public function getStatus($username) {
			
		}
		public function getProfile($username) {
			
		}
	}
	
	class TwitterAuth implements CommonAuthInterface
	{
		protected $DevToken = "1239041230948qpoweijf;lwekj109830291";
		protected $url = "https://api.twitter.com/blah";
		protected $curl;
		
		public function __construct(\CurlObject $newCurl)
		{
			// Initialize our connection with Twitter.
			$this->curl = $newCurl;
		}
		
		public function authenticate($username, $password)
		{
			
		}
		public function getStatus($username)
		{
			
		}
		public function getProfile($username)
		{
			
		}
	}
	
	function ProcessLoginForm(CommonAuthInterface $auth)
	{
		$auth->authenticate( $_POST['username'], $_POST['password']);
	}
	
	
	