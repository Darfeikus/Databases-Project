<?php
    require "database.php";
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(!empty($_POST))
    {
        $clave = $_POST['clave'];
        $name = $_POST['name'];
        $costoProm = $_POST['costoProm'];
        $costoUltim = $_POST['costoUltim'];
        $fechaCompra = $_POST['fechaCompra'];
        $precioProm = $_POST['precioProm'];
        $precioUltim = $_POST['precioUltim'];
        $fechaVenta = $_POST['fechaVenta'];

        $sql = "INSERT INTO `Productos`(`id`, `clave`, `descripcion`, `costoPromedio`, `costoUltimo`, `ultimaCompra`, `precioPromedio`, `precioUltimo`, `ultimaVenta`) VALUES (null,?,?,?,?,?,?,?,?)";
        
        $q = $pdo->prepare($sql);
        $q->execute(array($clave,$name,$costoProm,$costoUltim,$fechaCompra,$precioProm,$precioUltim,$fechaVenta));
    }
    Database::disconnect();
?>
