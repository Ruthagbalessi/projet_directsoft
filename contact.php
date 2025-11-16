<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Contact - Directsoft</title>
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
              <li><a href="contact.php" class="active">Contact</a></li>
              <li><a href="navigation-principale.php"><i class="fa fa-user"></i> Profil</a></li>
            </ul>
            <a class='menu-trigger'><span>Menu</span></a>
          </nav>
        </div></div>
      </div>
    </header>
    <section class="section">
      <div class="container">
        <h2 class="mb-4">Contact</h2>
        <form class="row g-3" method="post" action="#" style="max-width:800px;margin:0 auto;">
          <div class="col-md-6"><label class="form-label">Nom</label><input type="text" class="form-control" name="nom" required></div>
          <div class="col-md-6"><label class="form-label">Email</label><input type="email" class="form-control" name="email" required></div>
          <div class="col-12"><label class="form-label">Message</label><textarea class="form-control" rows="5" name="message" required></textarea></div>
          <div class="col-12"><button class="btn btn-primary" type="submit">Envoyer</button></div>
        </form>
      </div>
    </section>
    <footer class="bg-dark text-white pt-5 pb-4">
      <div class="container"><div class="row"><div class="col-lg-12 text-center">&copy; Groupe DIRECTSOFT</div></div></div>
    </footer>
    
  </body>
</html>