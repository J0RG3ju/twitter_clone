<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {

	public function index() {

		$this->render('index');
	}

	public function inscreverse() {
		$this->view->usuario = array(
			'nome' => '',
			'email' => '',
			'senha' => '',
		);

		$this->view->erroCadastro = false;

		$this->render('inscreverse');
	}

	public function registrar() {				

		//Receber os dados do formulário
		$usuario = Container::getModel('Usuario');

		$usuario->__set('nome', $_POST['nome']);
		$usuario->__set('email', $_POST['email']);
		$usuario->__set('senah', $_POST['senha']);

		//Só sera salvo se o objeto estiver válido e não houver nenhum registro identico no banco
		if($usuario->validarCadastro() && count($usuario->getUsuarioPorEmail()) == 0){			
			$usuario->salvar();

			$this->render ('cadastro');
		} 
		
		else{
			$this->view->usuario = array(
				'nome' => $_POST['nome'],
				'email' => $_POST['email'],
				'senha' => $_POST['senha'],
			);

			$this->view->erroCadastro = true;

			$this->render('inscreverse');
		}
		//sucesso
	}

}


?>