<?php

    namespace Controllers;


    class Controller{
        protected $view;
        protected $model;
        protected $generos;
        public function __construct($view, $model){
            $this->view = $view;
            $this->model = $model;

            $this -> generos = $this -> model -> getAllGeneros();
        }
    }