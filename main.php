<?php declare(strict_types=1);
/**
 * main.php
 *
 * Point d'entrée de l'application CLI de gestion de contacts.
 * Gère la lecture des commandes utilisateur et délègue l'exécution
 * à la classe App\Command\Command.
 *
 *
 * Date : Mercredi 26 novembre 2025
 * Maj  : Vendredi 28 novembre 2025
 * Auteur : Salem Hadjali
 */

require_once __DIR__ . '/vendor/autoload.php';

use App\Command\Command;



$command = new Command();

while (true) {
    // Lecture du prompt (saisie utilisateur)
    $line = trim(readline("Commandes (list, detail [id], create [name, email, phone], modify [id, name, email, phone], delete [id], help, quit) : "));

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
        // Affectation et nettoyage avec create en BDD
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

    // Update d'un contact
    // Format attendu : modify <id>, <prénom nom>, <email>, <tél>
    // Ex. : modify 3, Salem Hadjali, salem.hadjali@sh.com, 0455667788
    if (preg_match('/^modify\s+(\d+),\s*([^,]+),\s*([^,]+),\s*(.+)$/', $line, $matches)) {
        $id    = (int) $matches[1];
        $name  = trim($matches[2]);
        $email = trim($matches[3]);
        $phone = trim($matches[4]);

        $command->modify($id, $name, $email, $phone);
        continue;
    }

    // Affichage de l'aide sur les cocommandes
    if ($line === 'help') {
        $command->help();
        continue;
    }

    echo "Commande inconnue.\n";
}
