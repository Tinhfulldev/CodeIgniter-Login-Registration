<div id="container">
	<h1>Welcome to Dice!</h1>

	<div id="body">
		<p>This is the home page content that will be pluged in to system.</p>
		<script type="text/javascript">
			CCPEVE.requestTrust('http://localhost/*');
		</script>

		<?= anchor('home/register', 'Register') ?>
		<?= anchor('home/login', 'Login') ?>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>