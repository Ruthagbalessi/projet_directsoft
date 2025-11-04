<?php
header("Content-type: text/css");
include 'config.php';
?>

:root {
  --primary-color: <?= $design_settings['couleur_principale'] ?? '#007bff' ?>;
  --secondary-color: <?= $design_settings['couleur_secondaire'] ?? '#6c757d' ?>;
  --text-color: <?= $design_settings['couleur_texte'] ?? '#333' ?>;
  --background-color: <?= $design_settings['couleur_fond'] ?? '#f8f9fa' ?>;
  --white: <?= $design_settings['blanc'] ?? '#ffffff' ?>;
  --dark: <?= $design_settings['couleur_sombre'] ?? '#343a40' ?>;
  --font-family: <?= json_encode($design_settings['police_principale'] ?? 'Poppins, sans-serif') ?>;
}

body {
  font-family: var(--font-family);
  background-color: var(--background-color);
  color: var(--text-color);
}

/* Tu peux coller ici tout ton CSS que tu m'as envoyé plus haut */
