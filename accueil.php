<?php
// Démarrer la session et charger la configuration si nécessaire
session_start();
include 'config.php';

// Récupération des paramètres de design et contenu depuis la BDD
function getDesignSettings() {
    $servername = "localhost";
    $username = "root"; // à adapter si besoin
    $password = "";     // à adapter si besoin
    $dbname = "designdirectsoft";

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->query("SELECT nom_parametre, valeur_parametre FROM design_site");
        return $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
    } catch (PDOException $e) {
        // Valeurs par défaut si la BDD échoue
        return [
            'logo_text' => 'Directsoft',
            'couleur_principale' => '#007bff',
            'couleur_secondaire' => '#6c757d',
            'couleur_texte' => '#333333',
            'couleur_fond' => '#ffffff',
            'police_principale' => 'Poppins, sans-serif',
            'banner_city_1' => 'Cocody',
            'banner_country_1' => "Côte d'Ivoire",
            'banner_text_1' => '"Boostez votre activité avec une solution durable et évolutive.',
            'banner_city_2' => 'Lagos',
            'banner_country_2' => 'Nigeria',
            'banner_text_2' => 'Optimisez vos ventes avec notre solution de gestion commerciale.',
            'banner_city_3' => 'Douala',
            'banner_country_3' => 'Cameroun',
            'banner_text_3' => 'Des logiciels intelligents pour une gestion simplifiée.',
            'welcome_title' => 'Bienvenue chez Directsoft',
            'service1_title' => 'Services en ligne',
            'service2_title' => 'Sécurité',
            'service3_title' => 'Maintenance',
            'erp_title' => 'ERP DIMS',
            'erp_desc' => "La solution de gestion intégrée qui vous permet d'avoir une vue d'ensemble en temps réel sur toute votre activité.",
            'parallax_image' => 'img/IMG-20250804-WA0021.jpg',
            'card1_image' => 'assets/images/icon-11.jpg',
            'card1_title' => 'AGROMEX',
            'card1_desc' => 'Logiciel de gestion des produits agro-industriels',
            'card2_image' => 'assets/images/icon-12.jpg',
            'card2_title' => 'AGRICE',
            'card2_desc' => 'Gestion des coopératives agricoles et traçabilité',
            'card3_image' => 'assets/images/icon-06.jpg',
            'card3_title' => 'SOFT-COMPTA',
            'card3_desc' => 'Comptabilité générale et analytique',
            'card4_image' => 'assets/images/icon-07.jpg',
            'card4_title' => 'REEL',
            'card4_desc' => "Gestion des écoles et suivi des emplois du temps",
            'card5_image' => 'assets/images/icon-02.jpg',
            'card5_title' => 'XPESAGE',
            'card5_desc' => 'Logiciel de suivi de pesage',
            'card6_image' => 'assets/images/icon-05.jpg',
            'card6_title' => 'GESCOM',
            'card6_desc' => 'Logiciel de gestion commerciale',
            'card7_image' => 'assets/images/icon-13.jpg',
            'card7_title' => 'MANAGER RH',
            'card7_desc' => 'Logiciel de paie et de gestion RH'
        ];
    }
}

