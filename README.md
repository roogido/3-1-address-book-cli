# Gestionnaire de contacts (CLI)

Application PHP en ligne de commande permettant de gérer un carnet d’adresses.  
Ce projet a été réalisé dans le cadre de la formation OpenClassrooms — Développeur d’application Fullstack (2025–2026).  
Il s’appuie sur une architecture orientée objet (OOP), utilise PDO pour accéder à une base MySQL/Maria DB, et propose plusieurs commandes CLI pour afficher, créer, modifier et supprimer des contacts.

---

## Fonctionnalités

L'application propose les commandes suivantes :

- **list** — Affiche la liste complète des contacts.  
- **detail _id_** — Affiche les informations d’un contact spécifique.  
- **create _name, email, phone_** — Crée un nouveau contact.  
- **modify _id, name, email, phone_** — Met à jour un contact existant.  
- **delete _id_** — Supprime un contact.  
- **help** — Affiche l’aide.  
- **quit** — Quitte l’application.  

---

## Architecture du projet

```text
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
```

---

## 🛠️ Installation

### 1. Cloner le projet

```bash
git clone <url-du-depot>
cd project
```

### 2. Installer les dépendances

```bash
composer install
```

### 3. Préparer le fichier d’environnement

```bash
cp .env.example .env
```

Puis adapter les variables selon votre configuration.

### 4. Créer la base de données

Un dump SQL complet est fourni :

```text
/sql
```

Commande d’import :

```bash
mysql -u root -p address_book < sql/address_book.sql
```

---

## ▶️ Utilisation

Lancer l'application :

```bash
php main.php
```

### Exemples de commandes

```text
list
detail 4
create Jean Dupont, jean.dupont@mail.com, 0601020304
modify 5, Marie Curie, marie.curie@mail.com, 0708091011
delete 8
help
quit
```

---

## Requis

- PHP 8.2+
- Composer
- MySQL ou MariaDB
- Extension PHP pdo_mysql
