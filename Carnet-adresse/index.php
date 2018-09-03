<!doctype html>
<?php require('./inc/conf.php'); 
session_start();
if( (isset($_SESSION['email']))){
    header('location: admin.php');
}
?>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title><?= WEBSITE_TITLE ?></title>

	<link href="./css/bootstrap-3.3.0.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="./js/bootstrap-3.3.0.min.js"></script>
	<script src="./js/jquery-1.11.1.min.js"></script>
	<link href="./css/index.css" rel="stylesheet">
	<script src="./js/index.js"></script>
</head>

<body>
<div class="container">
<!-- START Login -->
<?php
if (isset($_POST['login-submit'])) {
	unset($_GET);
	$email = $db->escape_string(strtolower($_POST["log_email"]));
	$password = $db->escape_string($_POST['log_password']);

		// Gestion des erreurs 
		$errors = array();
		if (empty($email)) { array_push($errors, ERR_LOG_MAIL); }
		if (empty($password)) { array_push($errors, ERR_LOG_PASSWORD); } 

		// Verifications SQL
		$user = mysqli_fetch_array($db->query("SELECT * FROM users WHERE email='$email'"), MYSQLI_ASSOC);
		if(!empty($user))
			{
				if (password_verify($password, $user['password'])) {
					unset($errors);
				}
				else {
					array_push($errors, ERR_WRONG_PASSWORD.$password);
				}
			}
			else
			{
				if (filter_var($email, FILTER_VALIDATE_EMAIL)) { 
			array_push($errors, $email.ERR_LOG_NO_MAIL_IN_DATABASE);
				} 
				else {
					array_push($errors, $email.ERR_LOG_IS_NOT_MAIL);
				}
			}
		// Affichage et redirection
		if (empty($errors)) {	

			session_start ();
			$_SESSION['email'] = $email;

			header('location: admin.php');
		?>

<?php							}
		else { 
			// Affichage des erreurs?>
			<div class="alert alert-danger" role="alert">
				<?php echo ERR_LOGIN." : <br />";
				foreach ($errors as $error){
					echo "<li>".$error."</li>";
				} ?>
			</div>
			<?php } 	
}
?>
<!-- END Login -->
<!--START Register -->
<?php 
		if (isset($_POST['register-submit'])) {
			echo $password_1."<br /><br />";
			$username = $db->escape_string($_POST["reg_username"]);
			$email = $db->escape_string(strtolower($_POST['reg_email']));
			$password_1 = $db->escape_string($_POST['reg_password']);
			$password_2 = $db->escape_string($_POST['reg_confirm-password']);
			
			// Gestion des erreurs 
			$errors = array(); 
			if (empty($username)) { array_push($errors, ERR_REG_USER); }
			if (empty($email)) { array_push($errors, ERR_REG_MAIL); }
			if (empty($password_1)) { array_push($errors, ERR_REG_PASSWORD); }
			if (empty($password_2)) { array_push($errors, ERR_REG_PASSWORD_CONFIRM); }
			if ($password_1 != $password_2) {
			  array_push($errors, ERR_REG_PASSWORDS_NOTEQUAL);
											}
			
				// Verifications SQL : username et mail sont-ils déjà utilisé ?
				$users_with_this_email = mysqli_fetch_array($db->query("SELECT * FROM users WHERE email='$email'"), MYSQLI_ASSOC);
				if(!empty($users_with_this_email))
					{
						array_push($errors, ERR_MAIL_ALREADY_EXIST);
					}
				$users_with_this_username = mysqli_fetch_array($db->query("SELECT * FROM users WHERE username='$username'"), MYSQLI_ASSOC);	
				if(!empty($users_with_this_username))
					{
						array_push($errors, ERR_USERNAME_ALREADY_EXIST);
					}
				// Vérification de la sécurité du mot de passe
				if ($password_1 == $password_2) {
					checkPassword($password_1, $errors);								
				}
				
				
			// Registration ok
			if (empty($errors)) {	
				$hashed_password = password_hash($password_1, PASSWORD_DEFAULT);
				$sql = "INSERT INTO users VALUES (DEFAULT, '$username', '$email', '$hashed_password', '2', '0' )";
				$db->query($sql);

				$mail_key = md5(microtime(TRUE)*100000);
				$sql = "INSERT INTO mails VALUES (DEFAULT, '$email', '$mail_key')";
				$db->query($sql);
				mailRegister($email, $mail_key);
			?>

			<div class="alert alert-success" role="alert">
			<?= OK_ACCOUNT_CREATION.$email; ?>
			</div>

	<?php							}
			if (count($errors) > 0){ 
				// Affichage des erreurs?>
				<div class="alert alert-danger" role="alert">
					<?= ERR_ACCOUNT_CREATION." : <br />";
					foreach ($errors as $error){
						echo "<li>".$error."</li>";
					} ?>
				</div>
								   <?php }
											}
	?>

