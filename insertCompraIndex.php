<?php
require "database.php";
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$last_id = '';
if(!empty($_POST))
{
    $proveedor =  $_POST["proveedor"];  
    $fecha =  $_POST["fecha"];
    $sql = "INSERT INTO `Compras`(`id`, `id_proveedor`, `fecha`) VALUES (null,?,?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($proveedor,$fecha));
    
    $last_id = $pdo->lastInsertId();
    
}
Database::disconnect();
header("Location: insertCompra.php?id=$last_id");
?>