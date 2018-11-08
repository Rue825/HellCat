<?php
  require "db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<?php 
		global $id;
		require_once "functions/functions.php";
		$title = "Новости обо всем";
		require_once "blocks/head.php"; 
		$news = getNews (3, $id);
	?>
</head>
<body>
	<?php 
		require_once "blocks/header.php"; 
	?>
 	<div id="wrapper">
 		<div id="leftCol">

 			<?php
 				for ($i = 0; $i < count ($news); $i++ ) {
 					if($i == 0)
 					{
 						echo "<div id=\"bigArticle\">";
 					}
 					else {
 						echo "<div class=\"article\">";
 					}
 				if ((isset($_SESSION['logged_user']) && ($_SESSION['logged_user']['auth_key']==1)))
 				{
 					echo '<img src="/img/articles/'.$news[$i]["id"].'.jpg" alt="Статья '.$news[$i]["id"].'" title="Статья '.$news[$i]["id"].'">
 				<h2>'.$news[$i]["title"].'</h2>
 				<p>'.$news[$i]["intro_text"].'</p>
 				<a href="/article.php?id='.$news[$i]["id"].'">
 					<div class="more">Далее</div>
 				</a>
 				<a href="/addstat.php">
 					<div class="more" href="addstat.php" style="cursor: pointer; float: left; margin-left:3%; width: 110px">Добавить статью</div>
 				</a>
 				<a href="/editstat.php?id='.$news[$i]["id"].'">
					<div class="more" href="editstat.php" style="cursor: pointer; float: left; margin-left:3%; width: 110px">Редактировать статью</div>
				</a>
				<a href="/deletestat.php?id='.$news[$i]["id"].'">
					<div class="more" href="deletestat.php" style="cursor: pointer; float: left; margin-left:3%; width: 110px">Удалить статью</div>
				</a>
 			</div>';
 			}
 			else
 			{
				echo '<img src="/img/articles/'.$news[$i]["id"].'.jpg" alt="Статья '.$news[$i]["id"].'" title="Статья '.$news[$i]["id"].'">
 				<h2>'.$news[$i]["title"].'</h2>
 				<p>'.$news[$i]["intro_text"].'</p>
 				<a href="/article.php?id='.$news[$i]["id"].'">
 					<div class="more">Далее</div>
 				</a>
 			</div>';
 			}

 				if ($i == 0)
 					echo "<div class=\"clear\"><br></div>";
 				}
 			?>
 		</div>
 		<?php 
 			require_once "blocks/rightCol.php"; 
 		?>
 	</div>
 	<?php 
 		require_once "blocks/footer.php"; 
 	?>
</body>
</html>