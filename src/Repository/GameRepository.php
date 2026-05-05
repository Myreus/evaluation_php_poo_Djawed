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
        $sql = "INSERT INTO video_game(title, `type`, publish_at, id_console) VALUES (?, ?, ?, ?)";
        $req = $this->connect->prepare($sql);
        $req->bindValue(1, $game->getTitle(), \PDO::PARAM_STR);
        $req->bindValue(2, $game->getType(), \PDO::PARAM_STR);
        $req->bindValue(3, $game->getPublishAt()->format('Y-m-d'), \PDO::PARAM_STR);
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
        $sql = "SELECT vg.id, vg.title, vg.type, vg.publish_at, vg.id_console FROM video_game AS vg";
        $req = $this->connect->prepare($sql);
        $req->execute();
        $rows = $req->fetchAll(\PDO::FETCH_ASSOC);

        $games = [];
        foreach ($rows as $row) {
            $game = new Game($row['title'], $row['type'], $row['publish_at'], $row['id_console']);
            $game->setId($row['id']);
            $games[] = $game;
        }

        return $games;
    }

}
