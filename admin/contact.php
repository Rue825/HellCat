<?php
  require "db.php";
?>
<!DOCTYPE HTML>
<html>
<head>
	<?php
		$title = "Обратная связь";
		require_once "blocks/head.php"; 
	?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script>
		$(document).ready (function () {
			$("#done").click (function () {
				$('#messageShow').hide ();
				var name = $("#name").val ();
				var email = $("#email").val ();
				var subject = $("#subject").val ();
				var message = $("#message").val ();
				var fail = "";
				if (name.length < 3) fail = "Имя не меньше 3 символов";
				else if (email.split ('@').length - 1 == 0 || email.split('.').length - 1 == 0)
					fail = "Вы ввели некорректный email";
				else if (subject.length < 5)
					fail = "Тема сообщения не менее 5 символов";
				else if (message.length < 20)
					fail = "Сообщение не менее 20 символов";
				if (fail != "") {
					$('#messageShow').html (fail + "<div class='clear'><br></div>");
					$('#messageShow').show ();
					return false;
				}
				$.ajax ({
					url: '/ajax/feedback.php',
					type: 'POST',
					cache: false,
					data: {'name': name, 'email': email, 'subject': subject, 'message': message},
					dataType: 'html',
					success: function (data) {
						$('#messageShow').html (data + "<div class='clear'><br></div>");
						$('#messageShow').show ();
					}
				});
			});
		});
	</script>
</head>
	<body class="is-preload">

		<!-- Header -->
		<?php
			require_once "blocks/header.php"; 
		?>

 		<section id="five" class="main style4 left dark fullscreen">
  			<div class="content box style4">
				<header>
					<h2>Обратная связь</h2>
					<p>Здесь вы можете оставить свое имя и Email для того, чтобы связаться с разработчиком.</p>
				</header>
 					<input type="text" placeholder="Имя" id="name" name="name"> <br/>
 					<input type="text" placeholder="Email" id="email" name="email"> <br/>
 					<input type="text" placeholder="Тема сообщения" id="subject" name="subject"> <br/>
 					<textarea name="message" id="message" placeholder="Введите сюда ваше сообщение"></textarea> <br/>
 					<div id="messageShow"></div>
 				<input type="button" name="done" id="done" value="Отправить"><br/>
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