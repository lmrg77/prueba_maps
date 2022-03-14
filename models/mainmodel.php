<?php 

include_once 'models/ciudad.php';
include_once 'models/humedad.php';

class MainModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function consulta($datos){
        $humedad = [];

        try{
            $query = $this->db->connect()->prepare('SELECT HC.id_humedad, H.contenido_volumetrico, C.longitud, C.latitud, C.nombre FROM humedad_ciudad as HC, humedad AS H, ciudad AS C WHERE HC.id_ciudad = :ciudad AND HC.id_humedad = H.id AND HC.id_ciudad = C.id');
            $query->execute(['ciudad' => $datos['ciudad']]);
        
            while($row = $query->fetch()){
                $item1 = new Humedad();
                $item1->id = $row['id_humedad'];
                $item1->contenido_volumetrico = $row['contenido_volumetrico'];
                $item2 = new Ciudad();
                $item2->longitud = $row['longitud'];
                $item2->latitud = $row['latitud'];
                $item2->ciudad = $row['nombre'];

                array_push($humedad, $item1, $item2);
            }

            $ip = file_get_contents("https://api.ipify.org");
            $ciudad = $humedad[1]->ciudad;
            
            $query = $this->db->connect()->query("INSERT INTO logs (client_ip, ciudad_consultada) VALUES ('$ip','$ciudad')");

            return $humedad;
        }catch(PDOException $e){
            return [];
        }
        // consultar datos en la base de datos
        
        
    }

    public function cargar_select(){
        $items = [];
        try{
            $query = $this->db->connect()->query('SELECT c.id, c.nombre FROM ciudad as C ');
        
            while($row = $query->fetch()){
                $item = new Ciudad();
                $item->id = $row['id'];
                $item->nombre = $row['nombre'];

                array_push($items, $item);
            }

            return $items;
        }catch(PDOException $e){
            return [];
        }
    }
}

?>