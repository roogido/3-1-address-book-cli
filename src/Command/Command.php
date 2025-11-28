<?php declare(strict_types=1);
/**
 * Command.php
 *
 * Contient toute la logique d’exécution des commandes CLI :
 * list, detail, create, modify, delete, help.
 * Délègue la récupération et la persistance des données au ContactManager.
 *
 * Date : Mercredi 26 novembre 2025
 * Maj  : Vendredi 28 novembre 2025
 * Auteur : Salem Hadjali
 */

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
            echo $contact . "\n";
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

        echo $contact . "\n";
    }    
    
    /**
     * 
     * Création d'un nouveau contact
     */   
    public function create(string $name, string $email, string $phone): void
    {
        $contact = $this->manager->create($name, $email, $phone);

        echo $contact . "\n";
    }  

    /**
     * Suppression d'un contact à partir de son id
     */       
    public function delete(int $id): void
    {
        $contact = $this->manager->findById($id);

        if ($contact === null) {
            echo "Aucun contact trouvé pour l’ID {$id}.\n";
            return;
        }

        $this->manager->delete($id);

        echo "Contact ID {$id} supprimé.\n";
    }

    /**
     * Update d'un contact
    */  
    public function modify(int $id, string $name, string $email, string $phone): void
    {
        $contact = $this->manager->findById($id);

        if ($contact === null) {
            echo "Contact introuvable pour l’ID {$id}.\n";
            return;
        }

        $updated = $this->manager->update($id, $name, $email, $phone);

        echo "Contact mis à jour : " . $updated . "\n";
    }

    /**
     * Aide affichée
     */       
    public function help(): void
    {
        echo "Commandes disponibles :\n";
        echo "  list                            - Affiche tous les contacts\n";
        echo "  detail [id]                     - Affiche un contact via son identifiant\n";
        echo "  create name, email, phone       - Ajoute un nouveau contact\n";
        echo "  delete [id]                     - Supprime un contact via son identifiant\n";
        echo "  modify [id], name, email, phone - Modifie un contact existant\n";
        echo "  help                            - Affiche cette aide\n";
        echo "  quit                            - Quitte l'application\n";
    }    

}
