<?php 
	
	require 'database.php';

		$marcaError = null;
		$modeloError = null;
		$pantallaError = null;
		$ramError = null;
		$almacenamientoError = null;
		$ctraseraError = null;
		$cfrontalError = null;
		$nfcError = null;
		$precioError = null;
		$nfc = 'S';

	if ( !empty($_POST)) {
		
		// keep track post values
		$marca = $_POST['marca'];
		$modelo = $_POST['modelo'];
		$pantalla = $_POST['pantalla'];
		$ram = $_POST['ram'];
		$almacenamiento = $_POST['almacenamiento'];
		$ctrasera = $_POST['ctrasera'];
		$cfrontal = $_POST['cfrontal'];
		$nfc = $_POST['nfc'];
		$precio = $_POST['precio'];
		
		/// validate input
		$valid = true;
		
		if (empty($marca)) {
			$marcaError = 'Por favor selecciona una marca';
			$valid = false;
		}

		if (empty($modelo)) {
			$modeloError = 'Por favor escribe el modelo';
			$valid = false;
		}

		if (empty($pantalla)) {
			$pantallaError = 'Por favor escribe la info de la pantalla';
			$valid = false;
		}

		if (empty($ram)) {
			$ramError = 'Por favor escribe la capacidad de la RAM';
			$valid = false;
		}

		if (empty($almacenamiento)) {
			$almacenamientoError = 'Por favor escribe la info de almacenamiento';
			$valid = false;
		}

		if (empty($ctrasera)) {
			$ctraseraError = 'Por favor escribe la info de la cam. trasera';
			$valid = false;
		}

		if (empty($cfrontal)) {
			$cfrontalError = 'Por favor escribe la info de la cam. frontal';
			$valid = false;
		}


		if (empty($precio)) {
			$precioError = 'Por favor escribe el precio';
			$valid = false;
		}
		
		// insert data
		if ($valid) {
			var_dump($_POST);
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if($nfc=="S")
				$sql = "INSERT INTO smartphone (idphone,idmarca,modelo,pantalla,ram,almacenamiento,ctrasera,cfrontal,nfc,precio) values(null, ?, ?, ?, ?, ?, ?, ?, true, ?)";			
			else
				$sql = "INSERT INTO smartphone (idphone,idmarca,modelo,pantalla,ram,almacenamiento,ctrasera,cfrontal,nfc,precio) values(null, ?, ?, ?, ?, ?, ?, ?, false, ?)";			
			$q = $pdo->prepare($sql);
			
			$q->execute(array($marca,$modelo,$pantalla,$ram,$almacenamiento,$ctrasera,$cfrontal,$precio));			
			Database::disconnect();
			header("Location: index.php");
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
		   			<h3>Agregar un tel&eacute;fono</h3>
		   		</div>
	    		
				<form class="form-horizontal" action="create.php" method="post">
				
					<div class="control-group <?php echo !empty($marcaError)?'error':'';?>">
					    	<label class="control-label">Marca</label>
					    	<div class="controls">
                            	<select name ="marca">
                                    <option value="">Selecciona una marca</option>
                                        <?php
					   						$pdo = Database::connect();
					   						$query = 'SELECT * FROM marca';
	 				   						foreach ($pdo->query($query) as $row) {
	 				   							if ($row['idmarca']==$marca)
                        	   						echo "<option selected value='" . $row['idmarca'] . "'>" . $row['nombrem'] . "</option>";
                        	   					else
                        	   						echo "<option value='" . $row['idmarca'] . "'>" . $row['nombrem'] . "</option>";
					   						}
					   						Database::disconnect();
					  					?>
                                                    
                                </select>
					      	<?php if (!empty($marcaError)): ?>
					      		<span class="help-inline"><?php echo $marcaError;?></span>
					      	<?php endif;?>
					    	</div>
					  	</div>

					  <div class="control-group <?php echo !empty($modeloError)?'error':'';?>">
					  
					    <label class="control-label">Modelo</label>
					    <div class="controls">
					      	<input name="modelo" type="text" placeholder="modelo" value="<?php echo !empty($modelo)?$modelo:'';?>">
					      	<?php if (!empty($modeloError)): ?>
					      		<span class="help-inline"><?php echo $modeloError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>

					  <div class="control-group <?php echo !empty($pantallaError)?'error':'';?>">
					  
					    <label class="control-label">Pantalla (in)</label>
					    <div class="controls">
					      	<input name="pantalla" type="text" placeholder="pantalla" value="<?php echo !empty($pantalla)?$pantalla:'';?>">
					      	<?php if (!empty($pantallaError)): ?>
					      		<span class="help-inline"><?php echo $pantallaError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>

					  <div class="control-group <?php echo !empty($ramError)?'error':'';?>">
					  
					    <label class="control-label">RAM (GB)</label>
					    <div class="controls">
					      	<input name="ram" type="text" placeholder="ram" value="<?php echo !empty($ram)?$ram:'';?>">
					      	<?php if (!empty($ramError)): ?>
					      		<span class="help-inline"><?php echo $ramError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>

					  <div class="control-group <?php echo !empty($almacenamientoError)?'error':'';?>">
					  
					    <label class="control-label">Almacenamiento (GB)</label>
					    <div class="controls">
					      	<input name="almacenamiento" type="text" placeholder="almacenamiento" value="<?php echo !empty($almacenamiento)?$almacenamiento:'';?>">
					      	<?php if (!empty($almacenamientoError)): ?>
					      		<span class="help-inline"><?php echo $almacenamientoError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>

					  <div class="control-group <?php echo !empty($ctraseraError)?'error':'';?>">
					  
					    <label class="control-label">C&aacute;mara trasera (MP)</label>
					    <div class="controls">
					      	<input name="ctrasera" type="text" placeholder="ctrasera" value="<?php echo !empty($ctrasera)?$ctrasera:'';?>">
					      	<?php if (!empty($ctraseraError)): ?>
					      		<span class="help-inline"><?php echo $ctraseraError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>

					  <div class="control-group <?php echo !empty($cfrontalError)?'error':'';?>">
					  
					    <label class="control-label">C&aacute;mara frontal (MP)</label>
					    <div class="controls">
					      	<input name="cfrontal" type="text" placeholder="cfrontal" value="<?php echo !empty($cfrontal)?$cfrontal:'';?>">
					      	<?php if (!empty($cfrontalError)): ?>
					      		<span class="help-inline"><?php echo $cfrontalError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>

					  	<div class="control-group <?php echo !empty($nfcError)?'error':'';?>">
						    <label class="control-label">NFC</label>
						    <div class="controls">
	                                                <input name="nfc" type="radio" value="S"
	                                                	<?php echo ($nfc == "S")?'checked':'';?> >Si</input> &nbsp;&nbsp;
	                                                <input name="nfc" type="radio" value="N" 
	                                                	<?php echo ($nfc == "N")?'checked':'';?> >No</input>
						      	
						      	<?php if (!empty($nfcError)): ?>
						      		<span class="help-inline"><?php echo $nfcError;?></span>
						      	<?php endif;?>
						    </div>
					  	</div>

					  <div class="control-group <?php echo !empty($precioError)?'error':'';?>">
					  
					    <label class="control-label">Precio ($)</label>
					    <div class="controls">
					      	<input name="precio" type="text" placeholder="precio" value="<?php echo !empty($precio)?$precio:'';?>">
					      	<?php if (!empty($precioError)): ?>
					      		<span class="help-inline"><?php echo $precioError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>

					<div class="form-actions">
						<button type="submit" class="btn btn-success">Agregar</button>
						<a class="btn" href="index.php">Regresar</a>
					</div>

				</form>
			</div>					
	    </div> <!-- /container -->
	</body>
</html>