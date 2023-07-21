<?php

namespace App\Controllers;
use App\Core\Controller;
use App\Models\v_Agent;
use App\Models\v_Annonce;



class SiteMapController extends Controller{


    public function generateSitemap($data) {
    // Initialise le contenu du sitemap XML
    $xml = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    // Liste des routes dynamiques avec leurs données
    $routes = [
        [
            'url' => '/annonce/annonce-dynamique-1',
            'lastmod' => '2023-07-20', // Date de la dernière modification de la page
            'changefreq' => 'weekly', // Fréquence de changement de la page (daily, weekly, monthly, etc.)
            'priority' => '0.8', // Priorité de la page (valeur entre 0.0 et 1.0)
        ],
        [
            'url' => '/user/user-dynamique-1',
            'lastmod' => '2023-07-21',
            'changefreq' => 'monthly',
            'priority' => '0.6',
        ],
        // Ajoutez d'autres routes dynamiques ici...
    ];

    // Génère les balises URL pour chaque route dynamique
    foreach ($routes as $route) {
        $xml .= '
  <url>
    <loc>https://www.example.com' . $route['url'] . '</loc>
    <lastmod>' . $route['lastmod'] . '</lastmod>
    <changefreq>' . $route['changefreq'] . '</changefreq>
    <priority>' . $route['priority'] . '</priority>
  </url>';
    }

    // Ferme la balise du sitemap
    $xml .= '
</urlset>';
   
    // Retourne le contenu du sitemap généré
    return $xml;
    }


    public function getSitemap(){
        $this->setView("Sitemap/sitemap");
        $this->setTemplate("sitemap");
        $annonces = new v_Annonce();
        $agents = new v_Agent();
        $this->assign("annonces",$annonces->getAll());
        $this->assign("agents",$agents->getAll());
        

        
        header('Content-Type: application/xml');

    // Affiche le contenu du sitemap
        return $this->render();
    }

    
    

}