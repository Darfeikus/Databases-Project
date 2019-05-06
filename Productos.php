<?php  
//index.php
require 'database.php';

?>
<!DOCTYPE html>  
<html>  
 <head>  
  <title>Productos</title>  
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
   <div class="table-responsive">
    <div align="right">
     <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success">Anadir</button>
     <button type="button" name="search" id="search" data-toggle="modal" data-target="#search-modal" class="btn btn-info">Buscar</button>
    </div>
    <br />


    <div id="employee_table">
     <table class="table table-bordered">
      <tr>
       <th width="5%">Clave</th>
       <th width="20%">Descripcion</th>
       <th width="5%">Costo Promedio</th>
       <th width="5%">Costo Ultimo</th>
       <th width="30%">Ultima Compra</th>
       <th width="5%">Precio Promedio</th>
       <th width="5%">Precio Ultimo</th>
       <th width="30%">Ultima Venta</th>
      </tr>
        <?php 
            $pdo = Database::connect();
            $sql = 'SELECT * from Productos';
            foreach ($pdo->query($sql) as $row) {
                echo '<tr>'; 	
                echo '<td>'. $row['clave'] . '</td>';
                echo '<td>'. $row['descripcion'] . '</td>';
                echo '<td>'. $row['costoPromedio'] . '</td>';
                echo '<td>'. $row['costoUltimo'] . '</td>';
                echo '<td>'. $row['ultimaCompra'] . '</td>';
                echo '<td>'. $row['precioPromedio'] . '</td>';
                echo '<td>'. $row['precioUltimo'] . '</td>';
                echo '<td>'. $row['ultimaVenta'] . '</td>';
                ?>
                <?php
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

    <h4 class="modal-title">Agregar Producto</h4>
   </div>
   
   <div class="modal-body">
    <form method="post" id="insert_form">
   
    <br>
        <label>Clave del producto</label>
        <input type="text" name="clave" id="clave" class="form-control" />
        <br />
        <label>Descripcion del Producto</label>
        <input type="text" name="name" id="name" class="form-control" />
        <br />
        <label>Costo Promedio</label>
        <input type="text" name="costoProm" id="costoProm" class="form-control" />
        <br />  
        <label>Costo Ultimo</label>
        <input type="text" name="costoUltim" id="costoUltim" class="form-control" />
        <br />
        <label>Ultima Compra</label>
        <br />
        <div class="form-group">
            <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                <input class="form-control" size="16" type="text" name = "fechaCompra" id = "fechaCompra" value="" readonly>
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
            <input type="hidden" id="dtp_input2" value="" /><br/>
        </div>
        <br />
        <label>Precio Promedio</label>
        <input type="text" name="precioProm" id="precioProm" class="form-control" />
        <br />
        <label>Precio Ultimo</label>
        <input type="text" name="precioUltim" id="precioUltim" class="form-control" />
        <br />
        <label>Ultima Venta</label>
        <br />
        <div class="form-group">
            <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                <input class="form-control" size="16" type="text" name = "fechaVenta" id = "fechaVenta" value="" readonly>
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
                        <a data-dismiss="modal" data-toggle="modal" href="" data-target="#clave-modal" class="btn btn-info btn-sm">Busqueda por Clave</a>
                        <br>
                        <br>
                        <a data-dismiss="modal" data-toggle="modal" href="" data-target="#compra-modal" class="btn btn-info btn-sm">Busqueda por Ultima Compra</a>
                        <br>
                        <br>
                        <a data-dismiss="modal" data-toggle="modal" href="" data-target="#venta-modal" class="btn btn-info btn-sm">Busqueda por Ultima Venta</a>
                    </div>
                    <br>
                    <br>
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
                <h4 class="modal-title">Busqueda por clave</h4>
            </div>
            <div class="modal-body">
            <form method="post" id="search_form">
                <label>Clave del Producto</label>
                <input type="text" name="s_clave" id="s_clave" class="form-control" />
                <br />
                <input type="button" name="view" value="view" id="search_button" class="btn btn-info btn-xs view_data" />
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div id="compra-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Busqueda por Fecha Compra</h4>
            </div>
            <div class="modal-body">
            <form method="post" id="search_form">
                <div class="form-group">
                    <label for="dtp_input2" class="col-md-2 control-label">Eliga la fecha</label>
                    <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                        <input class="form-control" size="16" type="text" name = "fecha_c" id = "fecha_c" value="" readonly>
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

<div id="venta-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Busqueda por Fecha Venta</h4>
            </div>
            <div class="modal-body">
            <form method="post" id="search_form">
                <div class="form-group">
                    <label for="dtp_input2" class="col-md-2 control-label">Eliga la fecha</label>
                    <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                        <input class="form-control" size="16" type="text" name = "fecha_v" id = "fecha_v" value="" readonly>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input2" value="" /><br/>
                </div>
                <br />
                <input type="button" name="view" value="view" id="search_button" class="btn btn-info btn-xs view_data2" />
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div id="dataModal" class="modal lg">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Informacion del compra</h4>
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

    $('#insert_form').on("submit", function(event){  
        event.preventDefault();  
        if($('#clave').val() == "")  
        {  
            alert("Se requiere una clave");  
        }  
        else if($('#name').val() == '')
        {  
            alert("Se requiere una descripcion");  
        }
        else if($('#costoProm').val() == "")  
        {  
            alert("Se requiere un costo promedio");  
        }  
        else if($('#costoUltim').val() == '')
        {  
            alert("Se requiere el ultimo costo");  
        }
        else if($('#fechaCompra').val() == "")  
        {  
            alert("Se requiere una fecha de compra");  
        }  
        else if($('#precioProm').val() == '')
        {  
            alert("Se requiere precio promedio");  
        }
        else if($('#precioUltim').val() == '')
        {  
            alert("Se requiere ultimo precio");  
        }
        else if($('#fechaVenta').val() == '')
        {  
            alert("Se requiere una fecha de venta");  
        }
        else  
        {   
            $.ajax({  
                url:"insertProducto.php",
                method:"POST",  
                data:$('#insert_form').serialize(),  
                beforeSend:function(){  
                    $('#insert').val("Inserting");
                },  
                success:function(data){  
                    $('#insert_form')[0].reset();  
                    $('#add_data_Modal').modal('hide');
                    location.reload();
                }  
            });  
        }  
    });

    $(document).on('click', '.view_data', function(){
        var clave_id = $("#s_clave").val();
        var opc = '0';
        if(clave_id==''){
            alert("Se requiere una clave")
        }
        else{
            $.ajax({
                url:"searchProd.php",
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
        var clave_id = $("#fecha_c").val();
        var opc = '1';
        if(clave_id==''){
            alert("Se requiere una fecha")
        }
        else
        $.ajax({
                url:"searchProd.php",
                method:"POST",
                data:{clave_id:clave_id,opc:opc},
                success:function(data){
                $('#data-compra').html(data);
                $('#dataModal').modal('show');
            }
        });
    });
    $(document).on('click', '.view_data2', function(){
        var clave_id = $("#fecha_v").val();
        var opc = '2';
        if(clave_id==''){
            alert("Se requiere una fecha")
        }
        else
        $.ajax({
                url:"searchProd.php",
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

