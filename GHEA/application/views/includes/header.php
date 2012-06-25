<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="es">
<head>
<title>Hoteles GHEA</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta name="description" content="Hoteles GHEA -- Primera prueba"/>
<base href="<?php echo $this->config->item('base_url') ?>" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="layout.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.21.custom.css"/>
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.21.custom.min.js"></script>
<script type="text/javascript">
$(function() 
{
    $( "#checkin" ).datepicker({ dateFormat: "yy-mm-dd" });
});
	
</script>

<script type="text/javascript">
$(function() 
{
    $( "#checkout" ).datepicker({ dateFormat: "yy-mm-dd" });
});
	
</script>

<script src="maxheight.js" type="text/javascript"></script>
<!--[if lt IE 7]>
	<link href="ie_style.css" rel="stylesheet" type="text/css" />
   <script type="text/javascript" src="ie_png.js"></script>
   <script type="text/javascript">
	   ie_png.fix('.png, #header .row-2, #header .nav li a, #content, .gallery li');
   </script>
<![endif]-->

</head>
<body id="page1" onload="new ElementMaxHeight();">
<div id="main">
<!-- header -->
	<div id="header">
		<div class="row-1">
			<div class="wrapper">
				<div class="logo">
					<h1><a href="index.php">GHEA</a></h1>
					<em>Hoteles</em>
					<strong>Comodidad y Lujo</strong>
				</div>
				<div class="phones">
					+58 241 800 00 00<br />
					+58 241 800 00 01
				</div>
			</div>
		</div>
		<div class="row-2">
	 		<div class="indent">
<!-- header-box begin -->
				<div class="header-box">
					<div class="inner">
						<ul class="nav">
					 		<li><a href="index.php" class="current">Principal</a></li>
							<li><a href="index.php\instalaciones\galeria">Instalaciones</a></li>
							<li><a href="index.php\reservacion\reservar">ReservaciÃ³n</a></li>
							<li><a href="index.php\contacto\contact">Contacto</a></li>
                                                        <li><a href="index.php\quienesomos\info">QuiÃ©nes Somos</a></li>
							<li><a href="index.php\ingresar\login">Ingresar</a></li>
						</ul>
					</div>
				</div>
<!-- header-box end -->
			</div>
		</div>
	</div>
        <div class="ic">Nada!</div>