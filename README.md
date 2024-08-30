
# Setup Docker Para Projetos Laravel (8, 9, 10 ou 11)
para Esta Aplicação foi utilizado o ambiente de apio da especializa T.I.

[Assine a Academy, e Seja VIP!](https://academy.especializati.com.br)

### Passo a passo

Crie o Arquivo .env
```sh
cp .env.example .env
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

Acessar o projeto
[http://localhost:8989](http://localhost:8989)
