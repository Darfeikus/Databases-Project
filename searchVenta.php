<?php
    require "database.php";
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($_POST['opc'] == '0'){
        if(isset($_POST['clave_id'])){
            $clave =  $_POST["clave_id"]; 
            $sql = "SELECT p.nombre,prs.fecha from Clientes p, Ventas prs where prs.id_cliente = p.id AND p.id = '$clave' order by prs.fecha";
            $output='';
            foreach ($pdo->query($sql) as $row) {
                echo '<tr>'; 	
                echo '<td width = "20%"><label>Cliente: </label></td>';
                echo '<td width = "20%">'. $row['nombre'] . '</td>';
                echo '<td width = "20%"><label>Fecha: </label></td>';
                echo '<td width = "20%">'. $row['fecha'] . '</td>';
                ?>
                <?php
                echo '</tr>';
            }
            $sql = "SELECT pr.descripcion,h.precioPrevio,h.porcentajeDescuento,h.precioNeto,prs.fecha from Clientes p, Ventas prs, HistorialVentas h, Productos pr where prs.id_cliente = p.id AND p.id = '$clave' AND h.id_venta=prs.id order by prs.fecha";
            $output='';
            foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td width = "10%"><label>Producto: </label></td>';
                echo '<td width = "10%"><label>Precio Previo: </label></td>';
                echo '<td width = "10%"><label>Porcentaje Descuento: </label></td>';
                echo '<td width = "10%"><label>Precio Neto: </label></td>';
                echo '<td width = "30%"><label>Fecha: </label></td>';
                echo '</tr>';
                echo '<br><br>';
                echo '<tr>';
                echo '<td width = "10%">'. $row['descripcion'] . '</td>';
                echo '<td width = "10%">'. $row['precioPrevio'] . '</td>';
                echo '<td width = "10%">'. $row['porcentajeDescuento'] . '</td>';
                echo '<td width = "10%">'. $row['precioNeto'] . '</td>';
                echo '<td width = "30%">'. $row['fecha'] . '</td>';
                ?>
                <?php
                echo '</tr>';
            }
        }
        else{
            echo "Not Found";
        }
    }
    else if ($_POST['opc']=='1'){
        if(isset($_POST['clave_id'])){
            $clave =  $_POST["clave_id"]; 
            $sql = "SELECT p.nombre,prs.fecha from Clientes p, Ventas prs where prs.id_cliente = p.id AND prs.fecha = '$clave' order by prs.fecha";
            $output='';
            foreach ($pdo->query($sql) as $row) {
                echo '<tr>'; 	
                echo '<td width = "20%"><label>Cliente: </label></td>';
                echo '<td width = "20%">'. $row['nombre'] . '</td>';
                echo '<td width = "20%"><label>Fecha: </label></td>';
                echo '<td width = "20%">'. $row['fecha'] . '</td>';
                ?>
                <?php
                echo '</tr>';
            }
            $sql = "SELECT pr.descripcion,h.precioPrevio,h.porcentajeDescuento,h.precioNeto,prs.fecha from Clientes p, Ventas prs, HistorialVentas h, Productos pr where prs.id_cliente = p.id AND prs.fecha = '$clave' AND h.id_venta=prs.id order by prs.fecha";
            $output='';
            foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td width = "10%"><label>Producto: </label></td>';
                echo '<td width = "10%"><label>Precio Previo: </label></td>';
                echo '<td width = "10%"><label>Porcentaje Descuento: </label></td>';
                echo '<td width = "10%"><label>Precio Neto: </label></td>';
                echo '<td width = "30%"><label>Fecha: </label></td>';
                echo '</tr>';
                echo '<br><br>';
                echo '<tr>';
                echo '<td width = "10%">'. $row['descripcion'] . '</td>';
                echo '<td width = "10%">'. $row['precioPrevio'] . '</td>';
                echo '<td width = "10%">'. $row['porcentajeDescuento'] . '</td>';
                echo '<td width = "10%">'. $row['precioNeto'] . '</td>';
                echo '<td width = "30%">'. $row['fecha'] . '</td>';
                ?>
                <?php
                echo '</tr>';
            }
        }
        else{
            echo "Not Found";
        }
    }

    Database::disconnect();

?>
