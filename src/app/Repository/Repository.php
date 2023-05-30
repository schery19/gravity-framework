<?php

namespace Gravity\Core\App\Repository;


use Gravity\Core\Database\Database;



/**
 * Summary of Repository
 */
class Repository {

    protected static $entity;

	protected static $db;
    protected static $table;
    protected static $columns = array();


	protected static function getDatabase($configs = array()) {
		return static::$db = new Database(require("../config/database.php"));
	}



	
	/**
	 * Trouver tous les enregistrements
	 * @param array|null $columns Colonnes à récupérer
	 * @param string|null $orderClause Colonnes à ordonner
	 * @param string|null $orderArgs type d'ordonancement (ASC ou DESC)
	 * @param int|null $limit Nombre d'enregistrements à récupérer
	 * @param int|null $offset point de départ
	 * @return array
	*/
	public static function findAll(array $columns = null, string $orderClause = null, string $orderArgs = null, int $limit = null, int $offset = null) {

		$entities = array();

		$columns = (!\is_null($columns)) ? $columns : ['*'];

		$columnString = (\count($columns) > 1) ? \implode(',', $columns) : $columns[0];

		$orderString = (!\is_null($orderClause) && !\is_null($orderArgs)) ? "order by $orderClause $orderArgs" : "";

		$limitString = (!\is_null($limit)) ? "limit ".$limit : "";

		$offsetString = (!\is_null($offset)) ? "offset ".$offset : "";

		$req = self::getDatabase()->query("select $columnString from ". static::$table ." $orderString $limitString $offsetString", array(), \PDO::FETCH_ASSOC);

		foreach($req as $e) {
			array_push($entities, new static::$entity($e));
		}

		return $entities;

	}


	/**
	 * Trouver un enregistrement à partir d'un identifiant unique (l'id)
	 * @param mixed $id
	 * @return object
	*/
	public static function find($id) {

		$req = self::getDatabase()->query("select * from ". static::$table ." where id = ?", array($id), \PDO::FETCH_ASSOC);

		return new static::$entity($req[0]);
		
	}

	
 	/**
  	 * Trouver un/des enregistrement(s) à partir d'une/des condition(s)
  	 * @param array $whereColums colonnes sur lesquelles les conditions ont été posées
  	 * @param array $values valeurs colonnes conditionnées
  	 * @return array|object
  	*/
	public static function findWhere(array $whereColums, array $values) {

		$whereClause = (\count($whereColums) < 1)?'id=?':\implode('=? and ', $whereColums);

		$whereClause .= (\count($whereColums) < 1)?'':'=?';

		$req = self::getDatabase()->query("select * from ". static::$table ." where ". $whereClause, $values, \PDO::FETCH_ASSOC);
		
		var_dump($req);

		if(\count($req) > 1) {

			$entities = array();

			foreach($req as $e) {
				array_push($entities, new static::$entity($e));
			}

			return $entities;
		} else {
			return new static::$entity($req[0]);
		}
		
	}


}

?>