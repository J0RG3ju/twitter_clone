<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

Class AuthController extends Action {

    public function autenticar (){
        
        $usuario = Container::getModel('Usuario');

        $usuairo -> __set('email' , $_POST['email']);
        $usuairo -> __set('senha' , $_POST['senha']);  
        
        $usuario->autenticar();
    }
}