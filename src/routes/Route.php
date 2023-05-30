<?php

namespace Gravity\Core\Routing;

use Gravity\Core\Routing\Exceptions\ControllerException;


class Route {

	private $path;
	private $action;
	private $matches;


	public function __construct($path, $action) {
		$this->path = trim($path, '/');
		$this->action = $action;
	}


	public function matches(string $url) {

		$path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);

		$pathToMatch = "#^$path$#";

		if(preg_match($pathToMatch, $url, $matches)) {
			$this->matches = $matches;
			return true;
		} else {
			return false;
		}
	}

	/*
	 * Cette fonction exécute la méthode appropriée du controlleur appelé.
	 * En cas de présence de paramètres dans l'url, elle appelle la
	 * méthode correspondante avec tous les arguments qu'il faut grace
	 * à la fonction invoke de la super classe Controller
	 */
	public function execute() {

		$params = null; //explode('@', $this->action);

		if(is_callable($this->action)) {
			$args = (new \ReflectionFunction($this->action))->getParameters();

			call_user_func_array($this->action, $args);
		} else {

			$params = explode('@', $this->action);

			try {

				$controller = new $params[0]();
				$method = $params[1];
				$methodArgs = (count($this->matches) > 1)?$this->getArguments($this->matches):null;//Les arguments présents dans l'url

				return $controller->invoke($method, $methodArgs);

			} catch(\Error $e) {//Controlleur ou méthode de controlleur introuvable
				throw new ControllerException($e);
			}
		}
	}


	private function getArguments(array $args) {

		$arguments = array();

		//L'élément d'indice 0 devrait correspondre à l'url tout entier
		for($i = 1; $i<count($args); $i++) {
			$arguments[] = $args[$i];
		}

		return $arguments;
	}
}

?>