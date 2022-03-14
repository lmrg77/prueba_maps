<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet">
</head>
<body>
    <?php require 'views/header.php'; ?> 

    <div id="main">
        <h1 class="center">Consultar Humedad</h1>
        <?php 
        if(isset($this->humedad[1]->latitud)){
            $latitud = $this->humedad[1]->latitud;
            $longitud = $this->humedad[1]->longitud;
            $contenido_volumetrico = $this->humedad[0]->contenido_volumetrico;
            $ciudad = $this->humedad[1]->ciudad;
        }
            $results_array = $this->ciudad;
            $tamano_array = count($results_array);
        ?>
        <form action="<?php echo constant('URL'); ?>main/consultar" method="post">
            <br/>
            <p class="center">
                <select name="ciudad" id="ciudad"> 
                    <?php for($i = 0; $i < $tamano_array; $i++){ ?>
                        <option value="<?php echo $results_array[$i]->id; ?>">
                            <?php echo $results_array[$i]->nombre; ?>
                        </option> 
                    <?php } ?>
                </select>
            </p>
            <p class="center">
                <input type="submit" value="Consultar">
            </p>
        </form>
        <?php 
        if(isset($this->humedad[1]->latitud)){
        ?>
            <input type="hidden" name="longitud" id="longitud" value="<?php echo $longitud;?>">
            <input type="hidden" name="latitud" id="latitud" value="<?php echo $latitud;?>">
            <h1 class="center"><?php echo "La humedad de la ciudad de ".$ciudad." es de ".$contenido_volumetrico; ?></h1>
            <div id="map"></div>
        <?php    
        }
        ?>
    </div>

    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>public/js/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=iniciarMap"></script>
    <script>
        let longitud = parseFloat(document.getElementById('longitud').value);
        let latitud = parseFloat(document.getElementById('latitud').value);
        iniciarMap(longitud, latitud);
    </script>
</body>
</html>