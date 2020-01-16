<?php

namespace App;

class Config {
	
	public static function get(){
		
		return [
		 //set the namespace for routing
		 'namespace' => 'App\Controllers\\',
		 
		 //set default controller
		 
		 'default_controller' => 'Home',
		 //default method
		 
		 'default_method' => 'index',
		 
		 //database
		 
		 'db_type' => 'mysql',
		 'db_host' => 'localhost',
		 'db_name' => 'moovelogic-admin',
		 'db_username' => 'root',
		 'db_password' => '',
		 
		
		
		];
	}
	
	
}