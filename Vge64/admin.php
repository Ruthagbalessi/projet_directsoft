<?php
session_start();
require_once '../includes/db.php';

// --- Vérification du rôle ---
if (!isset($_SESSION['role']) || !in_array($_SESSION['role'], ['admin', 'secretaire'])) {
    header('Location: ../index.php');
    exit;
}

// --- Traitement du formulaire ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST as $nom => $valeur) {
        if ($nom === 'submit') continue;

        $stmt = $pdo->prepare("UPDATE design_site SET valeur_parametre = :valeur WHERE nom_parametre = :nom");
        $stmt->execute(['valeur' => $valeur, 'nom' => $nom]);
    }

    // Gestion des images
    if (!empty($_FILES)) {
        foreach ($_FILES as $nom => $file) {
            if ($file['error'] === 0) {
                $destination = '../uploads/' . basename($file['name']);
                move_uploaded_file($file['tmp_name'], $destination);

                $stmt = $pdo->prepare("UPDATE design_site SET chemin_image = :chemin WHERE nom_parametre = :nom");
                $stmt->execute(['chemin' => $destination, 'nom' => $nom]);
            }
        }
    }

    $message = "🎨 Design mis à jour avec succès !";
}

// --- Récupération des paramètres ---
$stmt = $pdo->query("SELECT * FROM designdirectsoft ORDER BY categorie");
$designs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration du design</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2 class="mb-4 text-center">🎨 Modifier le design du site</h2>

    <?php if (!empty($message)) : ?>
        <div class="alert alert-success"><?= $message ?></div>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data" class="p-4 bg-white shadow rounded">
        <?php foreach ($designs as $item) : ?>
            <div class="mb-3">
                <label class="form-label fw-bold"><?= htmlspecialchars($item['description']) ?></label>
                
                <?php if ($item['type_parametre'] === 'couleur') : ?>
                    <input type="color" name="<?= $item['nom_parametre'] ?>" value="<?= htmlspecialchars($item['valeur_parametre']) ?>" class="form-control form-control-color">

                <?php elseif ($item['type_parametre'] === 'texte' || $item['type_parametre'] === 'police' || $item['type_parametre'] === 'taille') : ?>
                    <input type="text" name="<?= $item['nom_parametre'] ?>" value="<?= htmlspecialchars($item['valeur_parametre']) ?>" class="form-control">

                <?php elseif ($item['type_parametre'] === 'image') : ?>
                    <?php if (!empty($item['chemin_image'])) : ?>
                        <div class="mb-2">
                            <img src="<?= htmlspecialchars($item['chemin_image']) ?>" alt="Image actuelle" style="max-height:80px;">
                        </div>
                    <?php endif; ?>
                    <input type="file" name="<?= $item['nom_parametre'] ?>" class="form-control">
                <?php endif; ?>
            </div>
        <?php endforeach; ?>

        <button type="submit" name="submit" class="btn btn-primary w-100">💾 Enregistrer les changements</button>
    </form>
</div>
</body>
</html>
