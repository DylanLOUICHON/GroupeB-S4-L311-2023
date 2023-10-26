
<?php
// Démarrage de la session
session_start();

 // Définition des constantes
define('TL_ROOT', dirname(__DIR__));
define('LOGIN', 'UEL311');
define('PASSWORD', 'UEL311');
define('DB_ARTICLES', TL_ROOT.'/db/articles.json');

// Fonction de vérification du LOGIN et du PASSWORD
function connectUser($login = null, $password = null)
{
    if (!is_null($login) && !is_null($password)) {
        // Si l'identifiant et le mot de passe correspondent aux constantes définies
        if ($login === LOGIN && $password === PASSWORD) {
            return array(
                'login'    => LOGIN,
                'password' => PASSWORD
            );
        }
    }
    // Si l'identifiant et le mot de passe ne correspondent pas aux constantes définies
    return null;
}

// Fonction qui déconnecte l'utilisateur
function setDisconnectUser()
{
    // Suppression de la clé 'User' dans la session
    unset($_SESSION['User']);
    // Destruction de la session
    session_destroy();
}

// Fonction de vérification pour déterminer si un utilisateur est connecté
function isConnected()
{
    if (
        // L'utilisateur est connecté
        array_key_exists('User', $_SESSION)
        && !is_null($_SESSION['User'])
        && !empty($_SESSION['User'])
    ) {
        return true;
    }
    // L'utilisateur n'est pas connecté
    return false;
}
//Une fonction qui récupère  les articles 
  function getPageTemplate($page = null){
        $fichier = TL_ROOT.'/pages/'.(is_null($page) ? 'index.php' : $page.'.php');

        if(!file_exists($fichier)){
            include TL_ROOT.'/pages/index.php';
        }else{
            include $fichier;
        }
    }
//Une fonction qui permet de trouver tous les articles 
function getArticlesFromJson()
{
    if (file_exists(DB_ARTICLES)) {
        $contenu_json = file_get_contents(DB_ARTICLES);
        return json_decode($contenu_json, true);
    }
    //on retourne rien si la recherche échoue 
    return null;
}

//Une Fonction qui permet de chercher l'article par son identifiant 
function getArticleById($id_article = null)
{
    if (file_exists(DB_ARTICLES)) {
        $contenu_json = file_get_contents(DB_ARTICLES);
        $_articles    = json_decode($contenu_json, true);
        foreach ($_articles as $article) {
            if ($article['id'] == $id_article) {
                //la fonction retourne l'article désiré 
                return $article;
            }
        }
    }
    //La fonction return null si l'identifiant n'existe pas dans le fichier JSON 
    return null;
}
