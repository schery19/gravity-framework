<?php

namespace Gravity\Core\App\Controllers;

use Gravity\Core\App\Repository\BookRepository;
use Gravity\Core\App\Repository\AuthorRepository;
use Gravity\Core\App\Repository\CategoryRepository;


class HomeController extends Controller {

	public function index() {

		$name = "Schneider Chéry";

		return $this->renderView('Home.home', 'layout', ['name'=>$name]);
	}
}

?>