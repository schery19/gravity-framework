<?php

namespace Gravity\Core\App\Controllers;

use Gravity\Core\Routing\Exceptions\RenderException;


class Controller {


	public function renderView(string $path, string $layout = null, array $params = null) {

		$path = str_replace('.', DIRECTORY_SEPARATOR, $path);

		if(!is_null($layout))
			$layout = str_replace('.', DIRECTORY_SEPARATOR, $layout);

		if(!file_exists(VIEWS.$path.'.php'))
			throw new RenderException("La vue '{$path}.php' introuvable !");
		if(!file_exists(VIEWS.$layout.'.php'))
			throw new RenderException("Mise en page '{$layout}.php' introuvable !");

		ob_start();

		if($params)
			extract($params);

		require VIEWS.$path.'.php';

		$content = ob_get_clean();

		!is_null($layout)?require VIEWS.$layout.'.php':require VIEWS.$path.'.php';

	}


	//Générer un lien directement à partir d'une vue
	public function generateUrl(string $url) {
		return $url;
	}


	//Exécuter dynamiquement une fonction avec ses éventuelles arguments
	public function invoke(string $methodName, $arguments = array()) {
		return !empty($arguments)?(new \ReflectionMethod($this, $methodName))->invokeArgs($this, $arguments):$this->$methodName();
	}

}

?>