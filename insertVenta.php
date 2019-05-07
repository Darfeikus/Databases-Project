<?php
require "database.php";
$id = null;
$message = null;
if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
if(!empty($_GET['message'])){
    $message = $_REQUEST['message'];
}

$productoError = null;
$modeloError = null;
$pantallaError = null;
$ramError = null;


if ( !empty($_POST)) {
    
    $producto = $_POST['producto'];
    $modelo = $_POST['modelo'];
    $pantalla = $_POST['pantalla'];
    $ram = $_POST['ram'];
    $id_P = $_POST['id'];
    
    /// validate input
    $valid = true;
    
    if (empty($producto)) {
        $productoError = 'Por favor selecciona un Producto';
        $valid = false;
    }
    
    if (empty($modelo)) {
        $modeloError = 'Por favor escribe el costo original';
        $valid = false;
    }
    
    if (empty($ram)) {
        $ramError = 'Por favor escribe costo neto';
        $valid = false;
    }

    
    // insert data
    if ($valid && $id_P != '') {
        var_dump($_POST);
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO `HistorialVentas`(`id_venta`, `id_producto`, `precioPrevio`, `porcentajeDescuento`, `precioNeto`) VALUES (?,?,?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($id_P,$producto,$modelo,$pantalla,$ram));
        Database::disconnect();
        header("Location: insertVenta.php?id=$id_P & message=Producto Agregado");
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta 	charset="utf-8">
<link   href=	"css/bootstrap.min.css" rel="stylesheet">
<script src=	"js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
<div class="span10 offset1">
<div class="row">
    <h3>Agregar productos a la venta</h3>
    <p><?php echo $message ?></p>
</div>

<form class="form-horizontal" action="insertVenta.php" method="post">

<div class ="control-group">
<input type = "hidden" name="id" id="id" type="text" value="<?php echo !empty($id) ? $id:$id_P;?>" readonly>
</div>

<div class="control-group <?php echo !empty($productoError)?'error':'';?>">
<label class="control-label">Producto</label>
<div class="controls">
<select name ="producto">
<option value="">Selecciona un producto</option>
<?php
$pdo = Database::connect();
$query = 'SELECT * FROM Productos';
foreach ($pdo->query($query) as $row) {
    if ($row['id']==$producto)
    echo "<option selected value='" . $row['id'] . "'>" . $row['descripcion'] . "</option>";
    else
    echo "<option value='" . $row['id'] . "'>" . $row['descripcion'] . "</option>";
}
Database::disconnect();
?>

</select>

<?php if (!empty($productoError)): ?>
<span class="help-inline"><?php echo $productoError;?></span>
<?php endif;?>
</div>
</div>

<div class="control-group <?php echo !empty($modeloError)?'error':'';?>">

<label class="control-label">Precio Previo</label>
<div class="controls">
<input name="modelo" id="modelo" type="text" placeholder="Precio Previo" value="<?php echo !empty($modelo)?$modelo:'';?>" onfocusout="change()">
<?php if (!empty($modeloError)): ?>
<span class="help-inline"><?php echo $modeloError;?></span>
<?php endif;?>
</div>
</div>

<div class="control-group <?php echo !empty($pantallaError)?'error':'';?>">

<label class="control-label">Porcentaje de descuento (solo numero)</label>
<div class="controls">
<input name="pantalla" id="pantalla" type="text" placeholder="descuento" value="<?php echo !empty($pantalla)?$pantalla:'';?>" onfocusout="change()">
<?php if (!empty($pantallaError)): ?>
<span class="help-inline"><?php echo $pantallaError;?></span>
<?php endif;?>
</div>
</div>

<div class="control-group <?php echo !empty($ramError)?'error':'';?>">

<label class="control-label">Precio Neto</label>
<div class="controls">
<input name="ram" id="ram" type="text" placeholder="costo" value="<?php echo !empty($ram)?$ram:'';?>"  readonly>
<?php if (!empty($ramError)): ?>
<span class="help-inline"><?php echo $ramError;?></span>
<?php endif;?>
</div>
</div>

<div class="form-actions">
<button type="submit" class="btn btn-success">Agregar</button>
<a class="btn" href="Ventas.php">Regresar</a>
</div>

</form>
</div>					
</div>


</body>
</html>
<script>

    function change(){
        if(document.getElementById("pantalla")!=null)
            document.getElementById("ram").value = parseInt(document.getElementById("modelo").value,10) - parseInt(document.getElementById("modelo").value,10)*(parseInt(document.getElementById("pantalla").value,10)*0.01);
        else
            document.getElementById("ram").value = parseInt(document.getElementById("modelo").value,10);
    }

</script>
