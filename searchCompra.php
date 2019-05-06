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
        }
        else{
            echo "Not Found";
        }
    }

    Database::disconnect();

?>
