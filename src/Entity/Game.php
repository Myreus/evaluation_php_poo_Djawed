<?php

namespace App\Entity;

use Datetime;

class Game
{
    //Attributs
    private int $id;
    private string $title;
    private string $type;
    private \Datetime $publish_at;
    private Console $console;

    //Constructeur
    public function __construct(
        string $title, string $type, \Datetime $publish_at, Console $console
    ){
        $this->title = $title;
        $this->type = $type;
        $this->publish_at = $publish_at;
        $this->console = $console;
    }

    //Getters et Setters
    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(?int $id): self 
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
    public function setTitle(string $title): self 
    {
        $this->title = $title;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }
    public function setType(string $type): self 
    {
        $this->type = $type;
        return $this;
    }

    public function getPublishAt(): \DateTime
    {
        return $this->publish_at;
    }
    public function setPublishAt(\DateTime $publish_at): self 
    {
        $this->publish_at = $publish_at;
        return $this;
    }

    public function getConsole(): Console
    {
        return $this->console;
    }
    public function setConsole(?Console $console): self
    {
        $this->console = $console;
        return $this;
    }
}
