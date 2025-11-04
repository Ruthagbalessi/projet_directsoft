<?php
session_start();
require_once '../includes/db.php';

// --- Vérification du rôle ---
if (!isset($_SESSION['role']) || !in_array($_SESSION['role'], ['employe', 'secretaire', 'admin'])) {
    header('Location: ../index.php');
    exit;
}

// --- Traitement du formulaire ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST as $nom => $valeur) {
        if ($nom === 'submit') continue;

        $stmt = $pdo->prepare("UPDATE designdirectsoft SET valeur_parametre = :valeur WHERE nom_parametre = :nom");
        $stmt->execute(['valeur' => $valeur, 'nom' => $nom]);
    }

    $message = "✅ Design mis à jour avec succès !";
}

// --- Récupération des paramètres ---
$stmt = $pdo->query("SELECT * FROM design_site ORDER BY categorie");
$designs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Employé - Design</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2 class="mb-4 text-center">🧑‍💻 Modifier le design du site</h2>

    <?php if (!empty($message)) : ?>
        <div class="alert alert-success"><?= $message ?></div>
    <?php endif; ?>

    <form method="post" class="p-4 bg-white shadow rounded">
        <?php foreach ($designs as $item) : ?>
            <div class="mb-3">
                <label class="form-label fw-bold"><?= htmlspecialchars($item['description']) ?></label>
                <?php if ($item['type_parametre'] === 'couleur') : ?>
                    <input type="color" name="<?= $item['nom_parametre'] ?>" value="<?= htmlspecialchars($item['valeur_parametre']) ?>" class="form-control form-control-color">
                <?php elseif ($item['type_parametre'] === 'texte' || $item['type_parametre'] === 'police' || $item['type_parametre'] === 'taille') : ?>
                    <input type="text" name="<?= $item['nom_parametre'] ?>" value="<?= htmlspecialchars($item['valeur_parametre']) ?>" class="form-control">
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
        <button type="submit" name="submit" class="btn btn-success w-100">💾 Enregistrer</button>
    </form>
</div>
</body>
</html>
