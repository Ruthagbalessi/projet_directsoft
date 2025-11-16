<?php
session_start();
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Profil - Directsoft</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header class="header-area header-sticky">
      <div class="container">
        <div class="row"><div class="col-12">
          <nav class="main-nav">
            <a href="accueil.php" class="logo"><h1>Directsoft</h1></a>
            <ul class="nav">
              <li><a href="accueil.php">Accueil</a></li>
              <li><a href="nosolution.html">Nos Solutions</a></li>
              <li><a href="presentation.html">Présentation</a></li>
              <li><a href="formation1.html">Formation</a></li>
              <li><a href="assistance.html">Assistance</a></li>
              <li><a href="services.html">Services</a></li>
              <li><a href="contact.php">Contact</a></li>
              <li><a href="navigation-principale.php" class="active"><i class="fa fa-user"></i> Profil</a></li>
            </ul>
            <a class='menu-trigger'><span>Menu</span></a>
          </nav>
        </div></div>
      </div>
    </header>
    <section class="section">
      <div class="container">
        <?php if($user): ?>
          <h2 class="mb-4">Bonjour, <?= htmlspecialchars($user['name'] ?? 'Utilisateur') ?></h2>
          <p>Bienvenue dans votre espace. Vous pourrez ici gérer les paramètres du site une fois les droits accordés.</p>
        <?php else: ?>
          <h2 class="mb-4">Espace Profil</h2>
          <p>Veuillez vous connecter pour accéder à l’espace de personnalisation.</p>
          <a class="btn btn-primary" href="Vge64/connexion.php">Se connecter</a>
        <?php endif; ?>
      </div>
    </section>
    <footer class="bg-dark text-white pt-5 pb-4">
      <div class="container"><div class="row"><div class="col-lg-12 text-center">&copy; Groupe DIRECTSOFT</div></div></div>
    </footer>
    
  </body>
</html>