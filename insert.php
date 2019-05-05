<?php
    require "database.php";
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(!empty($_POST))
    {
        $name =  $_POST["name"];  
        $address =  $_POST["address"];
        $clave =  $_POST["clave"];  
        $telefono =  $_POST["phone"];  
        $sql = "INSERT INTO `Clientes`(`id`, `clave`, `nombre`, `direccion`, `telefono`) VALUES (null,?,?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($clave,$name,$address,$telefono));
    }
    Database::disconnect();
?>
