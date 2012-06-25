<!-- content -->
	<div id="content">
		<div class="wrapper">
			<div class="aside maxheight">
<!-- box begin -->
				<div class="box maxheight">
					<div class="inner">
						<h3>Consulta:</h3>
						<form action="consultar.php" method="post" id="reservation-form">
					 		<fieldset>
								<div class="field"><p><label>Check In</label> <input type="text" name ="fechae" id="checkin"></p></div>
								<div class="field"><p><label>Check Out</label> <input type="text" name ="fechas" id="checkout"></p></div>
                                                                <div class="field"><label>Categoria</label><select class="select1" name="cat"><option></option><option>Business</option><option>Normal</option><option>Economic</option></select></div>
                                                                <div class="field"><label>Tipo</label><select class="select2" name="tip"><option></option><option>individual</option><option>doble</option></select></div>
								<div class="button"><input type="submit"></div>
							</fieldset>
						</form>
					</div>
				</div>
<!-- box end -->
			</div>
			
                    
                    <?php
                       
                        $_SESSION["mivariabledesesion"] = "Hola este es el valor de la variable de sesión"; 
                        echo $_SESSION["mivariabledesesion"]; 
                    ?>
		</div>
               
	</div>
