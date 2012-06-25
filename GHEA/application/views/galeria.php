<!-- content -->
	<div id="content">
		<div class="wrapper">
                
			<div class="content">
                            
				<div class="indent">
                                    
					<h2>La cadena de Hoteles GHEA te da la bienvenida!</h2>
					<img class="img-indent png" alt="" src="images/1page-img1.png" />
					<p class="alt-top">Le invitamos a ud. o a su familia, a quedarse por un día o por semanas, por viaje de negocios o por alguna conferencia - nuestra atención le hará sentirse mejor que en su casa.</p>
				 	Contactenos cuando lo desee, pregunte con confianza.
					<div class="clear"></div>
					<div class="line-hor"></div>
					<div class="wrapper line-ver">
						<div class="col-1">
				 			<h3>Ofertas especiales</h3>
							<ul>
								<li>Televisor gigante 3D en cada habitación</li>
								<li>Suministro de licor infinito</li>
								<li>Acceso a la discoteca, hasta que el cuerpo aguante</li>
								<li>Seguridad y Privacidad aseguradas por Batman</li>
								<li>Millas de Huesped</li>
							</ul>
							<div class="button"><span><span><a href="#">Reserve YA!</a></span></span></div>
						</div>
						<div class="col-2">
				 			<h3>Location</h3>
							<p>Estamos ubicados en la mitad del medio de la nada.</p>
							<dl class="contacts-list">
								<dt>This is Sparta, 300</dt>
								<dd>0800-LLAMA-YA</dd>
								<dd>0800-LLAMA-DESPUES</dd>
							</dl>
						</div>
					</div>
				</div>
			</div>
                    <?php
                       
                       // $_SESSION["mivariabledesesion"] = "Hola este es el valor de la variable de sesión"; 
                       
                        if (!isset($_SESSION["mivariabledesesion"]))
                        { 
                                   echo "NO EXISTE";               
                        }
                        else
                        { 
                             echo $_SESSION["mivariabledesesion"]; 
                        } 
                        session_destroy();
                        
                    ?>
		</div>
	</div>
