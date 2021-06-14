<?php

define('DOSSIER_UPLOADS', 'uploads');

/**
 * convertirLigneBddEnArticle
 * @param ligne de BDD
 * @return  article :  un nouvel article qui contient id,nom,prix, et img de la ligne bdd correspondante
 */
function convertirLigneBddEnArticle($ligneDeBdd)
{
    $article = new Article();
    $article->id = $ligneDeBdd['id'];
    $article->nom = $ligneDeBdd['nom'];
    $article->prix = $ligneDeBdd['prix'];
    $article->image = $ligneDeBdd['image'];
    return $article;
}

/**
 * recupererTousLesArticles
 * @param () rien
 * @return  tableau d'articles qui contient des id,nom,prix récupérés de la bdd, à partir de la table
 */
function recupererTousLesArticles()
{
    $tableau = [];
    $tunnel = new PDO('mysql:host=localhost;dbname=wf3_rk', 'root', '');
    $tunnel->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $tunnel->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $resultat = $tunnel->query('SELECT * FROM projet5_produits');
    while ($ligne = $resultat->fetch())
    {
        $article = convertirLigneBddEnArticle($ligne);
        array_push($tableau, $article);
    }
    return $tableau;
}

/**
 * recupererUnSeulArticleAvecId
 * @param un id d'un article
 * @return la liste d'un article récupéré du projet5 dans la bdd, à l'affichage on aura nom, prix 
 */
function recupererUnSeulArticleAvecId($id)
{
    $tunnel = new PDO('mysql:host=localhost;dbname=wf3_rk', 'root', '');
    $tunnel->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $tunnel->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $statement = $tunnel->prepare('SELECT * FROM projet5_produits WHERE id = ?');
    $statement->execute([$id]);
    $ligne = $statement->fetch();

    $article = convertirLigneBddEnArticle($ligne);
    return $article;
}

/**
 * verifierPayloadPourCreerArticle
 * @param rien
 * @return message : msg d'erreur s'il manque un truc pour créer un article, sinn il retourne null
 */
function verifierPayloadPourCreerArticle()
{
    if (!isset($_POST['product-name']) || $_POST['product-name'] === '')
    {
        return "Vous devez spécifier un nom de produit";
    }

    if (!isset($_POST['product-price']) || $_POST['product-price'] === '')
    {
        return "Vous devez spécifier un prix de produit";
    }

    if (!is_numeric($_POST['product-price']))
    {
        return "Le prix doit être numérique";
    }

    if (!isset($_FILES['product-photo-file']) || $_FILES['product-photo-file']['name'] === '')
    {
        return "Vous devez choisir un fichier";
    }

    if (!in_array($_FILES['product-photo-file']['type'], ['image/webp', 'image/png', 'image/png']))
    {
        return "Le type de fichier " . $_FILES['product-photo-file']['type'] . " n'est pris en charge";
    }

    return null;
}

/**
 * determinerCheminFichierEnregistre
 * @param rien
 * @return chemin : chemin d'un fichier dans le dossier, composé de l'heure courant et de l'extension du fichier envoyé
 */
function determinerCheminFichierEnregistre()
{
    $timestamp = strval(time());
    $extension = pathinfo(basename($_FILES["product-photo-file"]["name"]), PATHINFO_EXTENSION);
    $chemin = DOSSIER_UPLOADS . '/' . $timestamp . '.' . $extension;
    //DOSSIER_UPLOADS est une constante, il est définie au début du code et on lui a donné un synonyme
    // define (nom de const à définir, val à attribuer)
    return $chemin;
    
}

/**
 * enregistrerFichierEnvoye
 * @param rien
 * @return chemin :chemin d'un fichier dans le dossier, compré de l'heure courant et l'extention du fichier envoyé
 */
function enregistrerFichierEnvoye()
{
    $chemin = determinerCheminFichierEnregistre();
    move_uploaded_file($_FILES["product-photo-file"]["tmp_name"], $chemin);
    return $chemin;
}

/**
 * convertirPayloadEnArticle
 * @param rien
 * @return article: création d'un new article avec un: nom, prix et l'image qui est récupéré du fichier upload
 */
function convertirPayloadEnArticle()
{
    $image = enregistrerFichierEnvoye();
    $article = new Article();
    $article->nom = $_POST['product-name'];
    $article->prix = $_POST['product-price'];
    $article->image = $image;

    return $article;
}

/**
 * insererDansBdd
 * @param article : à inserer dans la bdd
 * @return null, on fait un insert into la bdd lors de la création d'un article 
 */
function insererDansBdd($article)
{
    $tunnel = new PDO('mysql:host=localhost;dbname=wf3_621', 'root', '');
    $tunnel->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $tunnel->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $resultat = $tunnel->prepare("INSERT INTO projet5_produits(nom, prix, image) VALUES(?, ?, ?)");
    $resultat->execute([$article->nom, $article->prix, $article->image]);

    return null;
}

/**
 * supprimerDansBdd
 * @param  article : un article à supprimer dans la bdd
 * @return null : on delete un article de la bdd en se basant sur son id. si tout vas bien il retourn null              
 */
function supprimerDansBdd($article)
{
    $tunnel = new PDO('mysql:host=localhost;dbname=wf3_621', 'root', '');
    $tunnel->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $tunnel->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $resultat = $tunnel->prepare("DELETE FROM projet5_produits WHERE id = ?");
    $resultat->execute([$article->id]);

    return null;
}