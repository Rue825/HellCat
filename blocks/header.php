<header>
	<div id="logo">
		<a href="/" title="Перейти на главную">
			<span>Н</span>овости
		</a>
	</div>
	<div id="menuHead">
		<a href="/about.php">
			<div style="margin-right: 5%">О нас</div>
		</a>
		<a href="/feedback.php">
			<div>Обратная связь</div>
		</a> 
	</div>
	<div id="regAuth">
		<?php if (isset($_SESSION['logged_user'])): ?>
			Привет, <?php echo $_SESSION['logged_user']->login; ?>!
		<a href="/logout.php">Выйти</a>
		<?php else : ?>
		<a href="/auth.php">Войти</a>
	<?php endif; ?>
	</div>
</header>