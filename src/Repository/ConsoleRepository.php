<?php

namespace App\Repository;

use App\Database\Mysql;
use App\Entity\Console;

class ConsoleRepository
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
     * Méthode qui retourne la liste des consoles (Console)
     * @return array<Console> Retourne le tableau des consoles (Console)
     * @throws \Exception Erreurs SQL
     */
    public function findAllConsoles(): array 
    {
        $sql = "SELECT c.id, c.name, c.manufacturer FROM console AS c";
        $req = $this->connect->prepare($sql);
        $req->execute();
        //5 Fetch en FETCH assoc + hydratation en Account
        $allConsoles = $req->fetchAll(\PDO::FETCH_ASSOC);

        return $allConsoles;
    }
}
