<?php 

namespace App\core;
use App\core\CustomException;
use App\core\Db;
use PDOException;


/**
 * 
 */
class Model extends Db
{
	public const TABLE = '';

	public static function findAll(): array
	{

		$db = new Db();
		
		$sql = 'SELECT * FROM ' . static::TABLE;

		return $db->query($sql, static::class);
	}

	public static function find(int $id): array
	{

		$db = new Db();
		
		$sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id ='. $id;

		return $db->query($sql, static::class);
	}

	public static function insert(array $params): bool
	{
		$db = new Db();

		$columns = [];
		$binds = [];
		$data = [];

		foreach ($params as $name => $value) {
			$columns[] = $name;
			$binds[] = ':' . $name;
			$data[':' . $name] = $value;
		}

		$sql = 'INSERT INTO ' . static::TABLE . ' 
		(' . implode(',', $columns) . ') 
		VALUES (' . implode(',', $binds) . ' )';

		return $db->execute($sql, $params);
	}

	public static function update(array $params): array
	{
		$db = new Db();

		$sql = 'UPDATE ' . static::TABLE . ' SET title = :title, description = :description, content = :content WHERE id = :id';

		return $db->query($sql, static::class, $params);
	}
	public static function save(array $params = []): bool
	{

		if (isset($params['id'])) {
			$result = self::update($params);
		}
		$result = self::insert($params);

		if ($result) {
			return true;
		}
		return false;

	}

	public static function delete(int $id) :bool 
	{
		$db = new Db();
		$sql = 'DELETE FROM '. static::TABLE. ' WHERE id ='.$id;
		
		if ($db->execute($sql)) {
			return true;
		}

		return false;
	}


}