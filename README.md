# Desafio Promobit

- [Desafio Promobit](#desafio-promobit)
    - [Objetivo](#objetivo)
    - [Requisito](#requisitos)
    - [Requisitos](#requisitos)
    - [Techs](#techs-obrigatrio)
    - [Como entregar](#como-entregar)

## Objetivo
O objetivo é Criação de CRUD de produtos, tags e extração de relatório de relevância de produtos.

### Requisitos
- PHP 8.0^
- Composer
- MYSQL
- **Docker (Opcional)** ⚠️

### Criando ambiente
``` bash

# Clone este repositório
$ git clone https://github.com/lucasdauto/desafio-promobit.git

# Entre na pasta do projeto
$ cd desfio-promobit

# Crie uma copia do arquivo .env-example e renomeie para .env
$ cp .env.example .env

```
Após isso abra o arquivo .env e altere o seguintes dados:

- `APP_NAME`

``` dotenv
APP_NAME="Desafio Promobit"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost
```

- Ainda no arquivo .env altere os dados do banco de dados:
  * Nome do banco de dados;
  * Usuario;
  * Senha;
``` dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=desafio_promobit
DB_USERNAME=admin
DB_PASSWORD=T35T3
```
- Em seguida crie o banco de dados com o mesmo nome definido no passo anterior:
``` SQL
    CREATE DATABASE `desafio_promobit`;
```
- Em seguida acesse o terminal e use os seguintes comandos:
``` bash
# Instalar frawork laravel e dependencias
$ composer install

# Gerar key usada pelo arquivo .env
$ php artisan key:generate

# Criar tabelas no banco de dados
$ php artisan migrate

# Instalar dependencias front-end
$ npm install

# Copilar bibliotecas de front
$ npm run dev

# Rodar servidor
$ php artisan serve
```
