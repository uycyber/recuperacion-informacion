<!-- content -->
	<div id="content">
            <div class="wrapper">
		<?php $this->load->view('includes/boxconsulta');  ?>	
                
			<div class="content">
				
                            <?php
                            include 'DB.php';
                                    $db = new DB();
                                    if(( (isset($_POST["fechae"]) == true ) && $_POST["fechae"]!="") && ( (isset($_POST["fechas"]) == true ) && $_POST["fechas"]!=""))
                                    { 
                                        if (( (isset($_POST["cat"]) == true ) && $_POST["cat"]!="") && ( (isset($_POST["tip"]) == true ) && $_POST["tip"]!=""))
                                        {
                                        /* CONSULTA 2
                                        si el tipo es individual
                                            -- Habitaciones disponibles dado un rango de fecha, un tipo y una categoria.
                                            -- Leyenda:
                                            -- tipo_usuario: este es el tipo de habitacion pedida por el usuario.
                                            -- categoria_usuario: este es la categoria de la habitacion pedida por el usuario. */
                                           echo '<br>'."<div align=\"center\">Consulta Habitaciones Disponibles Desde:     ".$_POST["fechae"].'<br>';
                                            echo "<div align=\"center\">Consulta Habitaciones Disponibles Hasta:        ".$_POST["fechas"].'<br>';
                                            echo "<div align=\"center\">Categoria de la Habitacion:     ".$_POST["cat"].'<br>';
                                            echo "<div align=\"center\">Tipo de la Habitacion:      ".$_POST["tip"].'<br>'."<br>";
                                            $consulta = "(SELECT (numero_habitacion) as Habitacion, (tipo) as Tipo, (categoria) as Categoria FROM habitacion WHERE habitacion.tipo = '".$_POST["tip"]."' AND habitacion.categoria = '".$_POST["cat"]."' AND habitacion.numero_habitacion NOT IN (SELECT DISTINCT(numero_habitacion) FROM se_reserva UNION SELECT DISTINCT(numero_habitacion) FROM ocupa WHERE ('".$_POST["fechae"]."' <= ocupa.fecha_llegada AND '".$_POST["fechas"]."' >= ocupa.fecha_llegada) OR ('".$_POST["fechae"]."' <= ocupa.fecha_salida AND '".$_POST["fechas"]."' >= ocupa.fecha_salida) OR ('".$_POST["fechae"]."' >= ocupa.fecha_salida AND '".$_POST["fechas"]."' <= ocupa.fecha_salida))) UNION (SELECT se_reserva.numero_habitacion, tipo, categoria FROM se_reserva, reservacion, habitacion WHERE se_reserva.id = reservacion.id AND se_reserva.numero_habitacion = habitacion.numero_habitacion AND habitacion.tipo = '".$_POST["tip"]."' AND habitacion.categoria = '".$_POST["cat"]."' AND (('".$_POST["fechae"]."' < reservacion.fecha_llegada AND '".$_POST["fechas"]."' < reservacion.fecha_llegada) OR ('".$_POST["fechae"]."' > reservacion.fecha_salida AND '".$_POST["fechas"]."' > reservacion.fecha_salida)))";
                                            $resultados = $db->consultar($consulta);
                                            $num_rows =  mysql_num_rows($resultados);
                                            
                                            if($_POST["tip"] == 'individual')
                                            {
                                                if($num_rows!= 0)
                                                {
                                                    echo "<div align=\"center\"><table border = '1'>";
                                                    echo "<tr> ";
                                                    echo "<td><b>Habitacion</b></td>";
                                                    echo "<td><b>Tipo</b></td> ";
                                                    echo "<td><b>Categoria</b></td>";
                                                    echo "</tr> ";

                                                    while($row = mysql_fetch_array($resultados)) 
                                                    { 
                                                        echo "<td>".$row["Habitacion"]."</td>";
                                                        echo "<td>".$row["Tipo"]."</td> ";
                                                        echo "<td>".$row["Categoria"]."</td> ";
                                                        echo "</tr> ";
                                                       }
                                                 }
                                                 else
                                                 {
                                                    $_POST["tip"]='doble';
                                                    $consulta = "(SELECT (numero_habitacion) as Habitacion, (tipo) as Tipo, (categoria) as Categoria FROM habitacion WHERE habitacion.tipo = '".$_POST["tip"]."' AND habitacion.categoria = '".$_POST["cat"]."' AND habitacion.numero_habitacion NOT IN (SELECT DISTINCT(numero_habitacion) FROM se_reserva UNION SELECT DISTINCT(numero_habitacion) FROM ocupa WHERE ('".$_POST["fechae"]."' <= ocupa.fecha_llegada AND '".$_POST["fechas"]."' >= ocupa.fecha_llegada) OR ('".$_POST["fechae"]."' <= ocupa.fecha_salida AND '".$_POST["fechas"]."' >= ocupa.fecha_salida) OR ('".$_POST["fechae"]."' >= ocupa.fecha_salida AND '".$_POST["fechas"]."' <= ocupa.fecha_salida))) UNION (SELECT se_reserva.numero_habitacion, tipo, categoria FROM se_reserva, reservacion, habitacion WHERE se_reserva.id = reservacion.id AND se_reserva.numero_habitacion = habitacion.numero_habitacion AND habitacion.tipo = '".$_POST["tip"]."' AND habitacion.categoria = '".$_POST["cat"]."' AND (('".$_POST["fechae"]."' < reservacion.fecha_llegada AND '".$_POST["fechas"]."' < reservacion.fecha_llegada) OR ('".$_POST["fechae"]."' > reservacion.fecha_salida AND '".$_POST["fechas"]."' > reservacion.fecha_salida)))";
                                                    $resultados = $db->consultar($consulta);
                                                    $num_rows =  mysql_num_rows($resultados);
                                                    echo "<div align=\"center\"><table border = '1'>";
                                                    echo "<tr> ";
                                                    echo "<td><b>Habitacion</b></td>";
                                                    echo "<td><b>Tipo</b></td> ";
                                                    echo "<td><b>Categoria</b></td>";
                                                    echo "</tr> ";

                                                    while($row = mysql_fetch_array($resultados)) 
                                                    { 
                                                        echo "<td>".$row["Habitacion"]."</td>";
                                                        echo "<td>".$row["Tipo"]."</td> ";
                                                        echo "<td>".$row["Categoria"]."</td> ";
                                                        echo "</tr> ";
                                                    }
                                                }
                                            }
                                            else
                                            {
                                                echo '<br>'."<div align=\"center\">Consulta Habitaciones Disponibles Desde:     ".$_POST["fechae"].'<br>';
                                                echo "<div align=\"center\">Consulta Habitaciones Disponibles Hasta:        ".$_POST["fechas"].'<br>';
                                                echo "<div align=\"center\">Categoria de la Habitacion:     ".$_POST["cat"].'<br>';
                                                echo "<div align=\"center\">Tipo de la Habitacion:      ".$_POST["tip"].'<br>';
                                                $consulta = "(SELECT (numero_habitacion) as Habitacion, (tipo) as Tipo, (categoria) as Categoria FROM habitacion WHERE habitacion.tipo = '".$_POST["tip"]."' AND habitacion.categoria = '".$_POST["cat"]."' AND habitacion.numero_habitacion NOT IN (SELECT DISTINCT(numero_habitacion) FROM se_reserva UNION SELECT DISTINCT(numero_habitacion) FROM ocupa WHERE ('".$_POST["fechae"]."' <= ocupa.fecha_llegada AND '".$_POST["fechas"]."' >= ocupa.fecha_llegada) OR ('".$_POST["fechae"]."' <= ocupa.fecha_salida AND '".$_POST["fechas"]."' >= ocupa.fecha_salida) OR ('".$_POST["fechae"]."' >= ocupa.fecha_salida AND '".$_POST["fechas"]."' <= ocupa.fecha_salida))) UNION (SELECT se_reserva.numero_habitacion, tipo, categoria FROM se_reserva, reservacion, habitacion WHERE se_reserva.id = reservacion.id AND se_reserva.numero_habitacion = habitacion.numero_habitacion AND habitacion.tipo = '".$_POST["tip"]."' AND habitacion.categoria = '".$_POST["cat"]."' AND (('".$_POST["fechae"]."' < reservacion.fecha_llegada AND '".$_POST["fechas"]."' < reservacion.fecha_llegada) OR ('".$_POST["fechae"]."' > reservacion.fecha_salida AND '".$_POST["fechas"]."' > reservacion.fecha_salida)))";
                                                $resultados = $db->consultar($consulta);
                                                $num_rows =  mysql_num_rows($resultados);
                                                echo "<br>";
                                                echo "<div align=\"center\"><table border = '1'>";
                                                echo "<tr> ";
                                                echo "<td><b>Habitacion</b></td>";
                                                echo "<td><b>Tipo</b></td> ";
                                                echo "<td><b>Categoria</b></td>";
                                                echo "</tr> ";

                                                while($row = mysql_fetch_array($resultados)) 
                                                { 
                                                    echo "<td>".$row["Habitacion"]."</td>";
                                                    echo "<td>".$row["Tipo"]."</td> ";
                                                    echo "<td>".$row["Categoria"]."</td> ";
                                                    echo "</tr> ";
                                                }
                                           } 
                                        }
                                        else
                                        {
                                            /* CONSULTA 1
                                            --Habitaciones disponibles dado un rango de fecha.
                                            -- Leyenda:
                                            -- fecha_usuario_llegada: el dia en que el usuario ocupara una habitacion.
                                            -- fecha_usuario_salida: el dia que el usuario desocupara la habitacion. */
                                            $consulta = "(SELECT (numero_habitacion) as Habitacion, (tipo) as Tipo, (categoria ) as Categoria FROM habitacion WHERE habitacion.numero_habitacion NOT IN (SELECT DISTINCT(numero_habitacion) FROM se_reserva UNION SELECT DISTINCT(numero_habitacion) FROM ocupa WHERE ('".$_POST["fechae"]."' <= ocupa.fecha_llegada AND '".$_POST["fechas"]."' >= ocupa.fecha_llegada) OR ('".$_POST["fechae"]."' <= ocupa.fecha_salida AND '".$_POST["fechas"]."' >= ocupa.fecha_salida) OR ('".$_POST["fechae"]."' >= ocupa.fecha_salida AND '".$_POST["fechas"]."' <= ocupa.fecha_salida))) UNION (SELECT se_reserva.numero_habitacion, tipo, categoria FROM se_reserva, reservacion, habitacion WHERE se_reserva.id = reservacion.id AND se_reserva.numero_habitacion = habitacion.numero_habitacion AND (('".$_POST["fechae"]."' < reservacion.fecha_llegada AND '".$_POST["fechas"]."' < reservacion.fecha_llegada) OR ('".$_POST["fechae"]."' > reservacion.fecha_salida AND '".$_POST["fechas"]."' > reservacion.fecha_salida)))";
                                            $resultados = $db->consultar($consulta);
                                            echo "<div align=\"center\">Consulta Habitaciones Disponibles Desde".$_POST["fechae"].'<br>';
                                            echo "<div align=\"center\">Consulta Habitaciones Disponibles Hasta ".$_POST["fechas"].'<br>';
                                            echo "<div align=\"center\"><table border = '1'>";
                                            echo "<br>";
                                            echo "<table border = '1'>";
                                            echo "<tr> ";
                                            echo "<td><b>Habitacion</b></td>";
                                            echo "<td><b>Tipo</b></td> ";
                                            echo "<td><b>Categoria</b></td>";
                                            echo "</tr> ";
                                            while($row = mysql_fetch_array($resultados)) 
                                            { 
                                                    echo "<td>".$row["Habitacion"]."</td>";
                                                    echo "<td>".$row["Tipo"]."</td> ";
                                                    echo "<td>".$row["Categoria"]."</td> ";
                                                    echo "</tr> ";
                                            }
                                        }  
                                    }
                                    else
                                    {
                                        ?>
                                        <script>alert("Selecciona Una Fecha");</script>
                                       <?php
                                    }
                                    
                                    
                                    

                                   
                           ?>
                            
                            
			</div>
		</div>
	</div>


