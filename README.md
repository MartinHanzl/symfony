# Symfony aplikace

## Technické požadavky
- Docker
- composer
- PHP 8.4 nebo vyšši
- symfony CLI

## Instalace
- `git clone git@github.com:MartinHanzl/symfony.git`
- `cd symfony`
- `composer install`
- `docker-compose up -d`
- `symfony server:start`
- `php bin/console doctrine:migrations:migrate`
- 
## Použité příkazy
- `php bin/console make:entity`
- `php bin/console make:migration`
- `php bin/console doctrine:migrations:migrate`
- `php bin/console debug:router`
- `php bin/console cache:clear`
- `php bin/console make:crud Contact`

## Moje poznámky
- stránkování je uděláno po 1 pouze z důvodu snadného otestování
- největší překážkou mi byla "SEO friendly" URL adresa kontaktu
