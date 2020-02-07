<?php

namespace App;
use App\Helpers\Session;

class Config {
	
	public static function get(){

		//turn on output buffering
        
        ob_start();

        //turn on sessions
        Session::init();
		
		return [
		 //set the namespace for routing
		 'namespace' => 'App\Controllers\\',
		 
		 //set default controller
		 
		 'default_controller' => 'Admin',
		 //default method
		 
		 'default_method' => 'index',
		 
		 //database
		 
		//  'db_type' => 'mysql',
		//  'db_host' => 'localhost',
		//  'db_name' => 'moovelogic-api',
		//  'db_username' => 'root',
		//  'db_password' => '',
		 
		// 'db_type' => 'mysql',
		// 'db_host' => 'remotemysql',
		// 'db_name' => 'IaYRd99kq9',
		// 'db_username' => 'IaYRd99kq9',
		// 'db_password' => 'yyo542QNG3',
	
		
		];
	}
	
	
}