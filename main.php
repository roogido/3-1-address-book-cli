<?php declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Manager\ContactManager;



$manager = new ContactManager();

while (true) {
    $line = trim(readline("Commandes (list, quit) : "));

    if ($line === 'quit') {
        echo "Au revoir !\n";
        exit(0);
    }

    if ($line === 'list') {
        $contacts = $manager->findAll();                // Contient les objets contacts

        if (empty($contacts)) {
            echo "Aucun contact.\n";
            continue;
        }

        foreach ($contacts as $contact) {
            echo $contact->toString() . "\n";           // Affichage d'un contact
        }

        continue;
    }

    echo "Commande inconnue.\n";
}
