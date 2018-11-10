<?php
  require "db.php";
?>
<!DOCTYPE HTML>
<html>
	<?php
		global $id;
		require_once "functions/functions.php";
		$title = "Управление сайтом о драконах";
		require_once "blocks/head.php"; 
		$news = getNews (9999, $id);
	?>
	<body class="is-preload">

		<!-- Header -->
		<?php
			require_once "blocks/header.php";
		?>

		<!-- Intro -->
		<?php
			require_once "blocks/intro_section.php";
		?>
		<!-- One -->
			<?php
			if ((isset($_SESSION['logged_user']) && ($_SESSION['logged_user']['auth_key']==1)))
 				{
 				
 				for ($i = 0; $i < count ($news); $i++ ) {
 					if($i == 0)
 					{
 						echo "<section id=\"one\" class=\"main style2 right dark fullscreen\">
 						<div class=\"content box style2\">
 						";
 						// echo "<div id=\"bigArticle\">";
 					}
 					else {
 						echo "<section id=\"two\" class=\"main style2 left dark fullscreen\">
 						<div class=\"content box style2\">
 						";
 						// echo "<div class=\"article\">";
 					}
 				
 					if ($news[$i]['date_edit'] == "0000-00-00")
 					{
 						$news[$i]['date_edit'] = "";
 					}
 					if ($news[$i]['time_edit'] == "00:00:00")
 					{
 						$news[$i]['time_edit'] = "";
 					}
 					echo '<img src="/img/articles/'.$news[$i]["id"].'.jpg" alt="Статья '.$news[$i]["id"].'" title="Статья '.$news[$i]["id"].'" width="45%" height="45%">
 				<h2>'.$news[$i]["title"].'</h2>
 				<p>Дата публикации: '.$news[$i]["date_add"].' / '.$news[$i]["time_add"].', дата изменения: '.$news[$i]["date_edit"].' / '.$news[$i]["time_edit"].'</p>
 				<p>Автор: '.$news[$i]["author"].'</p>
 				<p>'.$news[$i]["intro_text"].'</p>
 				<a href="/admin/article.php?id='.$news[$i]["id"].'" style="color:white">
					<input type="submit" value="Далее" />
 				</a>
 				<a href="/admin/addstat.php" style="color:white">
					<input type="submit" value="Добавить" />
 				</a>
 				<a href="/admin/editstat.php?id='.$news[$i]["id"].'" style="color:white">
					<input type="submit" value="Редактировать" />
				</a>
				<a href="/admin/deletestat.php?id='.$news[$i]["id"].'" style="color:white">
					<input type="submit" value="Удалить" />
				</a>
 			</div>
 	</section>';
 				
 					if ($i == 0)
 						echo "";
 					}
 				}
 				else
 				{
 					echo '<section id="four" class="main style4 left dark fullscreen">
  					<div class="content box style4">
  					<p>Вы не админ!</p>
 					<a href="/" style="color:white">
					<input type="submit" value="Вернуться на главную" />
 					</a>
  					</div>
  					</section>
  					';
 				}
 			?>
<!-- 		<section id="one" class="main style2 right dark fullscreen">
			<div class="content box style2">
				<header>
					<h2>What I Do</h2>
				</header>
				<p>Lorem ipsum dolor sit amet et sapien sed elementum egestas dolore condimentum.
				Fusce blandit ultrices sapien, in accumsan orci rhoncus eu. Sed sodales venenatis arcu,
				id varius justo euismod in. Curabitur egestas consectetur magna.</p>
			</div>
			<a href="#two" class="button style2 down anchored">Next</a>
		</section>
		Two
		<section id="two" class="main style2 left dark fullscreen">
			<div class="content box style2">
				<header>
					<h2>Who I Am</h2>
				</header>
				<p>Lorem ipsum dolor sit amet et sapien sed elementum egestas dolore condimentum.
				Fusce blandit ultrices sapien, in accumsan orci rhoncus eu. Sed sodales venenatis arcu,
				id varius justo euismod in. Curabitur egestas consectetur magna.</p>
			</div>
			<a href="#work" class="button style2 down anchored">Next</a>
		</section>
 -->
		<!-- Footer -->
		<?php
			require_once "blocks/footer.php"; 
		?>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>		
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
	</body>
</html>