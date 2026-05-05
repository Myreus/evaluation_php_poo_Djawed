<?php

namespace App\Controller;

use App\Controller\AbstractController;

class HomeController extends AbstractController
{

    public function __construct() {}

    /**
     * Méthode pour afficher la page d'accueil
     * @return mixed Retourne le template
     */
    public function index()
    {

        return $this->render("home", "accueil");
    }
}
