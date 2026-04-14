<?php
$prenom     = '';
$nom        = '';
$email      = '';
$age        = '';
$filiere    = '';
$motivation = '';
$conditions = false;
$erreurs    = [];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Candidature</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Candidature au Club Informatique</h1>
    <p class="page-subtitle">Remplissez le formulaire ci-dessous pour soumettre votre candidature.</p>

    <form action="" method="post">

        <div class="form-group">
            <label>Prénom:</label>
            <input type="text" name="prenom">
        </div>

        <div class="form-group">
            <label>Nom:</label>
            <input type="text" name="nom">
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email">
        </div>

        <div class="form-group">
            <label>Âge:</label>
            <input type="number" name="age">
        </div>

        <div class="form-group">
            <select name="filiere">
                <option value="">Sélectionnez votre filière</option>
                <option value="1">Informatique</option>
                <option value="2">Mathematique</option>
                <option value="3">Physique</option>
                <option value="4">Autres</option>
            </select>
        </div>

        <div class="form-group">
            <label>Motivation:</label>
            <textarea name="motivation" rows="4" cols="50"></textarea>
        </div>

        <div class="form-group">
            <label>J'ai lu et j'accepte les conditions d'utilisation</label>
            <input type="checkbox" name="conditions">
        </div>

        <button type="submit">Soumettre</button>

    </form>

</div>

</body>
</html>