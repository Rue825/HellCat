<?php
  require "db.php";
?>
<!DOCTYPE HTML>
<html>
	<?php
		global $id;
		require_once "functions/functions.php";
		$title = "Фотогалерея";
		require_once "blocks/head.php"; 
		$foto = getFoto($id);
	?>
	<body class="is-preload">

		<!-- Header -->
		<?php
			require_once "blocks/header.php"; 
		?>
	<section id="four" class="main style4 left dark fullscreen">
		<!-- Work -->

	<div class="content">
		<header>
			<h2 style="text-align: center">Фотогалерея драконов</h2>
			<p style="text-align: center">Здесь Вы можете рассмотреть различные фотографии драконов.</p>
		</header>
		<!-- Gallery  -->
			<div class="gallery">
			<?php
				$fotogallery_1 = R::findAll('fotogallery', "mod(id,2)=0 ORDER BY `id` DESC"); 
					foreach ($fotogallery_1 as $fotogallerys_1) 
					{
						if ($fotogallerys_1['date_edit'] == "0000-00-00")
						{
							$fotogallerys_1['date_edit'] = "";
						}
						if ($fotogallerys_1['time_edit'] == "00:00:00")
						{
							$fotogallerys_1['time_edit'] = "";
						}
						echo '<article class="from-right">
							<a href="images/fulls/'.$fotogallerys_1['id'].'.jpg" class="image fit"><img src="images/thumbs/'.$fotogallerys_1['id'].'.jpg" \
							title="'.$fotogallerys_1['title_foto'].' '.$fotogallerys_1['intro_foto'].' Добавлено: '.$fotogallerys_1['date_add'].' / '.$fotogallerys_1['time_add'].', изменено: '.$fotogallerys_1['date_edit'].' / '.$fotogallerys_1['time_edit'].'" alt="" /></a>
							</article>
							';
					}
				$fotogallery_2 = R::findAll('fotogallery', "mod(id,2)=1 ORDER BY `id` DESC"); 
					foreach ($fotogallery_2 as $fotogallerys_2) 
					{
						if ($fotogallerys_2['date_edit'] == "0000-00-00")
						{
							$fotogallerys_2['date_edit'] = "";
						}
						if ($fotogallerys_2['time_edit'] == "00:00:00")
						{
							$fotogallerys_2['time_edit'] = "";
						}
						echo '<article class="from-left">
							<a href="images/fulls/'.$fotogallerys_2['id'].'.jpg" class="image fit"><img src="images/thumbs/'.$fotogallerys_2['id'].'.jpg" \
							title="'.$fotogallerys_2['title_foto'].' '.$fotogallerys_2['intro_foto'].' Добавлено: '.$fotogallerys_2['date_add'].' / '.$fotogallerys_2['time_add'].', изменено: '.$fotogallerys_2['date_edit'].' / '.$fotogallerys_2['time_edit'].'" alt="" /></a>
							</article>
							';
					}
			?>
			</div>
		</div>
	</section>
	<section id="one" class="main style1 right dark fullscreen">
		<div class="content box style1">
			<p>Управление фотографиями</p>
			<table class="table" width="50%" cellpadding="5" style="text-align: left;">
				<th>Код</th>
				<th>Название фотографии</th>
				<th>Описание фотографии</th>		
			<?php
			$fotogallery_3 = R::findAll('fotogallery'); ?>	
			<?php foreach ($fotogallery_3 as $fotogallerys_3): ?>
				<h2>
					<tr>
						<td><?= $fotogallerys_3->id; ?></td>
						<td><?= $fotogallerys_3->title_foto; ?></td>
						<td><?= $fotogallerys_3->intro_foto; ?></td>
						<td><?php echo '<a href="/admin/editfoto.php?id='.$fotogallerys_3["id"].'" style="color:black">Изменить</a>'; ?></td>
						<td><?php echo '<a href="/admin/deletefoto.php?id='.$fotogallerys_3["id"].'" style="color:black">Удалить</a>'; ?></td>
					</tr>
				</h2>
			<?php endforeach; ?>
			</table>
			<?php 
			  	echo '<a href="/admin/addfoto.php" style="color:white">
					  <input type="submit" value="Добавить фотографию" />
				      </a>
	    			 ';
		    ?>
		</div>
	</section>
					
<!-- 				<article class="from-right">
					<a href="images/fulls/08.jpg" class="image fit"><img src="images/thumbs/08.jpg" title="Белый дракон" alt="" /></a>
				</article>
				<article class="from-left">
					<a href="images/fulls/09.jpg" class="image fit"><img src="images/thumbs/09.jpg" title="Черный дракон с узорами" alt="" /></a>
				</article>
				<article class="from-right">
					<a href="images/fulls/10.jpg" class="image fit"><img src="images/thumbs/10.jpg" title="Дракон на фоне заката" alt="" /></a>
				</article>
				<article class="from-left">
					<a href="images/fulls/11.jpg" class="image fit"><img src="images/thumbs/11.jpg" title="Красный дракон" alt="" /></a>
				</article>
				<article class="from-right">
					<a href="images/fulls/12.jpg" class="image fit"><img src="images/thumbs/12.jpg" title="Маленький огненный дракон" alt="" /></a>
				</article>
				<article class="from-left">
					<a href="images/fulls/13.jpg" class="image fit"><img src="images/thumbs/13.jpg" title="Древний дракон" alt="" /></a>
				</article>
				<article class="from-right">
					<a href="images/fulls/14.jpg" class="image fit"><img src="images/thumbs/14.jpg" title="Дракон-хищник" alt="" /></a>
				</article>
				<article class="from-left">
					<a href="images/fulls/15.jpg" class="image fit"><img src="images/thumbs/15.jpg" title="Черный дракон с красными крыльями и узорами" alt="" /></a>
				</article>
				<article class="from-right">
					<a href="images/fulls/16.jpg" class="image fit"><img src="images/thumbs/16.jpg" title="Маленький ледяной дракон" alt="" /></a>
				</article>
				<article class="from-left">
					<a href="images/fulls/17.jpg" class="image fit"><img src="images/thumbs/17.jpg" title="Драконы" alt="" /></a>
				</article> -->

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