<?php

namespace Gravity\Core\Database;

class Database {

	private $host;
	private $port;
	private $user;
	private $pass;
	private $dbName;
	private $db;


	public function __construct($configs = array())
	{
		if(isset($configs)) {
			$this->host = $configs['host'];
			$this->port = $configs['port'];
			$this->user = $configs['user'];
			$this->pass = $configs['pass'];
			$this->dbName = $configs['dbname'];
		}

		try {
			$this->db = new \PDO(
				"mysql:host=$this->host:$this->port;dbname=$this->dbName",
				$this->user,
				$this->pass,
				array(
					\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
					\PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING
				)
			);
		} catch (\PDOException $e) {
			die("<h1>Impossible de se connecter, cause ".$e->getMessage()."</h1>");
		}
	}


	public function query($sql, $params = array(), $out = PDO::FETCH_OBJ) {
		$req = $this->db->prepare($sql);
		$req->execute($params);
		return $req->fetchAll($out);
	}


	public function exec($sql, $params = array()) {
		$req = $this->db->prepare($sql);
		$req->execute($params);
	}

	//Utilisée uniquement pour le projet gestion de salle, juste pour une circonstance
	public function getDB() { return $this->db; }

}

?>