<!-- END Register  -->
<!-- START Email Link Register Check -->
<?php
if(isset($_GET['adr'])) 
	{
	if(isset($_GET['key'])) 
		{
			$email = $db->escape_string($_GET['adr']);
			$email = htmlspecialchars($email);
			$key = $db->escape_string($_GET['key']);
			$key = htmlspecialchars($key);
			if($_GET['action'] == "validate") 
				{
					$sql = "SELECT COUNT(*) AS occurences FROM mails WHERE key_mail='$key'";
					$mail_in_database = mysqli_fetch_array($db->query($sql), MYSQLI_ASSOC);
					if($mail_in_database['occurences'] != 0)
					{
						$sql = "UPDATE `users` SET `active` = '1' WHERE `users`.`email` = '$email'";
						$db->query($sql); 
						$sql = "DELETE FROM `mails` WHERE `mails`.`key_mail` = '$key'";
						$db->query($sql); 
						?>

							<div class="alert alert-success" role="alert">
							<?= $email.OK_MAIL_VERIFICATION ;
							?>
							</div>


					<?php 
					sleep(2);
					header('Location: '.SITEBASE_URL.'index.php?verif="ok'); 
					}
					else { ?>
						<div class="alert alert-danger" role="alert">
						<?= $key.ERR_MAIL_VERIFICATION ?>
						</div>
			<?php		 }
				}
		}
	}
		
?>
<!-- END Email Link Register Check -->
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link"><?= MES_LOGIN ?></a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link"><?= MES_ACCOUNT_CREATION ?></a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="#" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="log_email" id="log_email" tabindex="1" class="form-control" placeholder="<?= MES_MAIL_ADR ?>" value="">
									</div>
									<div class="form-group">
										<input type="password" name="log_password" id="log_password" tabindex="2" class="form-control" placeholder="<?= MES_PASSWORD ?>">
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"><?= MES_REMEMBER_ME ?></label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="<?= MES_LOGIN ?>">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="#" tabindex="5" class="forgot-password"><?= MES_PASSWORD_FORGOT ?> </a>
												</div>
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="#" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="reg_username" id="reg_username" tabindex="1" class="form-control" placeholder="<?= MES_USERNAME ?>" value="">
									</div>
									<div class="form-group">
										<input type="email" name="reg_email" id="reg_email" tabindex="1" class="form-control" placeholder="<?= MES_MAIL_ADR ?>" value="">
									</div>
									<div class="form-group">
										<input type="password" name="reg_password" id="reg_password" tabindex="2" class="form-control" placeholder="<?= MES_PASSWORD ?>">
									</div>
									<div class="form-group">
										<input type="password" name="reg_confirm-password" id="reg_confirm-password" tabindex="2" class="form-control" placeholder="<?= MES_PASSWORD_CONFIRM ?>">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="<?= MES_ACCOUNT_CREATION ?>">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>