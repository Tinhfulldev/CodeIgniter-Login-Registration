<div id="container">
	<h1>Welcome to registration.</h1>

	<div id="body">
		<?php if(!isset($succsses)): ?>
			<?php if(isset($character)): ?>
				<?= validation_errors() ?>
				<?= form_open('home/process') ?>
					<input type="hidden" name="username" value="<?= trim($character) ?>" />

					Username:<br />
					<input type="text" disabled="disabled" name="showuser" value="<?= trim($character) ?>" /><br />
					Password:<br />
					<input type="password" name="password" /><br />
					Repeat Password:<br />
					<input type="password" name="repeat_pass" /><br />
					PIN: (please provide numerical PIN number for reseting access to your account)<br />
					<input type="text" name="pin" /><br /><br />

					<input type="submit" name="submit" value="Register" />
				</form>
			<?php elseif (isset($unknown)): ?>
				<?= $unknown ?>
			<?php endif; ?>
		<?php else: ?>
			<?= $succsses ?>
		<?php endif; ?>
		<?= anchor('home', 'Home') ?>
		<?= anchor('home/login', 'Login') ?>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>