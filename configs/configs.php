<?php

//A modifier selon la configuration des dossiers du projet
define('DS', DIRECTORY_SEPARATOR);//Séparateur de dossier selon l'OS
define('VIEWS', dirname(__DIR__). DS .'templates'.DS);//Les maquettes
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']).DS);//Le dossier public/
define('STYLES', SCRIPTS.'css'.DS);//Les fichiers css
define('JS', SCRIPTS.'js'.DS);//Les fichiers javascript
define('IMAGES', SCRIPTS.'images'.DS);//Les images

define('DEBUG', true); //En mode développement


//Vos propres constantes




?>
