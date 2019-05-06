<?php
    require "database.php";
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($_POST['opc'] == '0')
        if(isset($_POST['clave_id'])){
            $clave =  $_POST["clave_id"]; 
            $sql = "SELECT * FROM `Productos` WHERE `clave` = '$clave'";
            ?>
            <tr>
            <th width="5%">Clave</th>
            <th width="20%">Descripcion</th>
            <th width="5%">Costo Promedio</th>
            <th width="5%">Costo Ultimo</th>
            <th width="30%">Ultima Compra</th>
            <th width="5%">Precio Promedio</th>
            <th width="5%">Precio Ultimo</th>
            <th width="30%">Ultima Venta</th>
            </tr>
            <?php
            foreach ($pdo->query($sql) as $row) {
                echo '<tr>'; 	
                echo '<td>'. $row['clave'] . '</td>';
                echo '<td>'. $row['descripcion'] . '</td>';
                echo '<td>'. $row['costoPromedio'] . '</td>';
                echo '<td>'. $row['costoUltimo'] . '</td>';
                echo '<td>'. $row['ultimaCompra'] . '</td>';
                echo '<td>'. $row['precioPromedio'] . '</td>';
                echo '<td>'. $row['precioUltimo'] . '</td>';
                echo '<td>'. $row['ultimaVenta'] . '</td>';
                ?>
                <?php
                echo '</tr>';
            }
        }
        else
            echo "Not Found";
    else if ($_POST['opc']=='2')
        if(isset($_POST['clave_id'])){
            $clave =  $_POST["clave_id"]; 
            $sql = "SELECT * FROM `Productos` WHERE `ultimaVenta` = '$clave'";
            ?>
            <tr>
            <th width="5%">Clave</th>
            <th width="20%">Descripcion</th>
            <th width="5%">Costo Promedio</th>
            <th width="5%">Costo Ultimo</th>
            <th width="30%">Ultima Compra</th>
            <th width="5%">Precio Promedio</th>
            <th width="5%">Precio Ultimo</th>
            <th width="30%">Ultima Venta</th>
            </tr>
            <?php
            foreach ($pdo->query($sql) as $row) {
                echo '<tr>'; 	
                echo '<td>'. $row['clave'] . '</td>';
                echo '<td>'. $row['descripcion'] . '</td>';
                echo '<td>'. $row['costoPromedio'] . '</td>';
                echo '<td>'. $row['costoUltimo'] . '</td>';
                echo '<td>'. $row['ultimaCompra'] . '</td>';
                echo '<td>'. $row['precioPromedio'] . '</td>';
                echo '<td>'. $row['precioUltimo'] . '</td>';
                echo '<td>'. $row['ultimaVenta'] . '</td>';
                ?>
                <?php
                echo '</tr>';
            }
        }
        else if ($_POST['opc']=='1')
        if(isset($_POST['clave_id'])){
            $clave =  $_POST["clave_id"]; 
            $sql = "SELECT * FROM `Productos` WHERE `ultimaCompra` = '$clave'";
            ?>
            <tr>
            <th width="5%">Clave</th>
            <th width="20%">Descripcion</th>
            <th width="5%">Costo Promedio</th>
            <th width="5%">Costo Ultimo</th>
            <th width="30%">Ultima Compra</th>
            <th width="5%">Precio Promedio</th>
            <th width="5%">Precio Ultimo</th>
            <th width="30%">Ultima Venta</th>
            </tr>
            <?php
            foreach ($pdo->query($sql) as $row) {
                echo '<tr>'; 	
                echo '<td>'. $row['clave'] . '</td>';
                echo '<td>'. $row['descripcion'] . '</td>';
                echo '<td>'. $row['costoPromedio'] . '</td>';
                echo '<td>'. $row['costoUltimo'] . '</td>';
                echo '<td>'. $row['ultimaCompra'] . '</td>';
                echo '<td>'. $row['precioPromedio'] . '</td>';
                echo '<td>'. $row['precioUltimo'] . '</td>';
                echo '<td>'. $row['ultimaVenta'] . '</td>';
                ?>
                <?php
                echo '</tr>';
            }
        }
    Database::disconnect();

?>
