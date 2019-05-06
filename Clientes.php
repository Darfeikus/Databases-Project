<?php  
//index.php
require 'database.php';

?>
<!DOCTYPE html>  
<html>  
 <head>  
  <title>Clientes</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 </head>  
 <body>  
  <br /><br />  
  <div class="container" style="width:700px;">  
   <h3 align="center" >Clientes</h3>  
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
       <th width="20%">Clave</th>  
       <th width="20%">Nombre</th>
       <th width="20%">Direccion</th>  
       <th width="20%">Telefono</th>
      </tr>
        <?php 
            $pdo = Database::connect();
            $sql = 'SELECT * FROM Clientes';
            foreach ($pdo->query($sql) as $row) {
                echo '<tr>';							   	
                echo '<td>'. $row['clave'] . '</td>';
                echo '<td>'. $row['nombre'] . '</td>';
                echo '<td>'. $row['direccion'] . '</td>';
                echo '<td>'. $row['telefono'] . '</td>';
                // echo '<td width=250>';
                // echo '<a class="btn" href="read.php?id='.$row['id'].'">Detalles</a>';
                // echo '&nbsp;';
                // echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Actualizar</a>';
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
    <h4 class="modal-title">Agregar Cliente</h4>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form">
     <label>Clave del cliente</label>
     <input type="text" name="clave" id="clave" class="form-control" />
     <br />
     <label>Nombre del Cliente</label>
     <input type="text" name="name" id="name" class="form-control" />
     <br />
     <label>Direccion del cliente</label>
     <input type="text" name="address" id="address" class="form-control" />
     <br />  
     <label>Telefono del Cliente</label>
     <input type="text" name="phone" id="phone" class="form-control" />
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
                        <a data-dismiss="modal" data-toggle="modal" href="" data-target="#clave-modal" class="btn btn-info btn-sm">Busqueda por clave</a>
                        <br>
                        <br>
                        <a data-dismiss="modal" data-toggle="modal" href="" data-target="#nombre-modal" class="btn btn-info btn-sm">Busqueda por Numero</a>
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
                <h4 class="modal-title">Busqueda por clave</h4>
            </div>
            <div class="modal-body">
            <form method="post" id="search_form">
                <label>Clave del cliente</label>
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

<div id="nombre-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Busqueda por Numero</h4>
            </div>
            <div class="modal-body">
            <form method="post" id="search_form">
                <label>Numero del cliente</label>
                <input type="text" name="n_clave" id="n_clave" class="form-control" />
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
    <h4 class="modal-title">Informacion del cliente</h4>
   </div>
   <div class="modal-body" id="data-cliente">
    
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
        if($('#clave').val() == '')
        {  
        alert("Se requiere una clave");  
        }
        else if($('#name').val() == "")  
        {  
        alert("Se requiere un nombre");  
        }  
        else if($('#address').val() == '')  
        {  
        alert("Se requiere una direccion");  
        }  
        else if($('#phone').val() == '')
        {  
        alert("Se requiere un numero");  
        }

        else  
        {  
            $.ajax({  
                url:"insertCliente.php",  
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
        else
        $.ajax({
                url:"searchCliente.php",
                method:"POST",
                data:{clave_id:clave_id,opc:opc},
                success:function(data){
                $('#data-cliente').html(data);
                $('#dataModal').modal('show');
            }
        });
    });
    $(document).on('click', '.view_data1', function(){
        var clave_id = $("#n_clave").val();
        var opc = '1';
        if(clave_id==''){
            alert("Se requiere un numero")
        }
        else
        $.ajax({
                url:"searchCliente.php",
                method:"POST",
                data:{clave_id:clave_id,opc:opc},
                success:function(data){
                $('#data-cliente').html(data);
                $('#dataModal').modal('show');
            }
        });
    });
});

 </script>

