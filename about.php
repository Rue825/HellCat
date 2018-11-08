<?php
  require "db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<?php 
		$title = "Информация о нас";
		require_once "blocks/head.php"; 
	?>
</head>
<body>
	<?php 
		require_once "blocks/header.php"; 
	?>
 	<div id="wrapper">
 		<div id="leftCol">
 			<div id="about_us">
 				<h2>Информация о нас</h2>
 				<p>В Японии, Корее и Китае драконы считались одними из основных мифологических героев. Граждане этих стран свято верят в то, что когда-то давно эти существа действительно жили бок о бок с людьми...</p>
 			</div>
 		</div>
 		<?php 
 			require_once "blocks/rightCol.php"; 
 		?>
 	</div>
 	<?php 
 		require_once "blocks/footer.php"; 
 	?>
</body>
</html>