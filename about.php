<?php
  require "db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<?php 
		global $id;
		require_once "functions/functions.php";
		$title = "Информация о нас";
		require_once "blocks/head.php"; 
	?>
</head>
<body>
	<?php 
		require_once "blocks/header.php"; 
	?>
  <section id="seven" class="main style1 right dark fullscreen">
		<div class="content box style1">
			<h1>Информация о нас</h1>
			<p>Сайт информационного портала о драконах. Разработал студент группы И-2-15 Жуйков Сергей</p>	
			<div style="overflow: hidden; height: 250px;"><img src="img/flydragon.gif" align="middle" width="254" height="264" /></div>			
		</div>
	</section>
      <?php 
        require_once "blocks/footer.php"; 
      ?>
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/jquery.poptrox.min.js"></script>
      <script src="assets/js/jquery.scrolly.min.js"></script>
      <script src="assets/js/jquery.scrollex.min.js"></script>
      <script src="assets/js/browser.min.js"></script>
      <script src="assets/js/breakpoints.min.js"></script>
      <script src="assets/js/util.js"></script>
      <script src="assets/js/main.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
      <script src="js/index.js"></script>    
</body>
</html>