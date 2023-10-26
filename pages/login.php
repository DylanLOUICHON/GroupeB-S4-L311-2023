<?php
	// Vérification des identifiants de connexion
	$message = null;
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	    if(array_key_exists('login', $_POST) && array_key_exists('password', $_POST)){
	    	if(!empty($_POST['login']) && !empty($_POST['password'])){
	    		$_SESSION['User'] = connectUser($_POST['login'], $_POST['password']);

				// Si les identifiants sont correctes
	    		if(!is_null($_SESSION['User'])){
	    			header("Location:index.php");
	    		}
				// Si les identifiants sont incorrectes
				else{
	    			$message = "Mauvais login ou mot de passe";
	    		}
	    	}
	    }
	}	
?>

<!-- Contenu de la page -->
<section class="wrapper style1 align-center">
	<div class="inner">
		<div class="index align-left">
			<section>
				<header>
					<h3>Se connecter</h3>
					<a href="index.php" class="button big wide smooth-scroll-middle">Revenir à l'accueil</a></li>
				</header>
				<div class="content">

					<!-- Affichage du message d'erreur -->
					<?php echo (!is_null($message) ? "<p>".$message."</p>" : '');?>
					
					<!-- Formulaire de connexion -->
					<form method="post" action="#">
						<div class="fields">
							<div class="field half">
								<label for="login">Nom d'utilisateur</label>
								<input type="text" name="login" id="login" value="" />
							</div>
							<div class="field half">
								<label for="password">Mot de passe</label>
								<input type="password" name="password" id="password" value="" />
							</div>
						</div>
						<ul class="actions">
							<li><input type="submit" name="submit" id="submit" value="Se connecter" /></li>
						</ul>
					</form>

				</div>
			</section>
		</div>
	</div>
</section>
