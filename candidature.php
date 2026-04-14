<?php
$prenom     = '';
$nom        = '';
$email      = '';
$age        = '';
$filiere    = '';
$motivation = '';
$conditions = false;
$erreurs    = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom     = $_POST['prenom']     ?? '';
    $nom        = $_POST['nom']        ?? '';
    $email      = $_POST['email']      ?? '';
    $age        = $_POST['age']        ?? '';
    $filiere    = $_POST['filiere']    ?? '';
    $motivation = $_POST['motivation'] ?? '';
    $conditions = isset($_POST['conditions']);

    if (empty($prenom)) {
        $erreurs[] = "Le prénom est obligatoire.";
    }
    if (empty($nom)) {
        $erreurs[] = "Le nom est obligatoire.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs[] = "L'adresse email est invalide.";
    }
    if (!is_numeric($age) || (int)$age < 16 || (int)$age > 30) {
        $erreurs[] = "L'âge doit être un nombre entre 16 et 30.";
    }
    if (empty($filiere)) {
        $erreurs[] = "Veuillez choisir une filière.";
    }
    if (strlen($motivation) < 30) {
        $erreurs[] = "La motivation doit contenir au moins 30 caractères.";
    }
    if (!$conditions) {
        $erreurs[] = "Vous devez accepter le règlement.";
    }
}
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

    <?php if (!empty($erreurs)): ?>
    <ul class="erreurs">
        <?php foreach ($erreurs as $e): ?>
            <li><?php echo $e; ?></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>

    <form action="" method="post">

        <div class="form-group">
            <label>Prénom:</label>
            <input type="text" name="prenom" value="<?php echo $prenom; ?>">
        </div>

        <div class="form-group">
            <label>Nom:</label>
            <input type="text" name="nom" value="<?php echo $nom; ?>">
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $email; ?>">
        </div>

        <div class="form-group">
            <label>Âge:</label>
            <input type="number" name="age" value="<?php echo $age; ?>">
        </div>

        <div class="form-group">
            <select name="filiere">
                <option value="">Sélectionnez votre filière</option>
                <option value="1" <?php echo ($filiere === '1') ? 'selected' : ''; ?>>Informatique</option>
                <option value="2" <?php echo ($filiere === '2') ? 'selected' : ''; ?>>Mathematique</option>
                <option value="3" <?php echo ($filiere === '3') ? 'selected' : ''; ?>>Physique</option>
                <option value="4" <?php echo ($filiere === '4') ? 'selected' : ''; ?>>Autres</option>
            </select>
        </div>

        <div class="form-group">
            <label>Motivation:</label>
            <textarea name="motivation" rows="4" cols="50"><?php echo $motivation; ?></textarea>
        </div>

        <div class="form-group">
            <label>J'ai lu et j'accepte les conditions d'utilisation</label>
            <input type="checkbox" name="conditions" <?php echo $conditions ? 'checked' : ''; ?>>
        </div>

        <button type="submit">Soumettre</button>

    </form>

</div>

</body>
</html>