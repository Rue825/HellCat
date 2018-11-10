<?php
  require "db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<?php 
		global $id;
		require_once "functions/functions.php";
		$title = "Удаление пользователя";
		require_once "blocks/head.php"; 
	?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
	<?php 
		require_once "blocks/header.php"; 
	?>
  <section id="intro" class="main style4 left dark fullscreen">
  <div class="content box style4">
  <div id="wrapper">
    <div id="leftCol">
      <?php
        $id = $_GET['id'];
        $users = R::load('users', $id);
        $deleteusers = R::load('users', $id);
        R::trash($deleteusers);
        echo '<div style="color: green;">Вы удалили пользователя!</div>';  
      ?>
      <a href="/admin/settingusers.php">
      <input type="button" style="cursor: pointer; float: left; margin-left:0%" value="Вернуться на управление данными о пользователях"/>
      </a>
    </div>
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