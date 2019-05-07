<?php  
//index.php
require 'database.php';

?>
<!DOCTYPE html>  
<html>  
 <head>  
  <title>Ventas</title>  
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
   <h3 align="center" >Ventas</h3>  
   <br />  
   <div class="table-responsive">
    <div align="right">
     <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success">Anadir</button>
     <button type="button" name="search" id="search" data-toggle="modal" data-target="#search-modal" class="btn btn-info">Buscar</button>
    </div>
    <br />


    <div id="employee_table">
     <table class="table table-bordered">
      <tr>
       <th width="20%">Cliente</th>
       <th width="20%">Fecha</th>
       <th width="40%"></th>
      </tr>
        <?php 
            $pdo = Database::connect();
            $sql = 'SELECT p.id,prs.id id_venta,p.nombre,prs.fecha from Clientes p, Ventas prs where prs.id_cliente = p.id order by prs.fecha';
            foreach ($pdo->query($sql) as $row) {
                echo '<tr>'; 	
                echo '<td>'. $row['nombre'] . '</td>';
                echo '<td>'. $row['fecha'] . '</td>';
                echo '<td >';
                echo '<a class="btn" href="readVe.php?id='.$row['id'].'&id_venta='.$row['id_venta'].'">Detalles (Editar)</a>';
                echo '&nbsp;';
                echo '<a class="btn btn-danger" href="deleteVe.php?id='.$row['id_venta'].'">Eliminar</a>';
                echo '</tr>';
            }
            Database::disconnect();
        ?>
        
     </table>
    </div>
   </div>  
  </div>  

<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>

    <h4 class="modal-title">Agregar venta</h4>
   </div>
   
   <div class="modal-body">
    <form method="post" id="insert_form" action = "insertVentaIndex.php">
   
    <label>Selecciona un cliente</label>
    <br>
    <select name ="proveedor" id="proveedor">
     <?php
        $pdo = Database::connect();
        $query = 'SELECT * FROM Clientes';
        foreach ($pdo->query($query) as $row) {
            echo "<option value=" . $row['id'] . ">" . $row['nombre'] . "</option>";
        }
        Database::disconnect();
        ?>
    </select>
     <br/><br/><br/>
        <div class="form-group">
            <label for="dtp_input2" class="col-md-2 control-label">Eliga la fecha</label>
            <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                <input class="form-control" size="16" type="text" name = "fecha" id = "fecha" value="<?php echo date("Y-m-d"); ?>" readonly>
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
            <input type="hidden" id="dtp_input2" value="" /><br/>
        </div>
     <br />
     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<div id="search-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Busqueda</h4>
            </div>
            <div class="modal-body">

                    <div class="col-sm-2">
                        <a data-dismiss="modal" data-toggle="modal" href="" data-target="#clave-modal" class="btn btn-info btn-sm">Busqueda por cliente</a>
                        <br>
                        <br>
                        <a data-dismiss="modal" data-toggle="modal" href="" data-target="#nombre-modal" class="btn btn-info btn-sm">Busqueda por fecha</a>
                    </div>
                    <br>
            </div>
            <br><br><br>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div id="clave-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Busqueda por cliente</h4>
            </div>
            <div class="modal-body">
            <form method="post" id="search_form">
                <label>Seleccione el cliente</label>
                <select name ="s_clave" id="s_clave">
                <?php
                    $pdo = Database::connect();
                    $query = 'SELECT * FROM Clientes';
                    foreach ($pdo->query($query) as $row) {
                        echo "<option value=" . $row['id'] . ">" . $row['nombre'] . "</option>";
                    }
                    Database::disconnect();
                    ?>
                </select>
                <br>
                <input type="button" name="view" value="view" id="search_button" class="btn btn-info btn-xs view_data" />
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div id="nombre-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Busqueda por Fecha</h4>
            </div>
            <div class="modal-body">
            <form method="post" id="search_form">
                <div class="form-group">
                    <label for="dtp_input2" class="col-md-2 control-label">Eliga la fecha</label>
                    <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                        <input class="form-control" size="16" type="text" name = "fecha_s" id = "fecha_s" value="<?php echo date("Y-m-d"); ?>" readonly>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input2" value="" /><br/>
                </div>
                <br />
                <input type="button" name="view" value="view" id="search_button" class="btn btn-info btn-xs view_data1" />
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div id="dataModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Informacion del venta</h4>
   </div>
   <div class="modal-body" id="data-compra">
    
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<div class="form-actions">
    <a class="btn btn-default" href="index.php">Regresar</a>
</div>
</body>  
</html>

<script>  
$(document).ready(function(){

    $(document).on('click', '.view_data', function(){
        var clave_id = $("#s_clave").val();
        var opc = '0';
        if(clave_id==''){
            alert("Se requiere una cliente")
        }
        else{
            $.ajax({
                url:"searchVenta.php",
                method:"POST",
                data:{clave_id:clave_id,opc:opc},
                success:function(data){
                    $('#data-compra').html(data);
                    $('#dataModal').modal('show');
                }
            });
        }
    });
    $(document).on('click', '.view_data1', function(){
        var clave_id = $("#fecha_s").val();
        var opc = '1';
        if(clave_id==''){
            alert("Se requiere una fecha")
        }
        else
        $.ajax({
                url:"searchVenta.php",
                method:"POST",
                data:{clave_id:clave_id,opc:opc},
                success:function(data){
                $('#data-compra').html(data);
                $('#dataModal').modal('show');
            }
        });
    });
});
 </script>

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

