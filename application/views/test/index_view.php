<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Facebook SDK4</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
	<style>
		body {
			margin: 100px auto;
			width: 400px;
			text-align: center;
		}
	</style>
</head>
<body>
	<h2>PHP Facebook SDK v4</h2>

	<?php if (!isset($_SESSION['facebook'])): ?>
		<a href="<?php echo $this->fb->helper->getLoginUrl($this->fb->get_scopes()); ?>" class="btn btn-primary">Iniciar sesión con Facebook!</a>
	<?php else: ?>
		<p>
			Bienvenido, <?php echo $this->fb->me->getName(); ?>
		</p>
                <a href="<?php echo base_url("login/cerrar_session"); ?>" class="btn btn-danger">Cerrar sesión</a>
	<?php endif; ?>
</body>
</html>