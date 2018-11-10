<?php
  require "db.php";
?>
<!DOCTYPE HTML>
<html>
	<?php
		global $id;
		global $id_s;
		require_once "functions/functions.php";
		$news = getNews (1, $_GET["id"]);
		$title = $news["title"];


		require_once "blocks/head.php";
	?>
	<body class="is-preload">

		<!-- Header -->
		<?php
			require_once "blocks/header.php"; 
		?>

		<!-- One -->
<!-- 		<section id="one" class="main style4 right dark fullscreen">
			<div class="content box style4">
				<img src="img/9.jpg" width="70%" height="70%">
				<header>
					<h2>What I Do</h2>
				</header>
				<p>Lorem ipsum dolor sit amet et sapien sed elementum egestas dolore condimentum.
				Fusce blandit ultrices sapien, in accumsan orci rhoncus eu. Sed sodales venenatis arcu,
				id varius justo euismod in. Curabitur egestas consectetur magna.</p>
			</div>
		</section>		 -->
		<section id="one" class="main style4 right dark fullscreen">
		<div class="content box style4">		
	    <?php
	    	$data = $_POST;
	    	if ($news['date_edit'] == "0000-00-00")
 			{
 				$news['date_edit'] = "";
 			}
 			if ($news['time_edit'] == "00:00:00")
 			{
 				$news['time_edit'] = "";
 			}
 		 	echo '
 					<img src="/img/articles/'.$news["id"].'.jpg" alt="Статья '.$news["id"].'" title="Статья '.$news["id"].'" width="70%" height="70%">
 					<header>
 						<h2>'.$news["title"].'</h2>
 					</header>
 						<p>Дата публикации: '.$news["date_add"].' / '.$news["time_add"].'</p>
 						<p>Дата изменения: '.$news["date_edit"].' / '.$news["time_edit"].'</p>
 						<p>Автор: '.$news["author"].'</p>
 						<p>'.$news["full_text"].'</p>
 						<hr/>
 						<p>Последние комментарии:</p>
 						<hr/>
 				';


 			$comment = R::findAll('comment', "ORDER BY `id` DESC"); 
 			foreach ($comment as $comments) 
 			{ 
 				if ((isset($_SESSION['logged_user']) && ($_SESSION['logged_user']['auth_key']==1)))
 				{
 					echo '<form method="POST" action="/admin/deletecomment.php?id='.$comments["id"].'">
 						  <p>Дата создания: '.$comments['date_add'].' / '.$comments['time_add'].'</p>
 						  <p>Автор: '.$comments['name'].', почта: ' .$comments['email'].'</p>
 						  <p>'.$comments['message'].'</p>
 						  <a href="/admin/deletecomment.php?id='.$comments["id"].'" style="color:white">
						  <input type="submit" value="Удалить" />
						  <input type="hidden" name="news" value="'.$news["id"].'"/>
						  </a><hr/>
						  </form>
 					';
 				}
 				else
 				{
 					echo '<form method="POST" action="/admin/deletecomment.php?id='.$comments["id"].'">
 						  <p>Дата создания: '.$comments['date_add'].' / '.$comments['time_add'].'</p>
 						  <p>Автор: '.$comments['name'].', почта: ' .$comments['email'].'</p>
 						  <p>'.$comments['message'].'</p>
						  <hr/>
						  </form>
 					';	
 				}
 			}
 			if ((isset($_SESSION['logged_user']) && ($_SESSION['logged_user']['auth_key']==1 || ($_SESSION['logged_user']['auth_key']==0))))
 			{	 	
		    	echo '<a href="/admin/addcomment.php" style="color:white">
		    		 <input type="submit" value="Добавить комментарий" />
		    		 </a>
		    		 <form method="POST" action="/admin/deleteallcomment.php" style="display:inline">
		    		 <a href="/admin/deleteallcomment.php" style="color:white">
		    		 <input type="submit" value="Удалить все комментарии" />
		    		 <input type="hidden" name="news" value="'.$news["id"].'"/>
		    		 </a>
		    		 </form>
		    		 ';
 			}
 			else
 			{
 				echo 'Для того, чтобы добавить комментарий, необходимо <a href="auth.php">авторизоваться.</a>';
 			}
 		?>
 		</div>
 		</section>

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