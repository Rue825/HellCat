<?php
  require "db.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css'>
<!--   <link rel="stylesheet" href="css/style_avtoriz.css" media="screen" type="text/css" /> -->
  <?php 
    require_once "functions/functions.php";
    $title = "Изменение пароля";
    require_once "blocks/head.php"; 
  ?>
</head>
<body>
  <?php 
    require_once "blocks/header.php"; 
  ?>
  <div id="wrapper">
    <div id="leftCol_1">
     <div class="box">
  <nav id="tabs" class="tabs">
    <a id="tabForgot" class="iconForgot active redBox" title="Изменение пароля"></a>
  </nav>

  <div class="containerWrapper">
  <form action="changepassword.php" method="POST">
    <?php
      $data = $_POST;
      $email = $_REQUEST['email'];
      $code = $_REQUEST['code'];
      $password = getPasswordOnEmail($email);
      if ($password !== $code) {
        header("Location: index.php");
        exit;
      }
      if (isset($data['do_changepass']))
      {
        $errors = array();
        $login = getLoginOnEmail($email);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        if($data['password'] == '')
        {
          $errors[] = 'Введите пароль!';
        }

        if($data['password_2'] != $data['password'])
        {
          $errors[] = 'Введенные пароли не совпадают!';
        }

        if(empty($errors))
        {
          //Всё хорошо, изменяем
          setPassword($login, $password);
          echo '<div style="color: green;">Вы успешно изменили пароль!</div>';
        }

        else
        {
          echo '<div style="color: red;">'.array_shift($errors).'</div>';
        }
      }
      ?>
    <!-- forgot container -->
    <div id="containerForgot" class="tabContainer active">
        <h2 class="loginTitle">Новый пароль</h2>
        <div class="loginContent">
          <div class="inputWrapper">
            <input type="password" name="password" placeholder="Новый пароль" />
          </div>  
          <div class="inputWrapper">
            <input type="password" name="password_2" placeholder="Подтвердите новый пароль" />
          </div>
          <div class="placeholder"></div>
        </div>
        <input type="hidden" name="email" value="<?php echo $email;?>"/>
        <input type="hidden" name="code" value="<?php echo $code;?>"/>
        <button class="redBox" name="do_changepass"><span class="iconForgot"></span> Восстановить</button>
        <div class="clear"></div>
    </div>
  </div>
</div>
</div>
    <?php 
      require_once "blocks/rightCol.php"; 
    ?>
  </div>
  <?php 
    require_once "blocks/footer.php"; 
  ?>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script src="js/index.js"></script>
</body>
</html>