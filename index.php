<!-- Inclure le fichier des fonctions PHP -->
<?php include_once('inc/inc.functions.php');?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Story by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!-- Inclure le fichier PHP qui relie les fichiers CSS -->
		<?php include ('inc/inc.css.php'); ?>
	</head>
	<body class="is-preload">
		<!-- Contenu de la page -->
		<div id="wrapper" class="divided">
			<?php
				// Appel à une fonction pour générer le contenu de la page
				getPageTemplate(
				array_key_exists('page', $_GET) ? $_GET['page'] : null
				); 		
			?>
		</div>
		<!-- Inclure le fichier PHP qui relie les fichiers JavaScript -->
		<?php include ('inc/inc.js.php'); ?>
	</body>
	<?php
		// Inclure le pied de page (footer)
		include ('inc/tpl-footer.php');
	?>
</html>
