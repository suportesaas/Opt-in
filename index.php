<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php ini_set('session.use_cookies', '0'); ?>
	<title>
		Teste Opt-in
	</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<?php include "navbar.php"; ?>
<div class="col-md-4"> </div>
<div class="col-md-4">
<div class="humbnail center well well-small text-center">
	<form action="cadastrar.php" class="form-group" method="POST">
		<h4>Cadastre-se Aqui para receber nossas newsletter</h4>
		<input type="text" name="name" placeholder="Digite Seu nome" required>
		<input type="email" name="email" placeholder="Digite aqui seu e-mail" required>
		<input type="submit" value="Cadastrar" class="btn btn-info btn-lg">
	</form>
	</div>
<div class="col-md-4"> </div>
</div>
</body>
</html>