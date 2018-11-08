<?php
  require "db.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="css/style_avtoriz.css" media="screen" type="text/css" />
  <?php 
    require_once "functions/functions.php";
    $title = "Авторизация";
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
    <a id="tabLogin" class="iconLogin active blueBox" title="Войти"></a>
    <a id="tabRegister" class="iconRegister greenBox" title="Регистрация"></a>
    <a id="tabForgot" class="iconForgot redBox" title="Забыл пароль?"></a>
  </nav>

  <div class="containerWrapper">

    <!-- login container -->
    <div id="containerLogin" class="tabContainer active">
    <?php
      $data = $_POST;
      if (isset($data['do_login']))
      {
        $errors = array();
        $user = R::findone('users', 'login = ?', array($data['login']));
        if ($user)
        {
          //Логин существует
          if (password_verify($data['password'], $user->password))
          {
            $_SESSION['logged_user'] = $user;
            header('Location: /');
          }
          else
          {
            $errors[] = 'Неверно введён пароль!';
          }
        }
        else
        {
          $errors[] = 'Пользователь с таким логином не найден!';
        }
        if(!empty($errors))
        {
          echo '<div style="color: red;">'.array_shift($errors).'</div>';
        }
      }
    ?>
  <form action="auth.php" method="POST">    
    <h2 class="loginTitle">Авторизация</h2>
      <div class="loginContent">
        <div class="inputWrapper">
          <input type="text" name="login" placeholder="Логин" value="<?php echo @$data['login']; ?>">
        </div>
        <div class="inputWrapper">
          <input type="password" name="password" placeholder="Пароль">
        </div>
      </div>
      <button class="blueBox" name="do_login"><span class="iconLogin"></span> Войти</button>
      <div class="clear"></div>
    </div>
  </form>
    <!-- register container -->
    <div id="containerRegister" class="tabContainer">
    <?php
      
      $data = $_POST;
      if (isset($data['do_signup']))
      {
        //Регистрируем пользователя
        $errors = array();
        if(trim($data['login']) == '')
        {
          $errors[] = 'Введите логин!';
        }

        if(trim($data['email']) == '')
        {
          $errors[] = 'Введите Email!';
        }

        if($data['password'] == '')
        {
          $errors[] = 'Введите пароль!';
        }

        if($data['password_2'] != $data['password'])
        {
          $errors[] = 'Введенные пароли не совпадают!';
        }

        if(R::count('users', "login = ?", array($data['login'])) > 0 )
        {
          $errors[] = 'Пользователь с таким логином уже существует!';
        }

        if(R::count('users', "email = ?", array($data['email'])) > 0 )
        {
          $errors[] = 'Пользователь с таким Email уже существует!';
        }

        if(empty($errors))
        {
          //Всё хорошо, регистрируем
          $user = R::dispense('users');
          $user->login = $data['login'];
          $user->email = $data['email'];
          $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
          R::store($user);
          echo '<div style="color: green;">Вы успешно зарегистрированы!</div>';
        }

        else
        {
          echo '<div style="color: red;">'.array_shift($errors).'</div>';
        }

      }
    ?>
  <form action="auth.php" method="POST">
      <h2 class="loginTitle">Регистрация</h2>
        <div class="registerContent">
          <div class="inputWrapper">
            <input type="text" name="login" placeholder="Ваше имя" value="<?php echo @$data['login']; ?>">
          </div>
          <div class="inputWrapper">
            <input type="email" name="email" placeholder="Ваш email" value="<?php echo @$data['email']; ?>">
          </div>
          <div class="inputWrapper">
            <input type="password" name="password" placeholder="Ваш пароль" value="<?php echo @$data['password']; ?>">
          </div>
          <div class="inputWrapper">
            <input type="password" name="password_2" placeholder="Повторите ваш пароль" value="<?php echo @$data['password_2']; ?>">
          </div>
        </div>
        <button class="greenBox" name="do_signup"><span class="iconRegister"></span> Зарегистрироваться</button>
      <div class="clear"></div>
    </div>
  </form>
    <!-- forgot container -->
    <div id="containerForgot" class="tabContainer">
    <?php
      
      $data = $_POST;
      if (isset($data['do_forgot']))
      {
        //Регистрируем пользователя
        $errors = array();
        
        if(trim($data['email']) == '')
        {
          $errors[] = 'Введите Email!';
        }

        if(R::count('users', "email = ?", array($data['email'])) > 0 )
        {
        
        }
        else
        {
          $errors[] = 'Пользователь с таким Email не существует!';
        }

        if(empty($errors))
        {
          if (isset($_POST['do_forgot'])) {
            $email = $_POST['email'];
            $code = getPasswordOnEmail($email);
            $link = "http://myhellcat.local/changepassword.php?email=$email&code=$code";
            $subject = "Восстановление пароля";
            $message = "Ссылка на изменение пароля: $link";
            // Отправка
            $subject = "=?utf-8?B?".base64_encode($subject)."?=";
            $headers = "From: $email\r\nReply-to: $email\r\nContent-type: text/html; charset=utf-8\r\n";
            if(mail($_POST['email'], $subject, $message, $headers))
              echo "<p style=color:green>Инструкция отправлена на указанный E-mail<p>";
            else
              echo "<p style=color:red>Сообщение не отправлено<p>";  
          }
        }

        else
        {
          echo '<div style="color: red;">'.array_shift($errors).'</div>';
        }

      }
    ?>
    <form action="auth.php" method="POST">
        <h2 class="loginTitle">Восстановления пароля</h2>
        <div class="loginContent">
          <div class="inputWrapper">
            <input type="text" name="email" placeholder="Ваш email" />
            
          </div>
          <div class="placeholder"></div>
        </div>
        <button class="redBox" name="do_forgot"><span class="iconForgot"></span> Восстановить</button>
        <div class="clear"></div>
    </div>
    </div>
  </div>
</div>
    </form>
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