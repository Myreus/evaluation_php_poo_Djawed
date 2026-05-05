<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main class="container-fluid">
        <h2>Ajouter un Jeu</h2>
        <form action="" method="post">
            <input type="text" name="title" placeholder="Saisir le titre">
            <input type="text" name="type" placeholder="Saisir le type de jeu">
            <input type="date" name="publish_at" placeholder="Saisir la date de publication du jeu">
            <select name="console">
                <?php
                    if (!empty($data['consoles'])) {
                        foreach ($data['consoles'] as $key => $console): ?>
                            <option value="<?= $console->getId() ?>">
                                <?= $console->getName() ?>
                            </option>
                        <?php endforeach;
                    }
                ?>
            </select>
            <input type="submit" name="submit" value="Ajouter">
        </form>
        <p><?= $data["msg"] ?? "" ?></p>
</body>
</html>