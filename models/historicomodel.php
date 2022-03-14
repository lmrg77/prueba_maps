<?php 

include_once 'models/logs.php';

class HistoricoModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function get(){
        $items = [];
        try{
            $query = $this->db->connect()->query('SELECT client_ip, ciudad_consultada, fecha FROM logs');
        
            while($row = $query->fetch()){
                $item = new Logs();
                $item->client_ip = $row['client_ip'];
                $item->ciudad_consultada = $row['ciudad_consultada'];
                $item->fecha = $row['fecha'];

                array_push($items, $item);
            }

            return $items;
        }catch(PDOException $e){
            return [];
        }
    }
}

?>