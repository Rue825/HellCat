<footer id="footer">
	<!-- Icons -->
		<ul class="icons">
<!-- 			<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
			<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
			<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
			<li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
			<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
			<li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li> -->
			<li><a href="https://vk.com/counterspy" class="icon fa-vk"><span class="label">ВКонтакте</span></a></li>
		</ul>
	<!-- Menu -->
		<ul class="menu">
			<li>&copy; HellCat</li><li>by: Sergei. Все права защищены.</li>
			<span id="doc_time"></span>
		</ul>
</footer>
<script type="text/javascript">
	function clock() {
	var d = new Date();
	var month_num = d.getMonth()
	var day = d.getDate();
	var hours = d.getHours();
	var minutes = d.getMinutes();
	var seconds = d.getSeconds();

	month=new Array("января", "февраля", "марта", "апреля", "мая", "июня",
	"июля", "августа", "сентября", "октября", "ноября", "декабря");

	if (day <= 9) day = "0" + day;
	if (hours <= 9) hours = "0" + hours;
	if (minutes <= 9) minutes = "0" + minutes;
	if (seconds <= 9) seconds = "0" + seconds;

	date_time = " " + day + " " + month[month_num] + " " + d.getFullYear() +
	" г.&nbsp;Текущее время: "+ hours + ":" + minutes + ":" + seconds;
	if (document.layers) {
	 document.layers.doc_time.document.write(date_time);
	 document.layers.doc_time.document.close();
	}
	else document.getElementById("doc_time").innerHTML = date_time;
	 setTimeout("clock()", 1000);
	}
</script>
<script> 
	clock() 
</script>