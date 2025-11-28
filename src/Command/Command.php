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
     * Affiche la liste complète des contact
     */
    public function list(): void
    {
        $contacts = $this->manager->findAll() ;

        if (empty($contacts)) {
            echo "Aucun contact.\n";
            return;
        }

        foreach ($contacts as $contact) {
            echo $contact->toString() . "\n";
        }
    }

    /**
     * Affiche le détail d'un contact d
     */
    public function detail(int $id): void
    {
        $contact = $this->manager->findById($id);

        if ($contact === null) {
            echo "Aucun contact trouvvé pour l’ID {$id}.\n";
            return;
        }

        echo $contact->toString() . "\n";
    }        
}
