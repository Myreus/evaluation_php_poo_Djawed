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
        $rows = $req->fetchAll(\PDO::FETCH_ASSOC);

        $consoles = [];
        foreach ($rows as $row) {
            $console = new Console($row['name'], $row['manufacturer']);
            $console->setId($row['id']);
            $consoles[] = $console;
        }

        return $consoles;
    }
}
