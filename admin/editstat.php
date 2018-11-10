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
<section id="one" class="main style4 right dark fullscreen">
      <div class="content box style4">
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
          //Изменяем статью
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

      if(empty($errors))
          {
          //Всё хорошо, изменяем статью
              $editstat = R::load('news', $id);
              $editstat->title = $data['title'];
              $editstat->date_edit = $data['date_edit'];
              $editstat->time_edit = $data['time_edit'];
              $editstat->author = $data['author'];
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
  <form method="POST" action="/admin/editstat.php?id=<?php echo $id; ?>">
  <div id="wrapper">
    <div id="leftCol">      
    <input type="text" name="title" value="<?php echo @$news['title']?>" placeholder="Введите статью" /><br />
    <input type="hidden" name="date_edit" value="<?php echo date('Y-m-d');?>" />
    <input type="hidden" name="time_edit" value="<?php echo date('H:i:s');?>" />
    <input type="text" name="author" value="<?php echo @$news['author']?>" placeholder="Введите автора" /><br />
    <textarea cols="40" rows="10" type="text" name="intro_text" placeholder="Введите вступительное описание для статьи"><?php echo @$news['intro_text']?></textarea><br />
    <textarea cols="40" rows="10" type="text" name="full_text" placeholder="Введите полное описание для статьи"><?php echo @$news['full_text']?></textarea><br /><br />
    <input type="submit" name="edit" id="edit" value="Изменить" />
  </form>
    </div>   
  </section>
</div>
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