<?php

namespace System;

use App\Config;
use App\Helpers\Database;

class BaseModel{

	protected $db ;

	public function __construct() {

		//initiate config
		$config = Config::get();

		//connect to PDO here.
		$this->db = Database::get($config);
	}
}