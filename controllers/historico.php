<?php 

class Historico extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->historico = [];
    }

    function render(){
        $historico = $this->model->get();
        $this->view->historico = $historico;
        $this->view->render('historico/index');
    }
}

?>