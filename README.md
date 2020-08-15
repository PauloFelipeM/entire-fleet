<h1 align="center">
  Entire Fleet - Sistema para controle de fronta de veículos
</h1>

[![Laravel](https://img.shields.io/badge/Awesome-Laravel-brightgreen.svg?)](https://github.com/PauloFelipeM/entire-fleet)
[![MIT License](https://img.shields.io/apm/l/atomic-design-ui.svg?)](https://github.com/tterb/atomic-design-ui/blob/master/LICENSEs)

Sistema destinado a controle de frota de veículo em geral.

### Modulos disponíveis no momento:

Cadastro de marcas;
Cadastro de fornecedores;
Cadastro de motoristas;
Cadastro de veículos;
Cadastro de tipos de veículos;
Cadastro de usuários;
Cadastro de pontos de viagens (Masterpoints);
Cadastro de viagens (Usando masterpoints);
Cadastro de pneus;

![](header.png)

-------------------------------------------------------------------------------------

## Technologies
Laravel (PHP)

-------------------------------------------------------------------------------------

## Requirido
- Laravel 5.8
- Composer LTS

-------------------------------------------------------------------------------------

## Instalação

git clone https://github.com/PauloFelipeM/entire-fleet.git

-------------------------------------------------------------------------------------

## Usage

### Dependencias:

Entre na pasta entire-fleet e rode o comando: composer install

no arquivo resources -> views -> layouts -> app.blade.php, na linha 23, é necessário inserir a API KEY do google para as funcionalidades de MAPA.

<script async defer src="https://maps.googleapis.com/maps/api/js?key=API_KEY&libraries=places"></script>

No arquivo .env realizar as devidas configurações de banco de dados:


DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=entirefleet
DB_USERNAME=postgres
DB_PASSWORD=master

No arquivo .env realizar as devidas configurações de email:


MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=USERNAME
MAIL_PASSWORD=PASSWORD
MAIL_FROM_ADDRESS=noreply@entirefleet.com
MAIL_FROM_NAME=Entire-Fleet

-------------------------------------------------------------------------------------

### Migração:

Para criar as tabelas do sistema, rodar o comando na raiz do projeto: php artisan migrate

##### OBS: O banco de dados já deve está criado para realizar os procedimentos acima!.

-------------------------------------------------------------------------------------

### Criar usuário para autenticação:

Rodar execute o comando "php artisan db:seed" na raiz do projeto.

Irá criar o usuário com as seguintes crendeciais:

Email: admin@admin.com

Senha: 123456

##### OBS: É possível editar essas informações dentro do arquivo database -> seeds -> UserTableSeeder.php

-------------------------------------------------------------------------------------

## :memo: Licença

Esse projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

Criado por [Paulo Felipe Martins](https://www.linkedin.com/in/paulo-felipe-martins-3940b011a/)
