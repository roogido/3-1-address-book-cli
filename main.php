<?php declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Command\Command;



$command = new Command();

while (true) {
    $line = trim(readline("Commandes (list, quit) : "));

    if ($line === 'quit') {
        echo "Au revoir !\n";
        exit(0);
    }

    if ($line === 'list') {
        $command->list();
        continue;
    }

    echo "Commande inconnue.\n";
}
