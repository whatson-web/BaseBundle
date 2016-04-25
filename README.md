# Procédure d'installation locale
- Copier l'ensemble de ce dossier dans le dossier du nouveau git
- Lancer composer pour la première fois : `composer install`
- Créer la base de données : `app/console doctrine:database:create`
- Créer les tables de la base de données : `app/console doctrine:schema:update --force`
- Charger les fixtures : `app/console doctrine:fixtures:load`
- Relancer composer et vérifier qu'il n'y a pas d'erreurs : `composer update`

# Procédure d'installation en ligne
- Récupérer sa clé ssh : `cat .ssh/id_rsa.pub`
- Déclarer sa clé SSH dans Bitbucket > RepositoryDuProjet > Settings > Deployments keys. **Mettre en label le login ssh avec le serveur, par exemple : `projet-12345@nx1234.nexylan.net`**
- Installer le git du projet `git clone git@bitbucket.org:whatsonweb/projet.git dossier/`
- Aller dans le dossier dans lequel le git a été cloné, `cd dossier/`
- Installer composer (à faire uniquement si le fichier `composer.phar` n'existe pas) : `curl -sS https://getcomposer.org/installer | php`
- Lancer composer pour la première fois : `php composer.phar install`
- Créer les tables de la base de données : `php app/console doctrine:schema:update --force`
- Charger les fixtures : `php app/console doctrine:fixtures:load`
- Relancer composer et vérifier qu'il n'y a pas d'erreurs : `php composer.phar update`
