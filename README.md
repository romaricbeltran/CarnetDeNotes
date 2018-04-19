# CarnetDeNotes
=============

Une application Web Symfony pour gérer les notes de vos élèves.

# Installation
## 1. Récupérer le code

git clone https://github.com/romaricbeltran/CarnetDeNotes.git

## 2. Définir vos paramètres d'application

Dans parameters.yml

## 3. Télécharger les vendors

cd CarnetDeNotes/

composer install

## 4. Créez la base de données

    php bin/console doctrine:database:create

Puis créez les tables correspondantes au schéma Doctrine :

    php bin/console doctrine:schema:update --dump-sql
    php bin/console doctrine:schema:update --force
    
## 5. Publiez les assets
Publiez les assets dans le répertoire web :

    php bin/console assets:install web
    
## 6. Démarrer le serveur

    php bin/console server:start
    
## 7. Aller sur localhost:8000