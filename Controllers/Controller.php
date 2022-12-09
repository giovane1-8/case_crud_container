<?php

namespace Controllers;


class Controller
{
    protected $view;
    protected $model;
    /*
         * metodo para não deixar o usuario root sair da pagina ADM PARA NÃO DAR ERRO 
        */
    public function __construct($view, $model)
    {
        $this->view = $view;
        $this->model = $model;
    }
}
