<?php
  require "db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<?php 
		global $id;
		require_once "functions/functions.php";
		$title = "Редактирование статьи";
		require_once "blocks/head.php"; 
	?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
	<?php 
		require_once "blocks/header.php"; 
	?>

    <?php
    $id = $_GET['id'];
    $data = $_POST;
    $news = R::load('news', $id);

    // include_once("db.php");
    // $result = mysql_query("  SELECT title,text,date,time,author FROM news
    //                      WHERE id='$id'   
    //                       ");

    // mysqli_fetch_assoc($news);

        if (isset($data['edit']))
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
              $editstat = R::load('news', $id);
              $editstat->title = $data['title'];
              $editstat->intro_text = $data['intro_text'];
              $editstat->full_text = $data['full_text'];
              R::store($editstat);
              echo '<div style="color: green;">Вы изменили статью!</div>';
          }
          else
          {
              echo '<div style="color: red;">'.array_shift($errors).'</div>';
          } 
      }
    ?>
	<form method="POST" action="editstat.php?id=<?php echo $id; ?>">
  <div id="wrapper">
    <div id="leftCol">      
    <input type="text" name="title" value="<?php echo @$news['title']?>" placeholder="Введите статью" /><br />
    <textarea cols="40" rows="10" type="text" name="intro_text" placeholder="Введите вступительное описание для статьи"><?php echo @$news['intro_text']?></textarea><br />
    <textarea cols="40" rows="10" type="text" name="full_text" placeholder="Введите полное описание для статьи"><?php echo @$news['full_text']?></textarea><br /><br />
    <div id="messageShow"></div>
    <input type="submit" name="edit" id="edit" value="Изменить" />
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