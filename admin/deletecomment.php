<?php
  require "db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<?php 
		global $id;
		require_once "functions/functions.php";
		$title = "Удаление комментария";
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
        $data = $_POST;
        $comment = R::load('comment', $id);
        $deletecomment = R::load('comment', $id);
        R::trash($deletecomment);
        echo '<div style="color: green;">Вы удалили комментарий!</div>';  
      ?>
      <form method="POST" action="/admin/deletecomment.php?id=<?php echo $id; ?>">
      	<a href="article.php?id=<?php echo $_POST['news'] ?>">
	  	<input type="button" name="success" id="success"style="cursor: pointer; float: left; margin-left:0%" value="Вернуться назад"/>
      	</a>
	  </form>
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