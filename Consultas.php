<?php  

require "database.php";

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
 


    <form method="post" id="search_form">
        <div class="form-group">
            <label for="dtp_input2" class="col-md-2 control-label">Eliga fecha Inicial</label>
            <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                <input class="form-control" size="16" type="text" name = "fecha_c" id = "fecha_i" value="" readonly>
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
            
            <input type="hidden" id="dtp_input2" value="" /><br/>
            
            <label for="dtp_input2" class="col-md-2 control-label">Eliga fecha Final</label>
            
            <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                <input class="form-control" size="16" type="text" name = "fecha_c" id = "fecha_f" value="" readonly>
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
            
            <input type="hidden" id="dtp_input2" value="" /><br/>
            
        </div>
        <br />
        <div>
            <button type="submit" class="btn btn-success">Balance de Ingresos entre las fechas</button>
        </div>
        <a class="btn" href="index.php">Regresar</a>


    </form>

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

