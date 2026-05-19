# Internal Tools API

## Technologies
- Langage: php
- Framework: aucun
- Base de données: MySQL
- Port API: [3006] (configurable)

## Quick Start

1. `docker-compose --profile mysql up -d`

2. Aucune installation de dépendance
3. J'ai mis mes fichiers dans Wamp pour permettre l'uttilisation de php.
4. API disponible sur http://localhost:[3306]
5. Documentation: Je n'ai pas de documentation suplémentaire

## Configuration
- Variables d'environnement: voir .env
- Configuration DB: dsn = "mysql:host=localhost;port=3306;dbname=internal_tools;charset=utf8mb4";

## Tests  
[commande_lancement_tests] - Tests unitaires + intégration
Je ne sais pas faire

## Architecture
- J'ai choisi php car il est répandu sur le web
- Je suis partie sur une structure MVC pour permettre de protéger les données et leur accées