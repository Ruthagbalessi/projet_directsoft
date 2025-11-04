<?php
// apply-design.php
if (!function_exists('getDesignSettings')) {

    function getDesignSettings() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "designdirectsoft";
        
        try {
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // ✅ Correction : requête vers la table design_site
            $stmt = $pdo->query("SELECT nom_parametre, valeur_parametre FROM design_site");
            $settings = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
            
            return $settings;
        } catch(PDOException $e) {
            return [
                'couleur_principale' => '#007bff',
                'couleur_secondaire' => '#6c757d',
                'couleur_texte' => '#333333',
                'couleur_fond' => '#f8f9fa',
                'couleur_header' => '#ffffff',
                'couleur_texte_header' => '#333333',
                'couleur_footer' => '#343a40',
                'couleur_texte_footer' => '#ffffff',
                'police_principale' => 'Poppins, sans-serif',
                'police_titres' => 'Poppins, sans-serif',
                'taille_texte_base' => '16',
                'titre_site' => 'Directsoft - Société Informatique',
                'description_site' => 'Boostez votre activité avec une solution durable et évolutive.',
                'hauteur_header' => '80'
            ];
        }
    }
}

$design_settings = getDesignSettings();
?>
