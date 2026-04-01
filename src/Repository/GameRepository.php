<?php

namespace App\Repository;

use App\Database\Mysql;
use App\Entity\Console;
use App\Entity\Game;

class GameRepository
{
    //Attribut
    private \PDO $connect;

    //Constructeur
    public function __construct()
    {
        //Injection des dependances
        $this->connect = (new Mysql)->connectBDD();
    }

    //Méthodes

    /**
     * Méthode qui ajoute une jeu (Game) en BDD
     * @return void
     * @throws \Exception Erreurs SQL
     */
    public function saveGame(Game $game): void {
        $sql = "INSERT INTO video_game(title, `type`, publish_at, console_id) VALUES (?, ?, ?, ?)";
        $req = $this->connect->prepare($sql);
        $req->bindValue(1, $game->getTitle(), \PDO::PARAM_STR);
        $req->bindValue(2, $game->getType(), \PDO::PARAM_STR);
        $req->bindValue(3, $game->getPublishAt(), \PDO::PARAM_STR);
        $console = $game->getConsole();
        $req->bindValue(4, $console->getId(), \PDO::PARAM_INT);
        $req->execute();
    }
    
    /**
     * Méthode qui retourne la liste des jeux (Game)
     * @return array<Game> Retourne le tableau des jeux (Game)
     * @throws \Exception Erreurs SQL
     */
    public function findAllGames(): array 
    {
        //1 Ecrire la requête,
        //2 Préparer la requête,
        //3 Assigner le paramètre,
        //4 Exécuter la requête,
        

        return [];
    }

}
