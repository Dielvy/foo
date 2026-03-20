# 🌍 Foo Trip 
Bienvenue sur le projet Foo Trip, une application de gestion de destinations développée avec Symfony 8

# 🛠️ Pré-requis
  PHP >= 8.4
  
  Composer

# I. Installation et Configuration
Cloner le projet

  git clone https://github.com/Dielvy/foo.git
  
  cd foo
  
  git checkout dev


# II. Installer les dépendances
  composer install

# III. Configurer l'environnement
Créez un fichier .env.local à la racine et ajustez vos variables :

  DATABASE_URL=""
  
  API_BASE_URL="http://127.0.0.1:8000" // URL locale pour les commandes consommant l'API

# IV. Initialiser la base de données
  php bin/console doctrine:database:create
  
  php bin/console doctrine:migrations:migrate --no-interaction

# V. Charger les données de test (Fixtures)
Cela créera des destinations ainsi qu'un utilisateur administrateur.

  php bin/console doctrine:fixtures:load --no-interaction

# VI. Démarrer le serveur 
symfony serve

# VII. Routes
Homepage : / (Liste des destinations)

Détail : /destination/{id}

Administration : /admin

  Login : admin@example.com
  
  Password : password
  
Documentation API : /api

# VIII. Commandes
Pour générer un rapport CSV des destinations, utilisez la commande suivante :

  php bin/console app:export-destinations
  
Le fichier sera généré dans le dossier var/destinations.csv, et vous pouvez l'ouvrir sur https://csv-viewer-online.github.io/

# IX. Tests
Pour s'assurer de la stabilité du projet, vous pouvez lancer la suite de tests PHPUnit :

  php bin/console doctrine:migrations:migrate --env=test
  
  php bin/phpunit
