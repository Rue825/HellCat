<?php
  require "db.php";
?>
<!DOCTYPE html>
<html>
<head>     
      <?php 
            global $id;
            require_once "functions/functions.php";
            $title = "Редактирование пользователя";
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
      $users = R::load('users', $id);

      // include_once("db.php");
      // $result = mysql_query("  SELECT title,text,date,time,author FROM news
      //                      WHERE id='$id'   
      //                       ");

      // mysqli_fetch_assoc($news);

      if (isset($data['edit']))
      {
          //Изменяем описание фотографии
          $errors = array();
          if(trim($data['login']) == '')
          {
            $errors[] = 'Введите название для картинки!';
          }      

          if(trim($data['email']) == '')
          {
            $errors[] = 'Введите краткое описание для картинки!';
          }
          if (trim($users['id'])==2 || ['auth_key']!=1) 
          {
            $errors[] = 'Нельзя редактировать администратора!';
          }
      if(empty($errors))
          {
          //Всё хорошо, изменяем описание фотографии
              $editusers = R::load('users', $id);
              $editusers->login = $data['login'];
              $editusers->email = $data['email'];
              $editusers->auth_key = $data['auth_key'];
              R::store($editusers);
              echo '<div style="color: green;">Вы изменили данные о пользователе!</div>';
          }
          else
          {
              echo '<div style="color: red;">'.array_shift($errors).'</div>';
          } 
      }
      ?>
  <form method="POST" action="/admin/editusers.php?id=<?php echo $id; ?>">
  <div id="wrapper">
    <div id="leftCol">      
    <input type="text" name="login" value="<?php echo @$users['login']?>" placeholder="Введите логин" /><br />
    <input type="text" name="email" value="<?php echo @$users['email']?>" placeholder="Введите электронную почту" /><br />
    <select name="auth_key" id="auth_key">
     <option ><?php echo @$users['auth_key']?></option>
       <?php if (($users['auth_key'])==1): ?>
       <option>0</option>
       <?php else: ?>
       <option>1</option>
       <?php endif; ?>
    </select><br />
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