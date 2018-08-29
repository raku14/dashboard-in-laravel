<?php

	/**
	interface Connection{
		function connect();

	}

	 
	interface User 
	{	
		
		function insert();

	}

	
	class Student implements Connection, User
	{
		function connect(){echo 'connect';}
		function insert(){ echo 'insert';}
		function std(){
			echo 'student';
		}

	}

	$user = new Student;
	$user->connect();
	$user->insert();
	$user->std();
* 
	 */

class User{
	public $name = 'sachin';
	protected $salary = 1000;
	private $mail = 'sacrawat22@gmail.com';

	public function salary(){
		echo $this->salary1();
	}
	protected function salary1(){
		echo $this->mail;
	}
	
}

$user = new User();
$user-> salary();

class AB extends User{

	function a(){
		echo $this->name;
		echo $this->salary;

		//$this->salary1();
		//$this->salary2();
	}
}

//$ab = new AB();
//$ab->a();

?>