<?php
      // Inclure le fichier des fonctions php
       include_once('inc/inc.functions.php');
     // Appel à une fonction pour récupérer le contenu des articles par l'identifiant
	$article = getArticleById(
		array_key_exists('id', $_GET) ? $_GET['id'] : null
	);
        // s'il n'existe pas d'article, renvoie à la page index
	if (is_null($article) OR !count($article)) {
		header('Location:index.php');
	}
?>
// Contenu de la page affichant le contenu de l'article consulté
<section class="banner style1 orient-left content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right">
	<div class="content">
		<h1><?php echo $article['titre'];?></h1>
		<p class="major"><?php echo $article['texte'];?></p>
		<ul class="actions stacked">
			<li><a href="index.php" class="button big wide smooth-scroll-middle">Revenir à l'accueil</a></li>
		</ul>
	</div>
	<div class="image">
		<img src="<?php echo $article['image'];?>" alt="image de l'article" />
	</div>
</section>
