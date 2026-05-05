<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Repository\ConsoleRepository;
use App\Repository\GameRepository;
use App\Entity\Console;
use App\Entity\Game;
use App\Utils\Tools;
use DateTime;


class GameController extends AbstractController
{
    //Attributs
    private ConsoleRepository $consoleRepository;
    private GameRepository $gameRepository;

    //Constructeur
    public function __construct()
    {
        //Injection des dependances
        $this->consoleRepository = new ConsoleRepository();
        $this->gameRepository = new GameRepository();
    }

    //Méthodes

    /**
     * Méthode pour ajouter un Jeu (Game)
     * @return mixed Retourne le template
     */
    public function addGame()
    {
        $data = [];
        $consoles = $this->consoleRepository->findAllConsoles();
        $data['consoles'] = $consoles;

        if (isset($_POST["submit"])) {
            if (!empty($_POST["title"]) && !empty($_POST["type"]) && !empty($_POST["publish_at"]) && !empty($_POST["console"])) {
                $title = Tools::sanitize($_POST["title"]);
                $type = Tools::sanitize($_POST["type"]);
                $publish_at = Tools::sanitize($_POST["publish_at"]);
                $console_id = Tools::sanitize($_POST["console"]);

                $console_obj = null;
                foreach ($data['consoles'] as $key => $value) {
                    if ($value->getId() == $console_id) {
                        $console_obj = $value;
                        break;
                    }
                }

                $publish_at_new = new DateTime($publish_at);

                $game = new Game($title, $type, $publish_at_new, $console_obj);
                $this->gameRepository->saveGame($game);
            } else {
                $data["msg"] = "Veuillez remplir tous les champs";
            }
        }
        return $this->render('add_game', 'Ajouter un jeu', $data);
    }


    /**
     * Méthode pour afficher la liste des Jeux (Game)
     * @return mixed Retourne le template
     */
    public function showAllGames(): mixed 
    {
        return "template avec la méthode render";
    }
}
