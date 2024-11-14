


![culinarc_transp](https://github.com/user-attachments/assets/bae613a4-0b2d-401a-8f2c-670dd74eb8fc)


## À propos de CulinArc

CulinArc est une plateforme web intuitive et accessible qui propose des recettes de cuisine organisées par catégories (entrées, plats, desserts, divers). L’objectif est de faciliter la recherche, la gestion et le partage de recettes, tout en offrant une expérience utilisateur personnalisée à travers des sessions utilisateurs et administrateurs.

## Lancement du projet en local

### Prérequis

- **PHP** 8.2.12 ou version ultérieure
- **Composer**
- **Node.js**
- **Base de données** : MariaDB 10.4.32 ou version supérieure

### Étapes de démarrage

1. **Cloner le dépôt**
   
```bash
   git clone https://github.com/HE-Arc/CulinArc.git
   cd CulinArc
```

2. **Installer les dépendances**

```bash
    composer install
    npm install
```

3. **Copiez le fichier .env.example pour créer un fichier .env, puis personnalisez les configurations**

```bash
cp .env.example .env
```

4. **Générer la clé de l’application**

```bash
php artisan key:generate
```

5. **Migrer et remplir la base de données**

```bash
php artisan migrate:fresh --seed
```

6. **Démarrer les serveurs**

```bash
php artisan serve
npm run dev
```
