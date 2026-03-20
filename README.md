# 🌍 Foo Trip 
Bienvenue sur le projet Foo Trip, une application de gestion de destinations développée avec Symfony 8

# 🛠️ Pré-requis
  PHP >= 8.4
  
  Composer

# 🚀 Installation et Configuration
Cloner le projet
  git clone https://github.com/Dielvy/foo.git
  cd foo
  git checkout dev


# Installer les dépendances
  composer install

# Configurer l'environnement
Créez un fichier .env.local à la racine et ajustez vos variables :
  DATABASE_URL=""
  API_BASE_URL="http://127.0.0.1:8000" // URL locale pour les commandes consommant l'API

# Initialiser la base de données
  php bin/console doctrine:database:create
  php bin/console doctrine:migrations:migrate --no-interaction

# Charger les données de test (Fixtures)
Cela créera des destinations ainsi qu'un utilisateur administrateur.
  php bin/console doctrine:fixtures:load --no-interaction



# 🔐 Accès et Identifiants
Front-office : / (Liste des destinations)
Détail : /destination/{id}
Administration : /admin
  Login : admin@example.com
  Password : password
Documentation API : /api

# 📟 Commandes
Pour générer un rapport CSV des destinations, utilisez la commande suivante :
  php bin/console app:export-destinations
Le fichier sera généré dans le dossier var/destinations.csv.

# 🧪 Tests
Pour s'assurer de la stabilité du projet, vous pouvez lancer la suite de tests PHPUnit :
  php bin/phpunit
