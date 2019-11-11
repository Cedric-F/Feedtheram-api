# Une légère API réalisée avec Symfony

## Installation

**Requiert**

* Composer
* PHP 7.x
* MariaDB
* PhpMyAdmin

**Cloner le repo**

`git clone https://github.com/Cedric-F/Feedtheram-api.git`

**Dépendances**

`composer install`

**Migration**

Mettre la base de donnée à jour avec
`php bin/console doctrine:migrations:migrate`

Charger les fixtures dans la BD avec
`php bin/console doctrine:fixtures:load`

(Optionnel: `--append` pour ne pas purger la base de donnée)

La BD est maintenant à jour avec une centaine d'éléments

**Serveur**

`php bin/console server:run api.feedtheram.com:8000`

## Requêtes

2 routes disponibles

* [http://api.feedtheram.com:8000/info/{nom}](http://api.feedtheram.com:8000/info/feedtheram)
 _Ou `/info`_

* [http://api.feedtheram.com:8000/Character/{id}](http://api.feedtheram.com:8000/Character/1)

Les réponses sont au format JSON

### CORS

Gestion des cors avec le package nelmio/cors

```
.env
...
###> nelmio/cors-bundle ###
CORS_ALLOW_ORIGIN=^https?://(localhost|127\.0\.0\.1|feedtheram.com)(:[0-9]+)?$
###< nelmio/cors-bundle ###
```

Modifiable à souhait.
