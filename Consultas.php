<?php  

require "database.php";
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$id = null;
$output = null;
if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

$clienteError = null;


if ( !empty($_POST)) {
    
    $button = $_POST['button_form'];
    $cliente = $_POST['cliente'];
    $producto = $_POST['producto'];
    $proveedor = $_POST['proveedor'];
    $fechaIni = $_POST['fecha_i'];
    $fechaFin = $_POST['fecha_f'];
    /// validate input
    $valid = true;
    
    if (empty($cliente)) {
        $clienteError = 'Por favor selecciona un cliente';
        $valid=false;
    }
    if (empty($producto)) {
        $productoError = 'Por favor selecciona una producto';
        $valid=false;
    }
    if (empty($proveedor)) {
        $proveedorError = 'Por favor selecciona una proveedor';
        $valid=false;
    }
    // insert data
    if ($valid) {
        switch($button){
            case "0" :
                $sql = "SELECT ifnull(pt,0) - ifnull(ct,0) rs from (select sum(precioNeto) pt from Ventas v, HistorialVentas hv where hv.id_venta = v.id and v.fecha > '$fechaIni' and v.fecha < '$fechaFin') as ventas, (select sum(costoNeto) ct from Compras c, HistorialCompras hc where hc.id_compra = c.id and c.fecha > '$fechaIni' and c.fecha < '$fechaFin') as compras";
                foreach ($pdo->query($sql) as $row) {
                    $output .= '<tr>  
                        <td width="30%"><label>Balance de ingresos: </label></td>  
                        <td width="70%">'.$row["rs"].'</td>  
                        </tr>
                    ';
                    $output .= '</table></div>';
                }
            break;
            case "1" :
                
            break;
            case "2" :
                
            break;
            case "3" :
                
            break;
            case "4" :
                
            break;
            case "5" :
                
            break;
            case "6" :
                
            break;
            case "7" :
                
            break;
            case "8" :
                
            break;
            case "9" :
                
            break;

        }
    }
    Database::disconnect();
}
?>
<!DOCTYPE html>  
<html>  
 <head>  
  <title>Productos</title>  
    <link   href=	"css/bootstrap.min.css" rel="stylesheet">
    <script src=	"js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="../js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>  
  <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  <script src=""></script>  
 </head>  
 <body>  
  <br /><br />  
    <div class="container" style="width:700px;">  
    <h3 align="center" >Productos</h3>  
    <br />  
 


    <form method="post" id="search_form">

        <div class="control-group <?php echo !empty($clienteError)?'error':'';?>">
        <label class="control-label">Selecciona un cliente</label>
        <div class="controls">
        
        <select name ="cliente">
        <option value="">Selecciona una cliente</option>
        <?php
        $pdo = Database::connect();
        $query = 'SELECT * FROM Clientes';
        foreach ($pdo->query($query) as $row) {
            if ($row['id']==$cliente)
            echo "<option selected value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
            else
            echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
        }
        Database::disconnect();
        ?>
        
        </select>

        <?php if (!empty($clienteError)): ?>
        <span class="help-inline"><?php echo $clienteError;?></span>
        <?php endif;?>        
        </div>
        </div>


        <div class="control-group <?php echo !empty($productoError)?'error':'';?>">
        <label class="control-label">Selecciona un producto</label>
        <div class="controls">
        
        <select name ="producto">
        <option value="">Selecciona una producto</option>
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

        <div class="control-group <?php echo !empty($proveedorError)?'error':'';?>">
        <label class="control-label">Selecciona un proveedor</label>
        <div class="controls">
        
        <select name ="proveedor">
        <option value="">Selecciona una proveedor</option>
        <?php
        $pdo = Database::connect();
        $query = 'SELECT * FROM Proveedores';
        foreach ($pdo->query($query) as $row) {
            if ($row['id']==$proveedor)
            echo "<option selected value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
            else
            echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
        }
        Database::disconnect();
        ?>
        
        </select>
        
        <?php if (!empty($proveedorError)): ?>
        <span class="help-inline"><?php echo $proveedorError;?></span>
        <?php endif;?>
        </div>
        </div>

        <div class="control-group <?php echo !empty($descuentoError)?'error':'';?>">
        <label class="control-label">Selecciona un descuento</label>
        <div class="controls">
        
        <select name ="descuento">
        <option value='0"'>0%</option>
        <option value='5"'>5%</option>
        <option value='10"'>10%</option>
        <option value='15"'>15%</option>
        <option value='20"'>20%</option>
        <option value='25"'>25%</option>
        <option value='30"'>30%</option>
        <option value='35"'>35%</option>
        <option value='40"'>40%</option>
        <option value='45"'>45%</option>
        <option value='50"'>50%</option>
        <option value='55"'>55%</option>
        <option value='60"'>60%</option>
        <option value='65"'>65%</option>
        <option value='70"'>70%</option>
        <option value='75"'>75%</option>
        <option value='80"'>80%</option>
        <option value='85"'>85%</option>
        <option value='90"'>90%</option>
        <option value='95"'>95%</option>
        <option value='100"'>100%</option>
        </select>
        
        <?php if (!empty($descuentoError)): ?>
        <span class="help-inline"><?php echo $descuentoError;?></span>
        <?php endif;?>
        </div>
        </div>
        
        <br><br>

        <div class="form-group">
            <label for="dtp_input2" class="col-md-2 control-label">Eliga fecha Inicial</label>
            <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                <input class="form-control" size="16" type="text" name = "fecha_i" id = "fecha_i" value="<?php echo date("Y-m-d")?>" readonly>
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
            
            <input type="hidden" id="dtp_input2" value="" /><br/>
            
            <label for="dtp_input2" class="col-md-2 control-label">Eliga fecha Final</label>
            
            <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                <input class="form-control" size="16" type="text" name = "fecha_f" id = "fecha_f" value="<?php echo date("Y-m-d")?>" readonly>
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
            
            <input type="hidden" id="dtp_input2" value="" /><br/>
            
        </div>
        <br />
        
        <div>
        <button type="submit" name="button_form" value="0" class="btn-link">Balance de ingresos entre las fechas</button>
        <button type="submit" name="button_form" value="1" class="btn-link">Precio promedio para el cliente, del producto desde la fecha inicial</button>
        <button type="submit" name="button_form" value="2" class="btn-link">Descuento promedio para el cliente,del producto, desde la fecha</button>
        <button type="submit" name="button_form" value="3" class="btn-link">Porcentaje de descuento promedio aplicado por el proveedor</button>
        <button type="submit" name="button_form" value="4" class="btn-link">Importe total pagado al proveedor entre fecha X y fecha Y</button>
        </div>
        <div>
        <button type="submit" name="button_form" value="5" class="btn-link">Cambio en el promedio de compras del cliente entre las fechas</button>
        <button type="submit" name="button_form" value="6" class="btn-link">Cantidad de unidades del producto disponibles en inventario</button>
        <button type="submit" name="button_form" value="7" class="btn-link">Total de compras del cliente desde entre las fechas</button>
        <button type="submit" name="button_form" value="8" class="btn-link">Promedio de ventas diario entre las fechas</button>
        <button type="submit" name="button_form" value="9" class="btn-link">Promedio de ventas semanal entre las fechas</button>
        </div>
    </form>

    <?php if(!empty($output)) echo $output;?>
    <a class="btn-info" href="index.php">Regresar</a>

    </div>

<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>

