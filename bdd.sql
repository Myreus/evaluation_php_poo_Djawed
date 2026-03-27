CREATE DATABASE IF NOT EXISTS games CHARSET utf8mb4;

USE games;

CREATE TABLE IF NOT EXISTS console(
id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
`name` VARCHAR(50) UNIQUE NOT NULL,
manufacturer VARCHAR(50) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS video_game(
id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
title VARCHAR(50) NOT NULL,
`type` VARCHAR(50) NOT NULL,
publish_at DATE NOT NULL,
id_console INT NOT NULL
)ENGINE=InnoDB;

ALTER TABLE video_game
ADD CONSTRAINT fk_publish_console
FOREIGN KEY(id_console)
REFERENCES console(id)
ON DELETE CASCADE;

INSERT INTO console (`name`, manufacturer)
	VALUES ("Playstation 5", "Sony"),
    ("Switch", "Nintendo"),
    ("Xbox Series X", "Microsoft"),
	("Steam Deck", "Valve");
    