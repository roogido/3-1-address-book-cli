# Gestionnaire de contacts (CLI)

Application PHP en ligne de commande permettant de gérer un carnet d’adresses.
Ce projet a été réalisé dans le cadre de la formation OpenClassrooms — Développeur d’application Fullstack (2025–2026).
Il s’appuie sur une architecture orientée objet (OOP), utilise PDO pour accéder à une base MySQL/Maria DB, et propose plusieurs commandes CLI pour afficher, créer, modifier et supprimer des contacts.

---

## Fonctionnalités

L'application propose les commandes suivantes :

- **list**  
  Affiche la liste complète des contacts.

- **detail _id_**  
  Affiche les informations d’un contact spécifique.

- **create _name, email, phone_**  
  Crée un nouveau contact dans la base.

- **modify _id, name, email, phone_**  
  Met à jour un contact existant.

- **delete _id_**  
  Supprime un contact via son identifiant.

- **help**  
  Affiche la liste des commandes disponibles.

- **quit**  
  Quitte l’application.

---

## Architecture du projet
project/
├─ main.php                 # Point d'entrée CLI
├─ .env                     # Configuration locale (non versionnée)
├─ .env.example             # Exemple de configuration
├─ composer.json            # Dépendances & autoload PSR-4
└─ src/
   ├─ Command/
   │   └─ Command.php       # Logique d’exécution des commandes
   ├─ Database/
   │   └─ DBConnect.php     # Connexion PDO centralisée
   ├─ Entity/
   │   └─ Contact.php       # Représentation d’un contact (objet métier)
   └─ Manager/
       └─ ContactManager.php # Opérations CRUD sur les contacts

## 🛠️ Installation
### 1. Cloner le projet
git clone <url-du-depot>
cd project

### 2 Installer les dépendances
composer install

### 3 Préparer le fichier d’environnement
cp .env.example .env

Puis adapter les variables...


### 4 Créer la base de données
Un dump SQL complet est fourni dans la directory /sql
Commande :
mysql -u root -p address_book < sql/address_book.sql

## Utilisation
Lancer l'application :
php main.php

Exemples de commandes :
list
detail 4
create Jean Dupont, jean.dupont@mail.com, 0601020304
modify 5, Marie Curie, marie.curie@mail.com, 0708091011
delete 8
help
quit

## Requis 
- PHP 8.2+
- Composer
- MySQL ou MariaDB
- Extension PHP pdo_mysql