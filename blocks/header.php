<header id="header">
<h1><a href="/" title="Переход на главную страницу"><img src="img/logo.jpg" class="setting" title="Переход на главную страницу">HellCat by Sergei</a></h1>
	<nav>
		<ul>
			<?php if (isset($_SESSION['logged_user']) && ($_SESSION['logged_user']['auth_key']==1))
			echo '<li><a href="/admin/adminpanel.php">Перейти в режим админки</a></li>';
			?>
			<li><a href="/fotogallery.php">Фотогалерея</a></li>
			<li><a href="/about.php">Информация о нас</a>
			<li><a href="/contact.php">Обратная связь</a></li>
			<?php if (isset($_SESSION['logged_user'])): ?>
				Привет, <?php echo $_SESSION['logged_user']->login; ?>!
				<li><a href="/logout.php">Выйти</a></li>
			<?php else : ?>
				<li><a href="/auth.php">Войти</a></li>
			<?php endif; ?>
		</ul>
	</nav>
</header>