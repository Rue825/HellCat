<?php
  require "db.php";
?>
<!DOCTYPE html>
<html>
<head>     
      <?php 
            global $id;
            require_once "functions/functions.php";
            $title = "Редактирование фотографии";
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
      $fotogallery = R::load('fotogallery', $id);

      // include_once("db.php");
      // $result = mysql_query("  SELECT title,text,date,time,author FROM news
      //                      WHERE id='$id'   
      //                       ");

      // mysqli_fetch_assoc($news);

      if (isset($data['edit']))
      {
          //Изменяем описание фотографии
          $errors = array();
          if(trim($data['title_foto']) == '')
          {
            $errors[] = 'Введите название для картинки!';
          }      

          if(trim($data['intro_foto']) == '')
          {
            $errors[] = 'Введите краткое описание для картинки!';
          }

      if(empty($errors))
          {
          //Всё хорошо, изменяем описание фотографии
              $editfoto = R::load('fotogallery', $id);
              $editfoto->title_foto = $data['title_foto'];
              $editfoto->date_edit = $data['date_edit'];
              $editfoto->time_edit = $data['time_edit'];
              $editfoto->intro_foto = $data['intro_foto'];
              R::store($editfoto);
              echo '<div style="color: green;">Вы изменили описание картинки!</div>';
          }
          else
          {
              echo '<div style="color: red;">'.array_shift($errors).'</div>';
          } 
      }
      ?>
  <form method="POST" action="/admin/editfoto.php?id=<?php echo $id; ?>">
  <div id="wrapper">
    <div id="leftCol">      
    <input type="text" name="title_foto" value="<?php echo @$fotogallery['title_foto']?>" placeholder="Введите описание для картинки" /><br />
    <input type="hidden" name="date_edit" value="<?php echo date('Y-m-d');?>" />
    <input type="hidden" name="time_edit" value="<?php echo date('H:i:s');?>" />
    <textarea cols="40" rows="10" type="text" name="intro_foto" placeholder="Введите краткое описание для картинки"><?php echo @$fotogallery['intro_foto']?></textarea><br />
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