# GRAVITY
## Getting Started
```bash
composer create-project gravity-framework/gravity nom_de_mon_projet
```
Pour créer votre projet en utilisant gravity et ses dépendances

## CLI (Générateur)

Installez les dépendances puis exécutez:

```bash
php bin/gravity help
```

Commandes disponibles:

- make:controller Name [--force]
- make:entity Name [--force]
- make:repository Name [--entity=EntityName] [--force]
- make:routes Name [--force]
- make:view Dot.Notation [--title="Titre"] [--layout=GRAVITY.layout] [--force]
- make:resource Name [--views] [--layout=GRAVITY.layout] [--force]

Exemples:

```bash
php bin/gravity make:controller UsersController
php bin/gravity make:entity User
php bin/gravity make:repository UserRepository --entity=User
php bin/gravity make:routes UsersRoutes
php bin/gravity make:view Blog.index --title="Blog"
php bin/gravity make:resource User --views
```
