# Symfony aplikace

## Instalace
- git clone git@github.com:MartinHanzl/symfony.git
- cd symfony
- composer install
- docker-compose up -d
- symfony server:start
- php bin/console doctrine:migrations:migrate

## Použité příkazy
- php bin/console make:entity
- php bin/console make:migration
- php bin/console doctrine:migrations:migrate
- php bin/console debug:router
- php bin/console cache:clear
