<header id="header">
	
<h1><a href="/" title="Переход на главную страницу"> <img src="img/logo.jpg" class="setting" title="Переход на главную страницу">HellCat by Sergei</a></h1>
<!-- <div class="toggle">
		<i class="fa fa-bars menu" aria-hidden="true"></i>
</div>  -->
	<nav>
		<ul>		
			<li><a href="/admin/settingusers.php">Управление данными о пользователях</a></li>
			<li><a href="/admin/fotogallery.php">Фотогалерея</a></li>
			<li><a href="/admin/contact.php">Обратная связь</a></li>
			<?php if (isset($_SESSION['logged_user'])): ?>
			<li>Привет, <?php echo $_SESSION['logged_user']->login; ?>! </li>
				<li><a href="/logout.php">Выйти</a></li>
			<?php else : ?>
				<li><a href="/auth.php">Войти</a></li>
			<?php endif; ?>
		</ul>
	</nav>
<!-- <script src="http://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.menu').click(function(){
				$('ul').toggleClass('active');
			})
		})
</script> -->
</header>