$settings = getDesignSettings();
function ds($key, $default, $settings) {
    return isset($settings[$key]) && $settings[$key] !== '' ? $settings[$key] : $default;
}
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Directsoft - Société Informatique</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files (identiques à accueil.html) -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/animations.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

    <!-- Thème dynamique (couleurs, police) -->
    <style>
      :root{
        --primary: <?= htmlspecialchars(ds('couleur_principale','#007bff',$settings)) ?>;
        --secondary: <?= htmlspecialchars(ds('couleur_secondaire','#6c757d',$settings)) ?>;
        --text-color: <?= htmlspecialchars(ds('couleur_texte','#333333',$settings)) ?>;
        --bg-color: <?= htmlspecialchars(ds('couleur_fond','#ffffff',$settings)) ?>;
      }
      body{
        color: var(--text-color);
        background-color: var(--bg-color);
        font-family: <?= htmlspecialchars(ds('police_principale','Poppins, sans-serif',$settings)) ?>;
      }
      .tm-text-primary, .text-primary{ color: var(--primary) !important; }
      .btn-primary{ background-color: var(--primary) !important; border-color: var(--primary) !important; }
      .btn-outline-primary{ color: var(--primary) !important; border-color: var(--primary) !important; }
      .accordion-button{ color: var(--text-color); }
    </style>
  </head>

  <body>
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <div class="sub-header">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-8">
            <ul class="info">
              <li><i class="fa fa-envelope"></i> info@groupe-directsoft.com</li>
              <li><i class="fa fa-map"></i>25 BP 202 Cidex Abidjan 25</li>
            </ul>
          </div>
          <div class="col-lg-4 col-md-4">
            <ul class="social-links">
              <li><a href="#"><i class="fab fa-facebook"></i></a></li>
              <li><a href="https://x.com/minthu" target="_blank"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav class="main-nav">
              <!-- ***** Logo Start ***** -->
              <a href="accueil.php" class="logo">
                <h1><?= htmlspecialchars(ds('logo_text','Directsoft',$settings)) ?></h1>
              </a>
              <!-- ***** Logo End ***** -->
              <!-- ***** Menu Start ***** -->
              <ul class="nav">
                <li><a href="accueil.php" class="active">Accueil</a></li>
                <li><a href="nosolution.html">Nos Solutions</a></li>
                <li><a href="presentation.html">Présentation</a></li>
                <li><a href="formation1.html">Formation</a></li>
                <li><a href="assistance.html">Assistance</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="navigation-principale.php"><i class="fa fa-user"></i> Profil</a></li>
              </ul>
              <a class='menu-trigger'>
                <span>Menu</span>
              </a>
              <!-- ***** Menu End ***** -->
            </nav>
          </div>
        </div>
      </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="main-banner">
      <div class="owl-carousel owl-banner">
        <div class="item item-1">
          <div class="header-text">
            <span class="category"><?= htmlspecialchars(ds('banner_city_1','Cocody',$settings)) ?>, <em><?= htmlspecialchars(ds('banner_country_1',"Côte d'Ivoire",$settings)) ?></em></span>
            <h2><br><?= htmlspecialchars(ds('banner_text_1','"Boostez votre activité avec une solution durable et évolutive.',$settings)) ?></h2>
          </div>
        </div>
        <div class="item item-2">
          <div class="header-text">
            <span class="category"><?= htmlspecialchars(ds('banner_city_2','Lagos',$settings)) ?>, <em><?= htmlspecialchars(ds('banner_country_2','Nigeria',$settings)) ?></em></span>
            <h2><br><?= htmlspecialchars(ds('banner_text_2','Optimisez vos ventes avec notre solution de gestion commerciale.',$settings)) ?></h2>
          </div>
        </div>
        <div class="item item-3">
          <div class="header-text">
            <span class="category"><?= htmlspecialchars(ds('banner_city_3','Douala',$settings)) ?>, <em><?= htmlspecialchars(ds('banner_country_3','Cameroun',$settings)) ?></em></span>
            <h2><br><?= htmlspecialchars(ds('banner_text_3','Des logiciels intelligents pour une gestion simplifiée.',$settings)) ?></h2>
          </div>
        </div>
      </div>
    </div>

    <div class="featured section">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Nos solutions logicielles
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <div class="tm-main">
              <!-- Accueil section -->
              <div class="tm-section-wrap">
                <div class="tm-parallax" data-parallax="scroll" data-image-src="<?= htmlspecialchars(ds('parallax_image','img/IMG-20250804-WA0021.jpg',$settings)) ?>"></div>
                <section id="Accueil" class="tm-section">
                  <h2 class="tm-text-primary"><?= htmlspecialchars(ds('welcome_title','Bienvenue chez Directsoft',$settings)) ?></h2>
                  <hr class="mb-5">

                  <div class="row mb-5">
                    <div class="col-lg-12 text-center">
                      <h3 class="tm-text-primary mb-4"><?= htmlspecialchars(ds('banner_text_1','Boostez votre activité avec une solution durable et évolutive.',$settings)) ?></h3>
                    </div>
                  </div>

                  <div class="row mb-5">
                    <div class="col-lg-4 mb-4 text-center">
                      <img src="assets/images/info-icon-01.png" alt="" style="max-width: 52px;">
                      <h4 class="tm-text-primary"><?= htmlspecialchars(ds('service1_title','Services en ligne',$settings)) ?></h4>
                    </div>
                    <div class="col-lg-4 mb-4 text-center">
                      <img src="assets/images/info-icon-02.png" alt="" style="max-width: 52px;">
                      <h4 class="tm-text-primary"><?= htmlspecialchars(ds('service2_title','Sécurité',$settings)) ?></h4>
                    </div>
                    <div class="col-lg-4 mb-4 text-center">
                      <img src="assets/images/info-icon-03.png" alt="" style="max-width: 52px;">
                      <h4 class="tm-text-primary"><?= htmlspecialchars(ds('service3_title','Maintenance',$settings)) ?></h4>
                    </div>
                  </div>

                  <div class="row mb-5">
                    <div class="col-lg-12 text-center">
                      <h3 class="tm-text-primary mb-4"><?= htmlspecialchars(ds('erp_title','ERP DIMS',$settings)) ?></h3>
                      <p class="lead mb-4"><?= htmlspecialchars(ds('erp_desc',"La solution de gestion intégrée qui vous permet d'avoir une vue d'ensemble en temps réel sur toute votre activité.",$settings)) ?></p>
                    </div>
                  </div>

                  <!-- ERP DIMS Visual -->
                  <div class="row mb-5">
                    <div class="col-lg-12">
                      <div class="erp-visual-container text-center">
                        <div class="erp-network">
                          <!-- Central ERP Module -->
                          <div class="erp-central">
                            <div class="erp-logo">
                              <i class="fas fa-cogs"></i>
                              <i class="fas fa-bullhorn"></i>
                              <i class="fas fa-cogs"></i>
                            </div>
                            <div class="erp-label">ERP</div>
                          </div>

                          <!-- Connected Modules -->
                          <div class="erp-module erp-module-1">
                            <i class="fas fa-file-alt"></i>
                            <span>Rapports</span>
                          </div>
                          <div class="erp-module erp-module-2">
                            <i class="fas fa-users"></i>
                            <span>RH</span>
                          </div>
                          <div class="erp-module erp-module-3">
                            <i class="fas fa-chart-pie"></i>
                            <span>Analytics</span>
                          </div>
                          <div class="erp-module erp-module-4">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Planning</span>
                          </div>
                          <div class="erp-module erp-module-5">
                            <i class="fas fa-eye"></i>
                            <span>Monitoring</span>
                          </div>
                          <div class="erp-module erp-module-6">
                            <i class="fas fa-file-invoice"></i>
                            <span>Finance</span>
                          </div>
                          <div class="erp-module erp-module-7">
                            <i class="fas fa-chart-line"></i>
                            <span>Business Intelligence</span>
                          </div>

                          <!-- Connection Lines -->
                          <svg class="erp-connections" viewBox="0 0 400 300">
                            <defs>
                              <linearGradient id="lineGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                <stop offset="0%" style="stop-color: var(--primary); stop-opacity:0.3" />
                                <stop offset="50%" style="stop-color: var(--primary); stop-opacity:0.8" />
                                <stop offset="100%" style="stop-color: var(--primary); stop-opacity:0.3" />
                              </linearGradient>
                            </defs>
                            <line x1="200" y1="150" x2="340" y2="60" stroke="url(#lineGradient)" stroke-width="2"/>
                            <line x1="200" y1="150" x2="320" y2="120" stroke="url(#lineGradient)" stroke-width="2"/>
                            <line x1="200" y1="150" x2="320" y2="180" stroke="url(#lineGradient)" stroke-width="2"/>
                            <line x1="200" y1="150" x2="80" y2="180" stroke="url(#lineGradient)" stroke-width="2"/>
                            <line x1="200" y1="150" x2="80" y2="120" stroke="url(#lineGradient)" stroke-width="2"/>
                            <line x1="200" y1="150" x2="60" y2="60" stroke="url(#lineGradient)" stroke-width="2"/>
                            <line x1="200" y1="150" x2="160" y2="240" stroke="url(#lineGradient)" stroke-width="2"/>
                          </svg>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <!-- Carte 1 -->
                    <div class="col-lg-4 col-md-6 mb-4">
                      <div class="card shadow-sm h-100 text-center p-3">
                        <img src="<?= htmlspecialchars(ds('card1_image','assets/images/icon-11.jpg',$settings)) ?>" alt="Icône AGROMEX" class="mx-auto mb-3 img-fluid" style="max-width: 250px; height: auto;">
                        <h4 class="tm-text-primary"><?= htmlspecialchars(ds('card1_title','AGROMEX',$settings)) ?></h4>
                        <p><?= htmlspecialchars(ds('card1_desc','Logiciel de gestion des produits agro-industriels',$settings)) ?></p>
                        <a href="#" class="btn btn-outline-primary mt-2">Savoir plus</a>
                      </div>
                    </div>

                    <!-- Carte 2 -->
                    <div class="col-lg-4 col-md-6 mb-4">
                      <div class="card shadow-sm h-100 text-center p-3">
                        <img src="<?= htmlspecialchars(ds('card2_image','assets/images/icon-12.jpg',$settings)) ?>" alt="Icône AGRICE" class="mx-auto mb-3 img-fluid" style="max-width: 250px; height: auto;">
                        <h4 class="tm-text-primary"><?= htmlspecialchars(ds('card2_title','AGRICE',$settings)) ?></h4>
                        <p><?= htmlspecialchars(ds('card2_desc','Gestion des coopératives agricoles et traçabilité',$settings)) ?></p>
                        <a href="#" class="btn btn-outline-primary mt-2">Savoir plus</a>
                      </div>
                    </div>

                    <!-- Carte 3 -->
                    <div class="col-lg-4 col-md-6 mb-4">
                      <div class="card shadow-sm h-100 text-center p-3">
                        <img src="<?= htmlspecialchars(ds('card3_image','assets/images/icon-06.jpg',$settings)) ?>" alt="Icône COMPTA" class="mx-auto mb-3 img-fluid" style="max-width: 250px; height: auto;">
                        <h4 class="tm-text-primary"><?= htmlspecialchars(ds('card3_title','SOFT-COMPTA',$settings)) ?></h4>
                        <p><?= htmlspecialchars(ds('card3_desc','Comptabilité générale et analytique',$settings)) ?></p>
                        <a href="#" class="btn btn-outline-primary mt-2">Savoir plus</a>
                      </div>
                    </div>

                    <!-- Carte 4 -->
                    <div class="col-lg-4 col-md-6 mb-4">
                      <div class="card shadow-sm h-100 text-center p-3">
                        <img src="<?= htmlspecialchars(ds('card4_image','assets/images/icon-07.jpg',$settings)) ?>" alt="Icône REEL" class="mx-auto mb-3 img-fluid" style="max-width: 250px; height: auto;">
                        <h4 class="tm-text-primary"><?= htmlspecialchars(ds('card4_title','REEL',$settings)) ?></h4>
                        <p><?= htmlspecialchars(ds('card4_desc','Gestion des écoles et suivi des emplois du temps',$settings)) ?></p>
                        <a href="#" class="btn btn-outline-primary mt-2">Savoir plus</a>
                      </div>
                    </div>

                    <!-- Carte 5 -->
                    <div class="col-lg-4 col-md-6 mb-4">
                      <div class="card shadow-sm h-100 text-center p-3">
                        <img src="<?= htmlspecialchars(ds('card5_image','assets/images/icon-02.jpg',$settings)) ?>" alt="Icône pesage" class="mx-auto mb-3 img-fluid" style="max-width: 250px; height: auto;">
                        <h4 class="tm-text-primary"><?= htmlspecialchars(ds('card5_title','XPESAGE',$settings)) ?></h4>
                        <p><?= htmlspecialchars(ds('card5_desc','Logiciel de suivi de pesage',$settings)) ?></p>
                        <a href="#" class="btn btn-outline-primary mt-2">Savoir plus</a>
                      </div>
                    </div>

                    <!-- Carte 6 -->
                    <div class="col-lg-4 col-md-6 mb-4">
                      <div class="card shadow-sm h-100 text-center p-3">
                        <img src="<?= htmlspecialchars(ds('card6_image','assets/images/icon-05.jpg',$settings)) ?>" alt="Icône GESCOM" class="mx-auto mb-3 img-fluid" style="max-width: 250px; height: auto;">
                        <h4 class="tm-text-primary"><?= htmlspecialchars(ds('card6_title','GESCOM',$settings)) ?></h4>
                        <p><?= htmlspecialchars(ds('card6_desc','Logiciel de gestion commerciale',$settings)) ?></p>
                        <a href="#" class="btn btn-outline-primary mt-2">Savoir plus</a>
                      </div>
                    </div>

                    <!-- Carte 7 -->
                    <div class="col-lg-4 col-md-6 mb-4 mx-auto">
                      <div class="card shadow-sm h-100 text-center p-3">
                        <img src="<?= htmlspecialchars(ds('card7_image','assets/images/icon-13.jpg',$settings)) ?>" alt="Icône MANAGER RH" class="mx-auto mb-3 img-fluid" style="max-width: 250px; height: auto;">
                        <h4 class="tm-text-primary"><?= htmlspecialchars(ds('card7_title','MANAGER RH',$settings)) ?></h4>
                        <p><?= htmlspecialchars(ds('card7_desc','Logiciel de paie et de gestion RH',$settings)) ?></p>
                        <a href="#" class="btn btn-outline-primary mt-2">Savoir plus</a>
                      </div>
                    </div>
                  </div>

                  <div class="text-right mt-4">
                    <a href="nosolution.html" class="btn btn-primary tm-btn-next">Découvrez nos solutions</a>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="bg-dark text-white pt-5 pb-4">
      <div class="container">
        <div class="row">
          <!-- Côte d'Ivoire -->
          <div class="col-md-4 mb-4">
            <h5 class="text-uppercase mb-3">CÔTE D'IVOIRE</h5>
            <ul class="list-unstyled">
              <li><i class="fas fa-map-marker-alt me-2"></i>Abidjan</li>
              <li><i class="fas fa-phone me-2"></i>+225 05 06 80 80 85</li>
              <li><i class="fas fa-phone me-2"></i>+225 27 22 43 87 90</li>
              <li><i class="fas fa-map-marker-alt me-2"></i>San Pedro</li>
              <li><i class="fas fa-phone me-2"></i>+225 27 34 71 06 58</li>
              <li><i class="fas fa-envelope me-2"></i>contact@groupe-directsoft.com</li>
              <li><i class="fas fa-map-marker-alt me-2"></i>25 BP 202 Cidex Abidjan 25</li>
            </ul>
          </div>

          <!-- Nigeria -->
          <div class="col-md-4 mb-4">
            <h5 class="text-uppercase mb-3">NIGERIA</h5>
            <ul class="list-unstyled">
              <li><i class="fas fa-map-marker-alt me-2"></i>48 km from Lagos, Block 6 House 4 Estate</li>
              <li><i class="fas fa-phone me-2"></i>+234 816 078 5808</li>
              <li><i class="fas fa-map-marker-alt me-2"></i>Ogun State</li>
              <li><i class="fas fa-envelope me-2"></i>contact@groupe-directsoft.com</li>
              <li><i class="fas fa-map-marker-alt me-2"></i>13 RCCG CAMP Ogun</li>
            </ul>
          </div>

          <!-- Cameroun -->
          <div class="col-md-4 mb-4">
            <h5 class="text-uppercase mb-3">CAMEROUN</h5>
            <ul class="list-unstyled">
              <li><i class="fas fa-map-marker-alt me-2"></i>Douala</li>
              <li><i class="fas fa-phone me-2"></i>+237 69 93 85 473</li>
              <li><i class="fas fa-phone me-2"></i>+237 23 34 70 751</li>
              <li><i class="fas fa-map-marker-alt me-2"></i>Kribi</li>
              <li><i class="fas fa-phone me-2"></i>+237 67 54 07 086</li>
              <li><i class="fas fa-envelope me-2"></i>contact@groupe-directsoft.com</li>
              <li><i class="fas fa-map-marker-alt me-2"></i>BP 6627 Douala</li>
            </ul>
          </div>
        </div>

        <hr class="border-light">

        <div class="row">
          <div class="col-lg-12 text-center">
            <p class="mb-0">
              &copy; 1998-2023 Groupe DIRECTSOFT. Tous droits réservés.
              Design : <a href="https://www.groupe-directsoft.com" class="text-light" target="_blank">Ruth_anf</a>
            </p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/counter.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/dynamic-content.js"></script>
    <script>
      document.querySelector('.menu-trigger')?.addEventListener('click', function() {
        document.querySelector('.nav')?.classList.toggle('active');
      });
    </script>
  </body>
</html>