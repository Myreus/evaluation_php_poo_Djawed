<?php

//import de de l'autoload
include '../vendor/autoload.php';

//Charger les variables d'environnement
$dotenv = Dotenv\Dotenv::createImmutable("../");
$dotenv->load();

//récupération de l'url
$url = parse_url($_SERVER["REQUEST_URI"]);
$path = isset($url["path"]) ? $url["path"] : "/";
//Import des classes
use App\Controller\HomeController;
use App\Controller\GameController;

//Instance des controllers
$homeController = new HomeController();
$gameController = new GameController();

//Router
switch ($path) {
        case '/public/':
            $homeController->index();
            break;
        case '/public/game/add':
            $gameController->addGame();
            break;
        case '/public/games':
            $gameController->showAllGames();
            break;
        default:
            $errorController->error404();
            break;
    }