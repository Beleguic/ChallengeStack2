# ChallengeStack2

## Moving House
CMS d'agence immobilière

## Installation
Une fois le code récupéré, il faut faire un 

```sh
cd www/public/react/
```

pour compiler le js

```sh 
npm run build
```   
Puis faire un

```sh
npx tailwindcss -i src/index.css -o ./dist/index.css --watch
```

## Lancement sous docker

```sh
docker compose up
```

Le CMS sera accessible via le port 80 du localhost
