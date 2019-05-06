<?php
    require "database.php";
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($_POST['opc'] == '0')
        if(isset($_POST['clave_id'])){
            $clave =  $_POST["clave_id"]; 
            $sql = "SELECT * FROM `Proveedores` WHERE `clave` = '$clave'";
            $output='';
            foreach ($pdo->query($sql) as $row) {
                $output .= '<tr>  
                        <td width="30%"><label>Clave: </label></td>  
                        <td width="70%">'.$row["clave"].'</td>  
                    </tr>
                    <tr>  
                        <td width="30%"><label>Nombre: </label></td>  
                        <td width="70%">'.$row["nombre"].'</td>  
                    </tr>
                    <tr>  
                        <td width="30%"><label>Direccion: </label></td>  
                        <td width="70%">'.$row["direccion"].'</td>  
                    </tr>
                    <tr>  
                        <td width="30%"><label>Telefono: </label></td>  
                        <td width="70%">'.$row["telefono"].'</td>  
                    </tr>
                ';
                $output .= '</table></div>';
            }
            echo $output;
        }
        else
            echo "Not Found";
    else if ($_POST['opc']=='1')
    if(isset($_POST['clave_id'])){
        $clave =  $_POST["clave_id"]; 
        $sql = "SELECT * FROM `Proveedores` WHERE `telefono` = '$clave'";
        $output='';
        foreach ($pdo->query($sql) as $row) {
            $output .= '<tr>  
                    <td width="30%"><label>Clave: </label></td>  
                    <td width="70%">'.$row["clave"].'</td>  
                </tr>
                <tr>  
                    <td width="30%"><label>Nombre: </label></td>  
                    <td width="70%">'.$row["nombre"].'</td>  
                </tr>
                <tr>  
                    <td width="30%"><label>Direccion: </label></td>  
                    <td width="70%">'.$row["direccion"].'</td>  
                </tr>
                <tr>  
                    <td width="30%"><label>Telefono: </label></td>  
                    <td width="70%">'.$row["telefono"].'</td>  
                </tr>
            ';
            $output .= '</table></div>';
        }
        echo $output;
    }

    Database::disconnect();

?>
