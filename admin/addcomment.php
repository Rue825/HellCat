<?php
  require "db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<?php 
		global $id;
		require_once "functions/functions.php";
		$title = "Добавление комментария";
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
      $data = $_POST;
        if (isset($data['add']))
            {
              //Создаем комментарий
              $errors = array();
              if(trim($data['name']) == '')
              {
                $errors[] = 'Введите имя!';
              }

              if(trim($data['email']) == '')
              {
                $errors[] = 'Введите почту!';
              }           

              if(trim($data['message']) == '')
              {
                $errors[] = 'Введите сообщение!';
              }
              if(R::count('comment', "time_add = ?", array($data['time_add'])) > 0 )
              {
                $errors[] = 'Вы уже добавили комментарий!';
              }

          if(empty($errors))
              {
              //Всё хорошо, создаем комментарий
                  $addcomment = R::dispense('comment');
                  $addcomment->date_add = $data['date_add'];
                  $addcomment->time_add = $data['time_add'];
                  $addcomment->name = $data['name'];
                  $addcomment->email = $data['email'];
                  $addcomment->message = $data['message'];
                  R::store($addcomment);
                  echo '<div style="color: green;">Вы добавили комментарий!</div>';
                  $data['name'] ='';
                  $data['email'] ='';
                  $data['message'] ='';
              }
              else
              {
                  echo '<div style="color: red;">'.array_shift($errors).'</div>';
              } 
          }   
      ?>
	  <form method="POST" action="/admin/addcomment.php">   
        <input type="hidden" name="date_add" value="<?php echo date("Y-m-d");?>" />
        <input type="hidden" name="time_add" value="<?php echo date("H:i:s");?>" />
        <input type="text" name="name" value="<?php echo @$data['name']?>" placeholder="Введите имя" /><br />
        <input type="text" name="email" value="<?php echo @$data['email']?>" placeholder="Введите почту" /><br />
        <textarea cols="40" rows="10" type="text" name="message" placeholder="Введите сообщение..."><?php echo @$data['message']?></textarea><br />
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