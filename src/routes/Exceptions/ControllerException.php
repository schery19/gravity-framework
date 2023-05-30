<?php

namespace Gravity\Core\Routing\Exceptions;


class ControllerException extends \Exception {

	protected $message;

	public function __construct(string $message) {

		parent::__construct($message);

		$this->message = $message;

		$type = explode(' ', $message);

		switch ($type[0]) {
			//Comme message "Class '.....' not found"
			case 'Class':
				//$this->message = "Le controlleur $type[1] est introuvable";
				break;
			//Comme message "Call to undefined method '.....' not found"
			case 'Call':
				//$this->message = "La méthode $type[4] n'existe pas dans le controlleur spécifié";
			default:
				
				break;
		}
	}

	
}

?>