<?php
    require "database.php";
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($_POST['opc'] == '0'){
        if(isset($_POST['clave_id'])){
            $clave =  $_POST["clave_id"]; 
            $sql = "SELECT p.nombre,prs.fecha from Proveedores p, Compras prs where prs.id_proveedor = p.id AND p.id = '$clave' order by prs.fecha";
            $output='';
            foreach ($pdo->query($sql) as $row) {
                echo '<tr>'; 	
                echo '<td width = "20%"><label>Proveedor: </label></td>';
                echo '<td width = "20%">'. $row['nombre'] . '</td>';
                echo '<td width = "20%"><label>Fecha: </label></td>';
                echo '<td width = "20%">'. $row['fecha'] . '</td>';
                ?>
                <?php
                echo '</tr>';
            }
            $sql = "SELECT pr.descripcion,h.costoPrevio,h.porcentajeDescuento,h.costoNeto,prs.fecha from Proveedores p, Compras prs, HistorialCompras h, Productos pr where prs.id_proveedor = p.id AND p.id = '$clave' AND h.id_compra=prs.id order by prs.fecha";
            $output='';
            foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td width = "10%"><label>Producto: </label></td>';
                echo '<td width = "10%"><label>Costo Previo: </label></td>';
                echo '<td width = "10%"><label>Porcentaje Descuento: </label></td>';
                echo '<td width = "10%"><label>Costo Neto: </label></td>';
                echo '<td width = "30%"><label>Fecha: </label></td>';
                echo '</tr>';
                echo '<br><br>';
                echo '<tr>';
                echo '<td width = "10%">'. $row['descripcion'] . '</td>';
                echo '<td width = "10%">'. $row['costoPrevio'] . '</td>';
                echo '<td width = "10%">'. $row['porcentajeDescuento'] . '</td>';
                echo '<td width = "10%">'. $row['costoNeto'] . '</td>';
                echo '<td width = "30%">'. $row['fecha'] . '</td>';
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
            $sql = "SELECT p.nombre,prs.fecha from Proveedores p, Compras prs where prs.id_proveedor = p.id AND prs.fecha = '$clave' order by prs.fecha";
            $output='';
            foreach ($pdo->query($sql) as $row) {
                echo '<tr>'; 	
                echo '<td width = "20%"><label>Proveedor: </label></td>';
                echo '<td width = "20%">'. $row['nombre'] . '</td>';
                echo '<td width = "20%"><label>Fecha: </label></td>';
                echo '<td width = "20%">'. $row['fecha'] . '</td>';
                ?>
                <?php
                echo '</tr>';
            }
            $sql = "SELECT pr.descripcion,h.costoPrevio,h.porcentajeDescuento,h.costoNeto,prs.fecha from Proveedores p, Compras prs, HistorialCompras h, Productos pr where prs.id_proveedor = p.id AND prs.fecha = '$clave' AND h.id_compra=prs.id order by prs.fecha";
            $output='';
            foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td width = "10%"><label>Producto: </label></td>';
                echo '<td width = "10%"><label>Costo Previo: </label></td>';
                echo '<td width = "10%"><label>Porcentaje Descuento: </label></td>';
                echo '<td width = "10%"><label>Costo Neto: </label></td>';
                echo '<td width = "30%"><label>Fecha: </label></td>';
                echo '</tr>';
                echo '<br><br>';
                echo '<tr>';
                echo '<td width = "10%">'. $row['descripcion'] . '</td>';
                echo '<td width = "10%">'. $row['costoPrevio'] . '</td>';
                echo '<td width = "10%">'. $row['porcentajeDescuento'] . '</td>';
                echo '<td width = "10%">'. $row['costoNeto'] . '</td>';
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
