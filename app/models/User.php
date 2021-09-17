<?php 

namespace App\Models;
use App\core\Db;
use App\core\Model;

/**
 * Class for Article
 */
class User extends Model
{

	public const TABLE = 'users';

	public $id;
	public $name;
	public $email;
	public $phone_number;


}
