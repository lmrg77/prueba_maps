<?php 

class Main extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->ciudad = [];
        $this->view->humedad = [];
    }

    function render(){
        $ciudad = $this->model->cargar_select();
        $this->view->ciudad = $ciudad;
        $this->view->render('main/index');
    }

    function consultar(){
        $ciudad = $_POST['ciudad'];
        $resultado = $this->model->consulta(['ciudad' => $ciudad]);
        $this->view->humedad = $resultado;
        $this->render();
    }
}

?>