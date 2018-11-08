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
	<form method="POST" action="addstat.php">
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

        	if(trim($data['intro_text']) == '')
        	{
        	  $errors[] = 'Введите вступительную статью!';
        	}

        	if(trim($data['full_text']) == '')
        	{
        	  $errors[] = 'Введите полное описание для статьи!';
        	}

 			if(empty($errors))
        	{
        	//Всё хорошо, создаем статью
       	   	  $addstat = R::dispense('news');
          	  $addstat->title = $data['title'];
          	  $addstat->intro_text = $data['intro_text'];
          	  $addstat->full_text = $data['full_text'];
          	  R::store($addstat);
          	  echo '<div style="color: green;">Вы добавили статью!</div>';
          	  $data['title'] ='';
          	  $data['intro_text'] ='';
          	  $data['full_text'] ='';

        	}
        	else
        	{
          	  echo '<div style="color: red;">'.array_shift($errors).'</div>';
        	}	
    	}
		?>
 	<div id="wrapper">
 		<div id="leftCol">			
		<input type="text" name="title" value="<?php echo @$data['title']?>" placeholder="Введите статью" /><br />
		<textarea cols="40" rows="10" type="text" name="intro_text" placeholder="Введите вступительное описание для статьи"><?php echo @$data['intro_text']?></textarea><br />
		<textarea cols="40" rows="10" type="text" name="full_text" placeholder="Введите полное описание для статьи"><?php echo @$data['full_text']?></textarea><br /><br />
		<div id="messageShow"></div>
		<input type="submit" name="add" id="add" value="Добавить" />
	</form>
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