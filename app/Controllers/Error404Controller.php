<?php

namespace App\Controllers;

use Core\MainController;

header("HTTP/1.0 404 Not Found");

/**
 * Controller para requisições 404 - Page Not Found
 */
class Error404Controller extends MainController
{
	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Apresenta automaticamente a página 404 quando instanciada
	 *
	 * @access public
	 * @return view error404
	 */
	public function __construct()
	{
		$model = $this->model('Error404');

		return $this->view($this->getTemplate(), $model->getData());
	}

	/**
	 * Index padrão de um controller
	 *
	 * @access public
	 * @return none
	 */
	public function indexAction()
	{
		//
	}
}