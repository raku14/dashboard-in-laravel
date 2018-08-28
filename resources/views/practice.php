<?php

	interface Connection{
		function connect();

	}

	/**
	 * 
	 */
	interface User 
	{	
		
		function insert();

	}

	/**
	 * 
	 */
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

?>