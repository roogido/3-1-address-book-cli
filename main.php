<?php

declare(strict_types=1);

// Boucle principale CLI
while (true) {
    $line = readline("Entrez votre commande : ");

    // On trim pour éviter les espaces parasites
    $line = trim($line);

    echo "Vous avez saisi : {$line}\n";
}
