<?php 

namespace App\core;

use app\traits\tSingleton;

/**
 * load config
 */
class DbConfig 
{
	use tSingleton;

	public $db;
	
	private function __construct()
	{
		$this->db = (require __DIR__ . "/../config/db.php");
	}

}