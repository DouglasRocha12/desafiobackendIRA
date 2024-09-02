
# URL Collection

```sh
https://www.postman.com/aerospace-geoscientist-125091/workspace/api-publicas/collection/15462778-532c333f-d6c2-427e-95dd-67ad1e91801a?action=share&creator=15462778
```

# Packeges, Dependências e ferrametas 

para Esta Aplicação foi utilizado o ambiente de apio da especializa T.I.

[especializa T.I.](https://academy.especializati.com.br)

[SPATIE para Rolos e Permission](https://spatie.be/docs/laravel-permission/v6/basic-usage/basic-usage)


packege: php-open-source-saver/jwt-auth


### Passo a passo

Crie o Arquivo .env
```sh
cp .env.example .env
```

Crie o Arquivo .env (windows)

```sh
copy .env.example .env
```

Suba os containers do projeto
```sh
docker-compose up -d
```


Acessar o container
```sh
docker-compose exec app bash
```


Instalar as dependências do projeto
```sh
composer install
```


Gerar a key do projeto Laravel
```sh
php artisan key:generate
```


Gerar a key do projeto Laravel
```sh
php artisan jwt:secret
```

Gerar a key do projeto Laravel
```sh
php artisan migrate
```

Gerar a key do projeto Laravel
```sh
php artisan db:seed
```

Gerar a key do projeto Laravel
```sh
php artisan storage:link
```

obs: caso rode o projeto em sistemas linux liberar permissão na pasta 
```sh
chmod 777 -R nomedapasta
```

Acessar o projeto
[http://localhost:8989](http://localhost:8989)
