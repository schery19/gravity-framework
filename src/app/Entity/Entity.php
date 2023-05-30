<?php

namespace Gravity\Core\App\Entity;


class Entity {

    protected $id;

	public function __construct($data = array()) {
		if(\count($data) > 0) 
			$this->hydrate($data);
		
	}

	public function hydrate(array $data) {
		foreach ($data as $k => $v) {
			$method = 'set'.ucfirst($k);

			if(method_exists($this, $method))
				$this->$method($v);
		}
	}
	

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @param mixed $id 
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}



}

?>