<?php declare(strict_types=1);

namespace App\Command;

use App\Manager\ContactManager;




class Command
{
    private ContactManager $manager;

    public function __construct()
    {
        $this->manager = new ContactManager();
    }

    /**
     * Affiche la liste complète des contacts
     */
    public function list(): void
    {
        $contacts = $this->manager->findAll();

        if (empty($contacts)) {
            echo "Aucun contact.\n";
            return;
        }

        foreach ($contacts as $contact) {
            echo $contact->toString() . "\n";
        }
    }
}
