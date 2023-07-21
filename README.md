# ChallengeStack2

## Moving House
CMS d'agence immobiliere

## Installation
Une fois le code récupéré, il faut faire un 

```sh
cd www/public/react/
```

pour compilé le js

```sh 
npm run build
```   
Pui faire un

```sh
npx tailwindcss -i src/index.css -o ./dist/index.css --watch
```

## Lancement sous docker

```sh
docker compose up
```

Le CMS seras accesible via le port 80 du localhost