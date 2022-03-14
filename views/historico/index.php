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
        <h1 class="center">Historico</h1>
        <?php 
            $results_array = $this->historico;
            $tamano_array = count($results_array);
        ?>
        <table>
            <tr>
                <th>Client IP</th>
                <th>Ciudad Consultada</th>
                <th>Fecha</th>
            </tr>
            <?php for($i = 0; $i < $tamano_array; $i++){?>
            <tr>
                <?php for($j = 0; $j < 1; $j++){?>
                    <td><?php echo $results_array[$i]->client_ip; ?></td>
                    <td><?php echo $results_array[$i]->ciudad_consultada; ?></td>
                    <td><?php echo $results_array[$i]->fecha; ?></td>
                <?php } ?>
            </tr>
            <?php } ?>
        </table>
    </div>

    <?php require 'views/footer.php'; ?>
</body>
</html>