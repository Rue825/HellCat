<?php
  require "db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<?php 
		global $id;
		require_once "functions/functions.php";
		$title = "Добавление фотографии";
		require_once "blocks/head.php"; 
	?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
	<?php 
		require_once "blocks/header.php"; 
	?>
  <section id="two" class="main style4 left dark fullscreen">
  <div class="content box style4">
		<?php
		$data = $_POST;
      	if (isset($data['add']))
      	{
        	//Создаем фотографию
        	$errors = array();
        	if(trim($data['title_foto']) == '')
        	{
        	  $errors[] = 'Введите название для картинки!';
        	}      

        	if(trim($data['intro_foto']) == '')
        	{
        	  $errors[] = 'Введите краткое описание для картинки!';
        	}

          if(R::count('fotogallery', "time_add = ?", array($data['time_add'])) > 0 )
          {
            $errors[] = 'Вы уже добавили фотографию!';
          }

 			if(empty($errors))
        	{
        	//Всё хорошо, создаем фотографию
       	   	  $addfoto = R::dispense('fotogallery');
          	  $addfoto->title_foto = $data['title_foto'];
              $addfoto->date_add = $data['date_add'];
              $addfoto->time_add = $data['time_add'];
          	  $addfoto->intro_foto = $data['intro_foto'];
          	  R::store($addfoto);
          	  echo '<div style="color: green;">Вы добавили картинку!</div>';
          	  $data['title_foto'] ='';
          	  $data['intro_foto'] ='';
        	}
        	else
        	{
          	  echo '<div style="color: red;">'.array_shift($errors).'</div>';
        	}	
    	}
		?>
  <form method="POST" action="/admin/addfoto.php">
    <div id="wrapper">
    <div id="leftCol">      
    <input type="text" name="title_foto" value="<?php echo @$data['title_foto']?>" placeholder="Введите название для картинки" /><br />
    <input type="hidden" name="date_add" value="<?php echo date('Y-m-d');?>" />
    <input type="hidden" name="time_add" value="<?php echo date('H:i:s');?>" />
    <textarea cols="40" rows="10" type="text" name="intro_foto" placeholder="Введите краткое описание для картинки"><?php echo @$data['intro_foto']?></textarea><br />
    <input type="submit" name="add" id="add" value="Добавить" />
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