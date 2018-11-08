<?php
  require "db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<?php 
		global $id;
		require_once "functions/functions.php";
		$title = "Удаление статьи";
		require_once "blocks/head.php"; 
	?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
	<?php 
		require_once "blocks/header.php"; 
	?>
  <div id="wrapper">
    <div id="leftCol">
      <?php
        $id = $_GET['id'];
        $news = R::load('news', $id);
        $deletestat = R::load('news', $id);
        R::trash($deletestat);
        echo '<div style="color: green;">Вы удалили статью!</div>';  
      ?>
      <a href="/">
      <input type="button" style="cursor: pointer; float: left; margin-left:0%; width: 220px" value="Вернуться на главную"/>
      </a>
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