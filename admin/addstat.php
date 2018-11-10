<?php
  require "db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<?php 
		global $id;
		require_once "functions/functions.php";
		$title = "Добавление статьи";
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
        	//Создаем статью
        	$errors = array();
        	if(trim($data['title']) == '')
        	{
        	  $errors[] = 'Введите статью!';
        	}

          if(trim($data['author']) == '')
          {
            $errors[] = 'Введите автора!';
          }          

        	if(trim($data['intro_text']) == '')
        	{
        	  $errors[] = 'Введите вступительную статью!';
        	}

        	if(trim($data['full_text']) == '')
        	{
        	  $errors[] = 'Введите полное описание для статьи!';
        	}
          if(R::count('news', "time_add = ?", array($data['time_add'])) > 0 )
          {
            $errors[] = 'Вы уже добавили статью!';
          }

 			if(empty($errors))
        	{
        	//Всё хорошо, создаем статью
       	   	  $addstat = R::dispense('news');
          	  $addstat->title = $data['title'];
              $addstat->date_add = $data['date_add'];
              $addstat->time_add = $data['time_add'];
              $addstat->author = $data['author'];
          	  $addstat->intro_text = $data['intro_text'];
          	  $addstat->full_text = $data['full_text'];
          	  R::store($addstat);
          	  echo '<div style="color: green;">Вы добавили статью!</div>';
          	  $data['title'] ='';
          	  $data['author'] ='';
          	  $data['intro_text'] ='';
          	  $data['full_text'] ='';
        	}
        	else
        	{
          	  echo '<div style="color: red;">'.array_shift($errors).'</div>';
        	}	
    	}
		?>
  <form method="POST" action="/admin/addstat.php">
    <div id="wrapper">
    <div id="leftCol">      
    <input type="text" name="title" value="<?php echo @$data['title']?>" placeholder="Введите статью" /><br />
    <input type="hidden" name="date_add" value="<?php echo date('Y-m-d');?>" />
    <input type="hidden" name="time_add" value="<?php echo date('H:i:s');?>" />
    <input type="text" name="author" value="<?php echo @$data['author']?>" placeholder="Введите автора" /><br />
    <textarea cols="40" rows="10" type="text" name="intro_text" placeholder="Введите вступительное описание для статьи"><?php echo @$data['intro_text']?></textarea><br />
    <textarea cols="40" rows="10" type="text" name="full_text" placeholder="Введите полное описание для статьи"><?php echo @$data['full_text']?></textarea><br /><br />
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