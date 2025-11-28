<?php declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Command\Command;



$command = new Command();

while (true) {
    // Lecture du prompt (saisie utilisateur)
    $line = trim(readline("Commandes (list, detail [id], create name, email, phone, delete [id], quit) : "));

    // Quitter l'appli.
    if ($line === 'quit') {
        echo "Au revoir !\n";
        exit(0);
    }

    // Lister/lecture le carnet d'adresse
    if ($line === 'list') {
        $command->list();
        continue;
    }

    // Affiche le Détail d'un seul contact à partir de son id
    // Commande & Format attendu : detail <id>
    if (preg_match('/^detail\s+(\d+)$/', $line, $matches)) {
        $id = (int) $matches[1];
        $command->detail($id);
        continue;
    }

    // Création d'un nouveau contact
    // Commande & Format attendu : create <Nom>, <email>, <num. tél>
    if (preg_match('/^create\s+([^,]+),\s*([^,]+),\s*(.+)$/', $line, $matches)) {
        $name  = trim($matches[1]);
        $email = trim($matches[2]);
        $phone = trim($matches[3]);

        $command->create($name, $email, $phone);
        continue;
    }    

    // Suppression d'un contact à partir de son id
    // Commande & Format attendu : delete <id>
    if (preg_match('/^delete\s+(\d+)$/', $line, $matches)) {
        $id = (int) $matches[1];
        $command->delete($id);
        continue;
    }


    echo "Commande inconnue.\n";
}
