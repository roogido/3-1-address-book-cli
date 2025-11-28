<?php declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Command\Command;



$command = new Command();

while (true) {
    $line = trim(readline("Commandes (list, detail [id], quit) : "));

    if ($line === 'quit') {
        echo "Au revoir !\n";
        exit(0);
    }

    if ($line === 'list') {
        $command->list();
        continue;
    }

    // Commande detail <id>
    if (preg_match('/^detail\s+(\d+)$/', $line, $matches)) {
        $id = (int) $matches[1];
        $command->detail($id);
        continue;
    }

    echo "Commande inconnue.\n";
}
