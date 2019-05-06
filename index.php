<?php  
//index.php
require 'database.php';

?>
<!DOCTYPE html>  
<html>  
 <head>  
  <title>Home</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 </head>  
 <body>  
  <br /><br />  
  <div class="container" style="width:700px;">  
   <h3 align="center">Menu Principal</h3>  
   <br />  
   <div class="table-responsive">
    <div align="middle">
     <a href="Clientes.php"  class="btn btn-info">Clientes</a>
     <a href="Proveedores.php"   class="btn btn-info">Proveedores</a>
     <a href="Compras.php"   class="btn btn-info">Compras</a>
    </div>
    <br />
    
   </div>  
  </div>
 </body>  
</html>  

