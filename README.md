<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<h3 align="center">danielfalcaodf/ecommerceApi</h3>

<div align="center">

[![Status](https://img.shields.io/badge/status-active-success.svg)]() [![api](https://img.shields.io/badge/api-online-brightgreen)](https://apiteste.grupodouglascosta.com.br) [![License](https://img.shields.io/badge/license-MIT-blue.svg)](/LICENSE)
[![phpv](https://img.shields.io/badge/php->%3D7.4-blue)](https://www.php.net/downloads.php#v7.4.23) [![laravel](https://img.shields.io/badge/Laravel-8.x-blue)](https://laravel.com/docs/8.x)

</div>
<p align="center"> API RESTFul para o gerenciamento de pedidos de um E-commerce utilizando o framework Laravel
    <br> 
</p>

## 📝 Onde começar?

-   [Sobre](#about)
-   [Começando](#getting_started)
-   [Ferramentas](#pre)
-   [Requisitos](#Requisitos)
-   [Instalação](#install)
-   [Configuração do .env](#configEnv)
-   [Deployment](#deployment)
-   [Uso](#usage)
-   [Estrutura da api](#api)
-   [Teste Unitários](#test)
    <!-- - [TODO](../TODO.md) -->
    <!-- - [Contributing](../CONTRIBUTING.md) -->
    <!-- - [Authors](#authors) -->
    <!-- - [Acknowledgments](#acknowledgement) -->

## 🧐 Sobre <a name = "about"></a>

API RESTFul para o gerenciamento de pedidos de um E-commerce utilizando o framework Laravel, contêm os módulos Comprador, Produto, Checkout, Auth e Usuário.

> Obs.: O Docker na minha marquina esta dando erro, não conseguir resolver o
> [erro](https://github.com/danielfalcaodf/ecommerceApi/blob/master/public/demos/testes/img-errordocker.png), então optei em dar deploy da aplicação em uma hospedagem [E-commerce Api](https://apiteste.grupodouglascosta.com.br "Api")

## 🏁 Começando <a name = "getting_started"></a>

Essas instruções fornecerão uma cópia do projeto em sua máquina local para fins de desenvolvimento e teste. Consulte [Deployment](#deployment) para obter notas sobre como implantar o projeto em uma hospedagem.

### ⛏️ Ferramentas <a name = "pre"></a>

Ferramentas usadas

-   [Composer](https://getcomposer.org/ "Composer") - Gerenciador de dependência para PHP;
-   [Packagist](https://packagist.org "Packagist") - Repositório de pacotes PHP;
-   [Laravel 8](https://laravel.com "Laravel") - Framework;
-   [Mysql](https://www.mysql.com "Mysql") - Banco de dados;
-   [Postman](https://www.postman.com "Postman") - API Client;
-   [tymon/jwt-auth](https://packagist.org/packages/tymon/jwt-auth "jwt-auth") - Auth JWt
-   [laravellegends/pt-br-validator](https://packagist.org/packages/laravellegends/pt-br-validator "pt-br-validator") - Validação em pt-br
-   [knuckleswtf/scribe](https://packagist.org/packages/knuckleswtf/scribe "Scribe") - Gerador api docs

### :package: Requisitos <a name = "Requisitos"></a>

-   PHP >= 7.4;
-   Servidor localhost ([XAMPP](https://www.apachefriends.org/pt_br/index.html "Xampp") ou outros);
-   [Mysql](https://www.mysql.com "Mysql");

### :package: Instalação <a name = "install"></a>

1. Clonagem da branche usando comando logo abaixo ou Download zip na pasta do localhost;

    > se for download Zip renomear a pasta `ecommerceApi-master` para `ecommerceApi`;

    ```
    git clone https://github.com/danielfalcaodf/ecommerceApi.git
    ```

2. Acessar a raiz do projeto com CMD `cd .\ecommerceApi\` ;
3. Logo depois executa o comando

    ```
    composer install

    ```

4. Criar um arquivo `.env` copiar o conteúdo do arquivo `.env.example` para `.env`;
5. Com raiz do projeto no CMD, execultar os seguintes comandos:

    ```
    php artisan key:generate
    ```

    ```
    php artisan storage:link
    ```

    ```
    php artisan jwt:secret
    ```

6. Agora so [Configurar o .env](#configEnv)

### ⚙️ Configuração do .env <a name = "configEnv"></a>

-   Banco de dados

    ![img-db](https://github.com/danielfalcaodf/ecommerceApi/blob/master/public/demos/configEnv/img-db.png?raw=true)

-   App

    ![img-app](https://github.com/danielfalcaodf/ecommerceApi/blob/master/public/demos/configEnv/img-app.png?raw=true)

-   Filesystem

    ![img-file](https://github.com/danielfalcaodf/ecommerceApi/blob/master/public/demos/configEnv/img-files.png?raw=true)

-   Mail

    ![img-mail](https://github.com/danielfalcaodf/ecommerceApi/blob/master/public/demos/configEnv/img-mail.png?raw=true)

-   Logo após a configuração do `.env`, Abir o CMD na raiz do projeto , execultar comando logo abaixo com isso as Migrations e Seeds do projeto vai alimentar o banco de dados

```
php artisan migrate:fresh --seed
```

🎉 Está tudo pronto!! bons testes

## 🚀 Deployment <a name = "deployment"></a>

Deploy para servidor

> Eu optei a utilizar o terminal/SSH do servidor para que o projeto siga o código fonte do git da master utlizado o `git pull`, alguns servidores tem opção auto atualizar seguindo a master do git, sempre que tem um novo commit e muda os arquivos do servidor, Para utilizar o SSH tem duas maneiras é liberando acesso a sua máquina ou usando o terminal que acessa o root do servidor do cPanel ou outros, cosulta seu servidor.

1. Com seu terminal aberto conectado com servidor root, acessa a pasta public_html ou subdomínio raiz e execute estes comandos logo abaixo;

    > Com estes comandos você vai clonar o projeto na pasta raiz, Obs.: não vai criar uma pasta do projeto com da [Instalação](#install) para mais detalhes do comando acessa este link [Repositório git em pasta existente](https://www.andrebian.com/repositorio-git-em-pasta-existente/)

    ```

    cd public_html

    git clone https://github.com/danielfalcaodf/ecommerceApi.git tmp && mv tmp/.git . && rm -fr tmp && git reset --hard

    ```

2. Configurar na hospadagem apontando domínio ou subdomínio para `public_html/public` ou `{nameSubdominio}/public`
3. Agora só seguir com os passos da [Instalação](#install) 3, pulando os passos 1 e 2;

## 🎈 Uso <a name="usage"></a>

Para começar a usar o sistema siga estes passos:

1. acessa seu localhost e abre o projeto `ecommercerApi/public`;

    > Se já tiver em algum servidor e só acessar o endereço que esta apontando para pasta `public_html/public` ou `{nameSubdominio}/public`;
    > <br>
    > Se voce deu `git clone` o nome da pasta vai esta como citado;

2. Se não deu nenhum problema na [Instalação](#install) e sem erros, Api esta funcionando! O banco de dados ja vai esta preenchidos com os seguintes dados: usuários, compradores, produtos e pedidos;
    > Os dados foram preenchidos com Migrations e Seeds usando `php artisan migrate:fresh --seed` <br>
    > Todos usuários cadastrado via seeds estão com uma senha padrão que é `123456` e email fakers, so tem um usuário com email válido para receber emails
3. Login de teste:

    ```
    Email:
    danielfalcao.df@gmail.com
    Senha:
    123456
    ```

4. Consultar a [Documentação da Api](https://apiteste.grupodouglascosta.com.br/docs "documentação da api")

## Estrutura da api <a name="api"></a>

-   Rotas

    ![img-route](https://github.com/danielfalcaodf/ecommerceApi/blob/master/public/demos/testes/img-route.png?raw=true)

-   Controllers

    ![img-controllers](https://github.com/danielfalcaodf/ecommerceApi/blob/master/public/demos/testes/img-controllers.png?raw=true)

-   Models

    ![img-models](https://github.com/danielfalcaodf/ecommerceApi/blob/master/public/demos/testes/img-models.png?raw=true)

-   Middleware

    > Responsável de tratar as JWT antes de acessar a rota

    ![img-middleware](https://github.com/danielfalcaodf/ecommerceApi/blob/master/public/demos/testes/img-middleware.png?raw=true)

-   Mail

    > Responsável de mandar emails quando pedido é criado

    ![img-mail](https://github.com/danielfalcaodf/ecommerceApi/blob/master/public/demos/testes/img-mail.png?raw=true)

    ![img-mailsend](https://github.com/danielfalcaodf/ecommerceApi/blob/master/public/demos/testes/img-mailsend.png?raw=true)

-   Requests

    > Responsável criar regras para validar os dados do client

    ![img-requests](https://github.com/danielfalcaodf/ecommerceApi/blob/master/public/demos/testes/img-requests.png?raw=true)

    ![img-rules](https://github.com/danielfalcaodf/ecommerceApi/blob/master/public/demos/testes/img-rules.png?raw=true)

-   Resources

    > Responsável estruturar as respostar do banco de dados

    ![img-resources](https://github.com/danielfalcaodf/ecommerceApi/blob/master/public/demos/testes/img-resources.png?raw=true)

    ![img-resource](https://github.com/danielfalcaodf/ecommerceApi/blob/master/public/demos/testes/img-resource.png?raw=true)

-   ApiResponser

    > Responsável estruturar os Resources assim padronizando a API

    ![img-apiresponser](https://github.com/danielfalcaodf/ecommerceApi/blob/master/public/demos/testes/img-apiresponser.png?raw=true)

## :memo: Teste Unitários <a name="test"></a>

Os testes da api foi feito em uma hospedagem propria [E-commerce Api](https://apiteste.grupodouglascosta.com.br "Api"),
Api já tem documentação em [Api Docs](https://apiteste.grupodouglascosta.com.br/docs "Api docs")

```
baseUrl = https://apiteste.grupodouglascosta.com.br
```

> Importar collections para [Postman](https://www.postman.com "Postman"): https://apiteste.grupodouglascosta.com.br/docs/collection.json

### :memo: Indices

-   [Autenticação Jwt](#autenticação-jwt)

    -   [Autenticação com email e senha](#1-autenticação-com-email-e-senha)
    -   [Cadastrar um novo usuário](#2-cadastrar-um-novo-usuário)
    -   [Deslogar da Api](#3-deslogar-da-api)

-   [Compradores](#compradores)

    -   [Buscar Comprador](#1-buscar-comprador)
    -   [Buscar todos Compradores](#2-buscar-todos-compradores)
    -   [Cadastrar Comprador](#3-cadastrar-comprador)
    -   [Deletar Comprador](#4-deletar-comprador)
    -   [Editar Comprador](#5-editar-comprador)

-   [Pedidos](#pedidos)

    -   [Buscar pedido do usuário](#1-buscar-pedido-do-usuário)
    -   [Buscar todos pedidos do usuário](#2-buscar-todos-pedidos-do-usuário)
    -   [Cadastrar pedido do usuário](#3-cadastrar-pedido-do-usuário)

-   [Pedidos ADMIN](#pedidos-admin)

    -   [Buscar pedido](#1-buscar-pedido)
    -   [Buscar todos pedidos](#2-buscar-todos-pedidos)
    -   [Criar um pedido do comprador](#3-criar-um-pedido-do-comprador)
    -   [Deletar Pedido](#4-deletar-pedido)
    -   [Editar Pedido](#5-editar-pedido)

-   [Produtos](#produtos)

    -   [Buscar produto](#1-buscar-produto)
    -   [Buscar todos os produtos](#2-buscar-todos-os-produtos)
    -   [Cadastrar um produto](#3-cadastrar-um-produto)
    -   [Deletar produto](#4-deletar-produto)
    -   [Editar produto](#5-editar-produto)

-   [Usuários](#usuários)

    -   [Buscar todos os usuários](#1-buscar-todos-os-usuários)
    -   [Buscar usuário JWT](#2-buscar-usuário-jwt)
    -   [Editar usuário JWT](#3-editar-usuário-jwt)

---

## Autenticação Jwt

### 1. Autenticação com email e senha

Obtenha um JWT com credenciais fornecidas

**_Endpoint:_**

```bash
Method: POST
Type: RAW
URL: https://apiteste.grupodouglascosta.com.br/api/auth/login
```

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Body:_**

```js
{"email":"danielfalcao.df@gmail.com","password":"123456"}
```

**_More example Requests/Responses:_**

##### I. Example Request: (result)

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Body:_**

```js
{"email":"danielfalcao.df@gmail.com","password":"123456"}
```

##### I. Example Response: (result)

```js
{
    "message": "",
    "type": "success",
    "data": {
        "id": 1,
        "name": "Dr. Julieta Queirós Cervantes Jr.",
        "email": "danielfalcao.df@gmail.com",
        "token": {
            "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpdGVzdGUuZ3J1cG9kb3VnbGFzY29zdGEuY29tLmJyXC9hcGlcL2F1dGhcL2xvZ2luIiwiaWF0IjoxNjMxMDc5MDAxLCJleHAiOjE2MzEwODI2MDEsIm5iZiI6MTYzMTA3OTAwMSwianRpIjoiN2U4NzFXeVNIQmJkbTFvdSIsInN1YiI6MSwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.dfX8b0_T7ps4OTuUwedsSBaTNCp-kg43HTeE0LPFduo",
            "token_type": "bearer",
            "expires_in": 3600
        },
        "created_at": "08/09/2021",
        "updated_at": "08/09/2021",
        "link": {
            "get": {
                "getListAll": "https://apiteste.grupodouglascosta.com.br/api/users",
                "getMe": "https://apiteste.grupodouglascosta.com.br/api/users/me"
            },
            "post": {
                "login": "https://apiteste.grupodouglascosta.com.br/api/auth/login",
                "register": "https://apiteste.grupodouglascosta.com.br/api/auth/register",
                "logout": "https://apiteste.grupodouglascosta.com.br/api/auth/logout"
            },
            "put": {
                "editNameEmail": "https://apiteste.grupodouglascosta.com.br/api/users/me/edit"
            }
        }
    },
    "code": 200
}

```

**_Status Code:_** 200

<br>

##### II. Example Request: response

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Body:_**

```js
{"email":"danielfalcao.df@gmail.com","password":"123456"}
```

##### II. Example Response: response

```js
{"type":"error","message":"Email ou senha inv\u00e1lidos","code":400}
```

**_Status Code:_** 400

<br>

##### III. Example Request: Erros semânticos do código

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Body:_**

```js
{"email":"danielfalcao.df@gmail.com","password":"123456"}
```

##### III. Example Response: Erros semânticos do código

```js
{"type":"error","message":"Error","code":422,"data":{"errors":"syntax error, unexpected 'if' (T_IF)"}}
```

**_Status Code:_** 422

<br>

### 2. Cadastrar um novo usuário

Usando name, email, password e password_confirmation, se tudo estiver certo apresenta um token de acesso (JWT) e datalhes do usuario novo

**_Endpoint:_**

```bash
Method: POST
Type: RAW
URL: https://apiteste.grupodouglascosta.com.br/api/auth/register
```

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Body:_**

```js
{"name":"teste","email":"teste@teste.com","password":"123456","password_confirmation":"123456"}
```

**_More example Requests/Responses:_**

##### I. Example Request: (result)

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Body:_**

```js
{"name":"teste","email":"teste@teste.com","password":"123456","password_confirmation":"123456"}
```

##### I. Example Response: (result)

```js
{
    "message": "Usuário Cadastrado!",
    "type": "success",
    "data": {
        "id": 22,
        "name": "teste",
        "email": "teste@teste.com",
        "token": {
            "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpdGVzdGUuZ3J1cG9kb3VnbGFzY29zdGEuY29tLmJyXC9hcGlcL2F1dGhcL3JlZ2lzdGVyIiwiaWF0IjoxNjMxMDc5MDM3LCJleHAiOjE2MzEwODI2MzcsIm5iZiI6MTYzMTA3OTAzNywianRpIjoiR1luQ3lHNDVmSUt2WUNmTiIsInN1YiI6MjIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.KRzcIg8qicBgELMpuqLzQL2boOTpKlh8RgFG-ylwlN4",
            "token_type": "bearer",
            "expires_in": 3600
        },
        "created_at": "08/09/2021",
        "updated_at": "08/09/2021",
        "link": {
            "get": {
                "getListAll": "https://apiteste.grupodouglascosta.com.br/api/users",
                "getMe": "https://apiteste.grupodouglascosta.com.br/api/users/me"
            },
            "post": {
                "login": "https://apiteste.grupodouglascosta.com.br/api/auth/login",
                "register": "https://apiteste.grupodouglascosta.com.br/api/auth/register",
                "logout": "https://apiteste.grupodouglascosta.com.br/api/auth/logout"
            },
            "put": {
                "editNameEmail": "https://apiteste.grupodouglascosta.com.br/api/users/me/edit"
            }
        }
    },
    "code": 201
}

```

**_Status Code:_** 200

<br>

##### II. Example Request: Validação do bodyparam

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Body:_**

```js
{"name":"teste","email":"teste@teste.com","password":"123456","password_confirmation":"123456"}
```

##### II. Example Response: Validação do bodyparam

```js
{"type":"error","message":"Campos inv\u00e1lidos","code":422,"data":{"name":["Obrigat\u00f3rio"],"email":["The email field is required."],"password":["The password field is required."]}}
```

**_Status Code:_** 422

<br>

##### III. Example Request: Validação do bodyparam

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Body:_**

```js
{"name":"teste","email":"teste@teste.com","password":"123456","password_confirmation":"123456"}
```

##### III. Example Response: Validação do bodyparam

```js
{"type":"error","message":"Campos inv\u00e1lidos","code":422,"data":{"email":["The email must be a valid email address."],"password":["The password must be at least 6 characters.","The password confirmation does not match."]}}
```

**_Status Code:_** 422

<br>

##### IV. Example Request: Validação do bodyparam

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Body:_**

```js
{"name":"teste","email":"teste@teste.com","password":"123456","password_confirmation":"123456"}
```

##### IV. Example Response: Validação do bodyparam

```js
{"type":"error","message":"Campos inv\u00e1lidos","code":422,"data":{"email":["The email has already been taken."],"password":["The password must be at least 6 characters.","The password confirmation does not match."]}}
```

**_Status Code:_** 422

<br>

##### V. Example Request: Erros semânticos do código

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Body:_**

```js
{"name":"teste","email":"teste@teste.com","password":"123456","password_confirmation":"123456"}
```

##### V. Example Response: Erros semânticos do código

```js
{"type":"error","message":"Error","code":422,"data":{"errors":"syntax error, unexpected 'if' (T_IF)"}}
```

**_Status Code:_** 422

<br>

### 3. Deslogar da Api

Desconecte o usuário (invalide o token), se tudo estiver certo apresenta as informações do usuário

**_Endpoint:_**

```bash
Method: POST
Type:
URL: https://apiteste.grupodouglascosta.com.br/api/auth/logout
```

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_More example Requests/Responses:_**

##### I. Example Request: (result)

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

##### I. Example Response: (result)

```js
{"message":"Successfully logged out","type":"success","data":{"id":1,"name":"Kevin Edilson Padilha","email":"danielfalcao.df@gmail.com","email_verified_at":null,"created_at":"06\/09\/2021","updated_at":"06\/09\/2021","link":{"get":{"getListAll":"https:\/\/localhost\/laravelProjetos\/ecommerceApi\/public\/api\/users","getMe":"https:\/\/localhost\/laravelProjetos\/ecommerceApi\/public\/api\/users\/me"},"post":{"login":"https:\/\/localhost\/laravelProjetos\/ecommerceApi\/public\/api\/auth\/login","register":"https:\/\/localhost\/laravelProjetos\/ecommerceApi\/public\/api\/auth\/register","logout":"https:\/\/localhost\/laravelProjetos\/ecommerceApi\/public\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/localhost\/laravelProjetos\/ecommerceApi\/public\/api\/users\/me\/edit"}}},"code":200}

```

**_Status Code:_** 200

<br>

##### II. Example Request: Token is Invalid, Token is Expired, Authorization Token not found

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

##### II. Example Response: Token is Invalid, Token is Expired, Authorization Token not found

```js
{"type":"error","code":401,"massage":"Token is Invalid"}
```

**_Status Code:_** 401

<br>

##### III. Example Request: Erros semânticos do código

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

##### III. Example Response: Erros semânticos do código

```js
{"type":"error","message":"Error","code":422,"data":{"errors":"syntax error, unexpected 'if' (T_IF)"}}
```

**_Status Code:_** 422

<br>

## Compradores

### 1. Buscar Comprador

Apresenta as informações do comprador especificado

**_Endpoint:_**

```bash
Method: GET
Type:
URL: https://apiteste.grupodouglascosta.com.br/api/buyers/view/:buyer
```

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_URL variables:_**

| Key   | Value | Description       |
| ----- | ----- | ----------------- |
| buyer | 10    | O ID do comprador |

**_More example Requests/Responses:_**

##### I. Example Request: (result)

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key   | Value | Description       |
| ----- | ----- | ----------------- |
| buyer | 10    | O ID do comprador |

##### I. Example Response: (result)

```js
{"message":"Comprador encontrado!","type":"success","data":{"id":12,"iduser":12,"phone_cell":"(55) 3433-5563","cpf":"29479558386","user":{"id":12,"name":"Sra. Louise Alves","email":"wcaldeira@terra.com.br","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/12"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/12"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/12"}}},"code":200}
```

**_Status Code:_** 200

<br>

##### II. Example Request: Token is Invalid, Token is Expired, Authorization Token not found

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key   | Value | Description       |
| ----- | ----- | ----------------- |
| buyer | 10    | O ID do comprador |

##### II. Example Response: Token is Invalid, Token is Expired, Authorization Token not found

```js
{"type":"error","code":401,"massage":"Token is Invalid"}
```

**_Status Code:_** 401

<br>

##### III. Example Request: Não encontrado

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key   | Value | Description       |
| ----- | ----- | ----------------- |
| buyer | 10    | O ID do comprador |

##### III. Example Response: Não encontrado

```js
{"type":"error","message":"Comprador n\u00e3o encontrado!","code":404}
```

**_Status Code:_** 404

<br>

##### IV. Example Request: Erros semânticos do código

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key   | Value | Description       |
| ----- | ----- | ----------------- |
| buyer | 10    | O ID do comprador |

##### IV. Example Response: Erros semânticos do código

```js
{"type":"error","message":"Error","code":422,"data":{"errors":"syntax error, unexpected 'if' (T_IF)"}}
```

**_Status Code:_** 422

<br>

### 2. Buscar todos Compradores

Apresenta uma lista de todos os compradores com as informações

**_Endpoint:_**

```bash
Method: GET
Type:
URL: https://apiteste.grupodouglascosta.com.br/api/buyers
```

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_More example Requests/Responses:_**

##### I. Example Request: (result)

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

##### I. Example Response: (result)

```js
{"message":"Compradores encontrado!","type":"success","data":[{"id":1,"iduser":1,"phone_cell":"(62) 95623-6649","cpf":"20225704803","user":{"id":1,"name":"Dr. Julieta Queir\u00f3s Cervantes Jr.","email":"danielfalcao.df@gmail.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/1"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/1"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/1"}}},{"id":2,"iduser":2,"phone_cell":"(62) 2090-5325","cpf":"24657910019","user":{"id":2,"name":"Sra. Antonella Jimenes Maldonado Filho","email":"crios@yahoo.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/2"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/2"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/2"}}},{"id":3,"iduser":3,"phone_cell":"(81) 2809-5463","cpf":"96046284880","user":{"id":3,"name":"Cristina Ayla Uchoa Sobrinho","email":"davi66@uol.com.br","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/3"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/3"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/3"}}},{"id":4,"iduser":4,"phone_cell":"(28) 98019-9637","cpf":"17551516832","user":{"id":4,"name":"Aparecida Salgado","email":"azambrano@hotmail.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/4"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/4"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/4"}}},{"id":5,"iduser":5,"phone_cell":"(11) 92066-0597","cpf":"62124157060","user":{"id":5,"name":"Dr. J\u00e1como \u00cdtalo Prado Jr.","email":"lroque@ig.com.br","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/5"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/5"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/5"}}},{"id":6,"iduser":6,"phone_cell":"(85) 2245-3700","cpf":"25063444547","user":{"id":6,"name":"Dr. Roberta Flor Amaral","email":"thalia.dasilva@oliveira.com.br","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/6"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/6"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/6"}}},{"id":7,"iduser":7,"phone_cell":"(93) 4944-6790","cpf":"90850414814","user":{"id":7,"name":"Elisa Rocha Esteves","email":"roberto64@hotmail.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/7"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/7"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/7"}}},{"id":8,"iduser":8,"phone_cell":"(46) 4355-7655","cpf":"28782082936","user":{"id":8,"name":"Dr. Augusto da Silva Amaral","email":"tiago08@terra.com.br","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/8"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/8"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/8"}}},{"id":9,"iduser":9,"phone_cell":"(73) 97917-8522","cpf":"75839663964","user":{"id":9,"name":"Dr. Renato Fontes","email":"yromero@ferreira.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/9"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/9"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/9"}}},{"id":10,"iduser":10,"phone_cell":"(89) 90824-8026","cpf":"50970843577","user":{"id":10,"name":"Sr. Ziraldo Duarte Vega Neto","email":"ufidalgo@terra.com.br","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/10"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/10"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/10"}}},{"id":11,"iduser":11,"phone_cell":"(66) 3555-3603","cpf":"13077122405","user":{"id":11,"name":"Thiago Medina","email":"pereira.beatriz@sanches.com.br","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/11"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/11"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/11"}}},{"id":12,"iduser":12,"phone_cell":"(55) 3433-5563","cpf":"29479558386","user":{"id":12,"name":"Sra. Louise Alves","email":"wcaldeira@terra.com.br","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/12"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/12"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/12"}}},{"id":13,"iduser":13,"phone_cell":"(47) 3146-6306","cpf":"70354548298","user":{"id":13,"name":"Sr. Enzo Aguiar","email":"franco04@yahoo.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/13"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/13"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/13"}}},{"id":14,"iduser":14,"phone_cell":"(37) 2368-2655","cpf":"85889980173","user":{"id":14,"name":"Mauro Mar\u00e9s Montenegro","email":"hugo70@escobar.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/14"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/14"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/14"}}},{"id":15,"iduser":15,"phone_cell":"(95) 93765-1989","cpf":"37526896686","user":{"id":15,"name":"Kauan \u00c1vila D'\u00e1vila","email":"lilian.cruz@serrano.org","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/15"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/15"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/15"}}},{"id":16,"iduser":16,"phone_cell":"(45) 95949-4942","cpf":"78241796137","user":{"id":16,"name":"Laura Mar\u00edlia Guerra","email":"laura.queiros@yahoo.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/16"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/16"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/16"}}},{"id":17,"iduser":17,"phone_cell":"(49) 99434-0050","cpf":"55346958703","user":{"id":17,"name":"Dr. Jo\u00e3o Fidalgo Matos","email":"escobar.violeta@uol.com.br","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/17"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/17"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/17"}}},{"id":18,"iduser":18,"phone_cell":"(54) 98495-2515","cpf":"52386494284","user":{"id":18,"name":"Sim\u00e3o Lira Soto Filho","email":"pamela.santos@gmail.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/18"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/18"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/18"}}},{"id":19,"iduser":19,"phone_cell":"(82) 2370-8756","cpf":"38385630503","user":{"id":19,"name":"Sr. Jo\u00e3o Robson Romero Neto","email":"elisa97@terra.com.br","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/19"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/19"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/19"}}},{"id":20,"iduser":20,"phone_cell":"(24) 2801-4267","cpf":"35382758743","user":{"id":20,"name":"Cauan Bittencourt Gon\u00e7alves","email":"sergio36@terra.com.br","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/20"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/20"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/20"}}},{"id":21,"iduser":21,"phone_cell":"(79) 97934-3470","cpf":"77900723668","user":{"id":21,"name":"Raquel Lutero","email":"ovalencia@barreto.net.br","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/21"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/21"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/21"}}}],"code":200}
```

**_Status Code:_** 200

<br>

##### II. Example Request: Token is Invalid, Token is Expired, Authorization Token not found

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

##### II. Example Response: Token is Invalid, Token is Expired, Authorization Token not found

```js
{"type":"error","code":401,"massage":"Token is Invalid"}
```

**_Status Code:_** 401

<br>

##### III. Example Request: Erros semânticos do código

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

##### III. Example Response: Erros semânticos do código

```js
{"type":"error","message":"Error","code":422,"data":{"errors":"syntax error, unexpected 'if' (T_IF)"}}
```

**_Status Code:_** 422

<br>

### 3. Cadastrar Comprador

Cadastrar um comprador, se tudo estiver certo apresenta as informações do comprador

**_Endpoint:_**

```bash
Method: POST
Type: RAW
URL: https://apiteste.grupodouglascosta.com.br/api/buyers/add
```

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Body:_**

```js
{"phone_cell":"(12) 99999-9999","cpf":"71123045046","iduser":"22"}
```

**_More example Requests/Responses:_**

##### I. Example Request: (result)

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Body:_**

```js
{"phone_cell":"(12) 99999-9999","cpf":"71123045046","iduser":"22"}
```

##### I. Example Response: (result)

```js
{"message":"Comprador cadastrado!","type":"success","data":{"id":22,"iduser":"22","phone_cell":"(12) 9995-9099","cpf":"44935100052","user":{"id":22,"name":"teste","email":"teste@teste.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/22"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/22"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/22"}}},"code":201}
```

**_Status Code:_** 201

<br>

##### II. Example Request: Token is Invalid, Token is Expired, Authorization Token not found

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Body:_**

```js
{"phone_cell":"(12) 99999-9999","cpf":"71123045046","iduser":"22"}
```

##### II. Example Response: Token is Invalid, Token is Expired, Authorization Token not found

```js
{"type":"error","code":401,"massage":"Token is Invalid"}
```

**_Status Code:_** 401

<br>

##### III. Example Request: Validação bodyparam

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Body:_**

```js
{"phone_cell":"(12) 99999-9999","cpf":"71123045046","iduser":"22"}
```

##### III. Example Response: Validação bodyparam

```js
{"type":"error","message":"Campos inv\u00e1lidos","code":422,"data":{"phone_cell":["O campo phone cell n\u00e3o \u00e9 um celular com DDD v\u00e1lido."],"cpf":["O campo cpf n\u00e3o \u00e9 um CPF v\u00e1lido."],"iduser":["The selected iduser is invalid."]}}
```

**_Status Code:_** 422

<br>

##### IV. Example Request: Erros semânticos do código

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Body:_**

```js
{"phone_cell":"(12) 99999-9999","cpf":"71123045046","iduser":"22"}
```

##### IV. Example Response: Erros semânticos do código

```js
{"type":"error","message":"Error","code":422,"data":{"errors":"syntax error, unexpected 'if' (T_IF)"}}
```

**_Status Code:_** 422

<br>

### 4. Deletar Comprador

Deletar um Comprador especificado

**_Endpoint:_**

```bash
Method: DELETE
Type:
URL: https://apiteste.grupodouglascosta.com.br/api/buyers/delete/:buyer
```

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_URL variables:_**

| Key   | Value | Description       |
| ----- | ----- | ----------------- |
| buyer | 19    | O ID do comprador |

**_More example Requests/Responses:_**

##### I. Example Request: (result)

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key   | Value | Description       |
| ----- | ----- | ----------------- |
| buyer | 19    | O ID do comprador |

##### I. Example Response: (result)

```js
{"message":"Comprador deletado!","type":"success","data":[],"code":200}
```

**_Status Code:_** 201

<br>

##### II. Example Request: Token is Invalid, Token is Expired, Authorization Token not found

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key   | Value | Description       |
| ----- | ----- | ----------------- |
| buyer | 19    | O ID do comprador |

##### II. Example Response: Token is Invalid, Token is Expired, Authorization Token not found

```js
{"type":"error","code":401,"massage":"Token is Invalid"}
```

**_Status Code:_** 401

<br>

##### III. Example Request: Erros semânticos do código

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key   | Value | Description       |
| ----- | ----- | ----------------- |
| buyer | 19    | O ID do comprador |

##### III. Example Response: Erros semânticos do código

```js
{"type":"error","message":"Error","code":422,"data":{"errors":"syntax error, unexpected 'if' (T_IF)"}}
```

**_Status Code:_** 422

<br>

### 5. Editar Comprador

Editar um comprador especificado, se tudo estiver certo apresenta as informações do comprador

**_Endpoint:_**

```bash
Method: PUT
Type: RAW
URL: https://apiteste.grupodouglascosta.com.br/api/buyers/edit/:buyer
```

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_URL variables:_**

| Key   | Value | Description        |
| ----- | ----- | ------------------ |
| buyer | 22    | O ID do comprador. |

**_Body:_**

```js
{"phone_cell":"(12) 92999-9999","cpf":"74043044070","iduser":"22"}
```

**_More example Requests/Responses:_**

##### I. Example Request: (result)

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key   | Value | Description        |
| ----- | ----- | ------------------ |
| buyer | 22    | O ID do comprador. |

**_Body:_**

```js
{"phone_cell":"(12) 92999-9999","cpf":"74043044070","iduser":"22"}
```

##### I. Example Response: (result)

```js
{"message":"Comprador alterado!","type":"success","data":{"id":1,"iduser":1,"phone_cell":"(12)99222-0333","cpf":"44935100052","user":{"id":1,"name":"Dr. Julieta Queir\u00f3s Cervantes Jr.","email":"danielfalcao.df@gmail.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/1"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/1"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/1"}}},"code":200}
```

**_Status Code:_** 201

<br>

##### II. Example Request: Token is Invalid, Token is Expired, Authorization Token not found

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key   | Value | Description        |
| ----- | ----- | ------------------ |
| buyer | 22    | O ID do comprador. |

**_Body:_**

```js
{"phone_cell":"(12) 92999-9999","cpf":"74043044070","iduser":"22"}
```

##### II. Example Response: Token is Invalid, Token is Expired, Authorization Token not found

```js
{"type":"error","code":401,"massage":"Token is Invalid"}
```

**_Status Code:_** 401

<br>

##### III. Example Request: Erros semânticos do código

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key   | Value | Description        |
| ----- | ----- | ------------------ |
| buyer | 22    | O ID do comprador. |

**_Body:_**

```js
{"phone_cell":"(12) 92999-9999","cpf":"74043044070","iduser":"22"}
```

##### III. Example Response: Erros semânticos do código

```js
{"type":"error","message":"Error","code":422,"data":{"errors":"syntax error, unexpected 'if' (T_IF)"}}
```

**_Status Code:_** 422

<br>

## Pedidos

### 1. Buscar pedido do usuário

Apresenta um pedido especificado do usuário logado que foi passado com JWT, mostrando só o pedido dele

**_Endpoint:_**

```bash
Method: GET
Type:
URL: https://apiteste.grupodouglascosta.com.br/api/checkouts/me/view/:checkout
```

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_URL variables:_**

| Key      | Value | Description    |
| -------- | ----- | -------------- |
| checkout | 18    | O ID do pedido |

**_More example Requests/Responses:_**

##### I. Example Request: (result)

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key      | Value | Description    |
| -------- | ----- | -------------- |
| checkout | 18    | O ID do pedido |

##### I. Example Response: (result)

```js
{"message":"Pedindo encontrado!","type":"success","data":{"id":11,"idbuyer":1,"status":"pending","value_total":"743.73","buyer":{"id":1,"iduser":1,"phone_cell":"(12)99222-0333","cpf":"44935100052","user":{"id":1,"name":"Dr. Julieta Queir\u00f3s Cervantes Jr.","email":"danielfalcao.df@gmail.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/1"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/1"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/1"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","checkProducts":[{"id":27,"idcheck":11,"idprod":3,"quant":5,"subtotal":"37.20","product":{"id":3,"name":"Voluptatem corporis maxime magni.","type":"b","value":"7.44","images":[{"id":3,"idprod":3,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/3\/fZnFUTgPrMTmCcfrtRrqQirmpl678u2mLfZT9xBb.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/3","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/3\/fZnFUTgPrMTmCcfrtRrqQirmpl678u2mLfZT9xBb.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/3"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/3"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/3"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/27"},"post":"","put":""}},{"id":28,"idcheck":11,"idprod":7,"quant":6,"subtotal":"488.88","product":{"id":7,"name":"Cum quos perferendis modi perferendis.","type":"w","value":"81.48","images":[{"id":7,"idprod":7,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/7\/xBggFmfYCISn2e8dYS7TNhtXsTByckpX1mblbCyr.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/7","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/7\/xBggFmfYCISn2e8dYS7TNhtXsTByckpX1mblbCyr.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/7"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/7"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/7"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/28"},"post":"","put":""}},{"id":29,"idcheck":11,"idprod":2,"quant":3,"subtotal":"217.65","product":{"id":2,"name":"Voluptatibus eum qui.","type":"u","value":"72.55","images":[{"id":2,"idprod":2,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/2\/1zCBV0gSDYwvaUPpboPqUupQZYmLRCMg5sBaZmxa.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/2","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/2\/1zCBV0gSDYwvaUPpboPqUupQZYmLRCMg5sBaZmxa.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/2"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/2"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/2"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/29"},"post":"","put":""}}],"link":{"get":{"getCheckouts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/list","getCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/view\/11","getCheckoutsAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/list","getCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/view\/11"},"post":{"addCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/new","addCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/new"},"put":{"editCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/edit\/11"},"delete":{"deleteCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/delete\/11"}}},"code":200}
```

**_Status Code:_** 200

<br>

##### II. Example Request: Token is Invalid, Token is Expired, Authorization Token not found

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key      | Value | Description    |
| -------- | ----- | -------------- |
| checkout | 18    | O ID do pedido |

##### II. Example Response: Token is Invalid, Token is Expired, Authorization Token not found

```js
{"type":"error","code":401,"massage":"Token is Invalid"}
```

**_Status Code:_** 401

<br>

##### III. Example Request: Erros semânticos do código

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key      | Value | Description    |
| -------- | ----- | -------------- |
| checkout | 18    | O ID do pedido |

##### III. Example Response: Erros semânticos do código

```js
{"type":"error","message":"Error","code":422,"data":{"errors":"syntax error, unexpected 'if' (T_IF)"}}
```

**_Status Code:_** 422

<br>

### 2. Buscar todos pedidos do usuário

Apresenta todos os pedidos do usuário logado que foi passado com JWT

**_Endpoint:_**

```bash
Method: GET
Type:
URL: https://apiteste.grupodouglascosta.com.br/api/checkouts/me/list
```

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_More example Requests/Responses:_**

##### I. Example Request: (result)

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

##### I. Example Response: (result)

```js
{"message":"Pedidos encontrados!","type":"success","data":[{"id":11,"idbuyer":1,"status":"pending","value_total":"743.73","buyer":{"id":1,"iduser":1,"phone_cell":"(12)99222-0333","cpf":"44935100052","user":{"id":1,"name":"Dr. Julieta Queir\u00f3s Cervantes Jr.","email":"danielfalcao.df@gmail.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/1"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/1"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/1"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","checkProducts":[{"id":27,"idcheck":11,"idprod":3,"quant":5,"subtotal":"37.20","product":{"id":3,"name":"Voluptatem corporis maxime magni.","type":"b","value":"7.44","images":[{"id":3,"idprod":3,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/3\/fZnFUTgPrMTmCcfrtRrqQirmpl678u2mLfZT9xBb.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/3","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/3\/fZnFUTgPrMTmCcfrtRrqQirmpl678u2mLfZT9xBb.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/3"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/3"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/3"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/27"},"post":"","put":""}},{"id":28,"idcheck":11,"idprod":7,"quant":6,"subtotal":"488.88","product":{"id":7,"name":"Cum quos perferendis modi perferendis.","type":"w","value":"81.48","images":[{"id":7,"idprod":7,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/7\/xBggFmfYCISn2e8dYS7TNhtXsTByckpX1mblbCyr.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/7","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/7\/xBggFmfYCISn2e8dYS7TNhtXsTByckpX1mblbCyr.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/7"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/7"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/7"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/28"},"post":"","put":""}},{"id":29,"idcheck":11,"idprod":2,"quant":3,"subtotal":"217.65","product":{"id":2,"name":"Voluptatibus eum qui.","type":"u","value":"72.55","images":[{"id":2,"idprod":2,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/2\/1zCBV0gSDYwvaUPpboPqUupQZYmLRCMg5sBaZmxa.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/2","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/2\/1zCBV0gSDYwvaUPpboPqUupQZYmLRCMg5sBaZmxa.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/2"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/2"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/2"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/29"},"post":"","put":""}}],"link":{"get":{"getCheckouts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/list","getCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/view\/11","getCheckoutsAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/list","getCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/view\/11"},"post":{"addCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/new","addCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/new"},"put":{"editCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/edit\/11"},"delete":{"deleteCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/delete\/11"}}}],"code":200}
```

**_Status Code:_** 200

<br>

##### II. Example Request: Token is Invalid, Token is Expired, Authorization Token not found

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

##### II. Example Response: Token is Invalid, Token is Expired, Authorization Token not found

```js
{"type":"error","code":401,"massage":"Token is Invalid"}
```

**_Status Code:_** 401

<br>

##### III. Example Request: Erros semânticos do código

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

##### III. Example Response: Erros semânticos do código

```js
{"type":"error","message":"Error","code":422,"data":{"errors":"syntax error, unexpected 'if' (T_IF)"}}
```

**_Status Code:_** 422

<br>

### 3. Cadastrar pedido do usuário

Cadastrar um pedido do usuário logado, que foi passado com JWT. Caso o usuário
não tenha cadastro como comprador, deve informa o CPF e Telefone ou celular do usuário para criar ele como comprador.
Se estiver tudo certo será enviado um email ao comprador com a confirmação do pedido

**_Endpoint:_**

```bash
Method: POST
Type: RAW
URL: https://apiteste.grupodouglascosta.com.br/api/checkouts/me/new
```

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Body:_**

```js
{"products":[{"id":"veritatis","quant":"eligendi"},{"id":"veritatis","quant":"eligendi"},{"id":"2","quant":"3"}],"phone_cell":"(12) 99994-2999","cpf":"68181045092"}
```

**_More example Requests/Responses:_**

##### I. Example Request: (result)

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Body:_**

```js
{"products":[{"id":"veritatis","quant":"eligendi"},{"id":"veritatis","quant":"eligendi"},{"id":"2","quant":"3"}],"phone_cell":"(12) 99994-2999","cpf":"68181045092"}
```

##### I. Example Response: (result)

```js
{"message":"Pedido criado com sucesso!","type":"success","data":{"id":11,"idbuyer":1,"status":"pending","value_total":"743.73","buyer":{"id":1,"iduser":1,"phone_cell":"(12)99222-0333","cpf":"44935100052","user":{"id":1,"name":"Dr. Julieta Queir\u00f3s Cervantes Jr.","email":"danielfalcao.df@gmail.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/1"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/1"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/1"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","checkProducts":[{"id":27,"idcheck":11,"idprod":3,"quant":5,"subtotal":"37.20","product":{"id":3,"name":"Voluptatem corporis maxime magni.","type":"b","value":"7.44","images":[{"id":3,"idprod":3,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/3\/fZnFUTgPrMTmCcfrtRrqQirmpl678u2mLfZT9xBb.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/3","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/3\/fZnFUTgPrMTmCcfrtRrqQirmpl678u2mLfZT9xBb.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/3"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/3"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/3"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/27"},"post":"","put":""}},{"id":28,"idcheck":11,"idprod":7,"quant":6,"subtotal":"488.88","product":{"id":7,"name":"Cum quos perferendis modi perferendis.","type":"w","value":"81.48","images":[{"id":7,"idprod":7,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/7\/xBggFmfYCISn2e8dYS7TNhtXsTByckpX1mblbCyr.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/7","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/7\/xBggFmfYCISn2e8dYS7TNhtXsTByckpX1mblbCyr.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/7"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/7"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/7"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/28"},"post":"","put":""}},{"id":29,"idcheck":11,"idprod":2,"quant":3,"subtotal":"217.65","product":{"id":2,"name":"Voluptatibus eum qui.","type":"u","value":"72.55","images":[{"id":2,"idprod":2,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/2\/1zCBV0gSDYwvaUPpboPqUupQZYmLRCMg5sBaZmxa.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/2","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/2\/1zCBV0gSDYwvaUPpboPqUupQZYmLRCMg5sBaZmxa.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/2"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/2"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/2"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/29"},"post":"","put":""}}],"link":{"get":{"getCheckouts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/list","getCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/view\/11","getCheckoutsAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/list","getCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/view\/11"},"post":{"addCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/new","addCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/new"},"put":{"editCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/edit\/11"},"delete":{"deleteCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/delete\/11"}}},"code":201}
```

**_Status Code:_** 201

<br>

##### II. Example Request: Token is Invalid, Token is Expired, Authorization Token not found

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Body:_**

```js
{"products":[{"id":"veritatis","quant":"eligendi"},{"id":"veritatis","quant":"eligendi"},{"id":"2","quant":"3"}],"phone_cell":"(12) 99994-2999","cpf":"68181045092"}
```

##### II. Example Response: Token is Invalid, Token is Expired, Authorization Token not found

```js
{"type":"error","code":401,"massage":"Token is Invalid"}
```

**_Status Code:_** 401

<br>

##### III. Example Request: Erros semânticos do código

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Body:_**

```js
{"products":[{"id":"veritatis","quant":"eligendi"},{"id":"veritatis","quant":"eligendi"},{"id":"2","quant":"3"}],"phone_cell":"(12) 99994-2999","cpf":"68181045092"}
```

##### III. Example Response: Erros semânticos do código

```js
{"type":"error","message":"Error","code":422,"data":{"errors":"syntax error, unexpected 'if' (T_IF)"}}
```

**_Status Code:_** 422

<br>

## Pedidos ADMIN

### 1. Buscar pedido

Apresenta as informações do pedido especificado

**_Endpoint:_**

```bash
Method: GET
Type:
URL: https://apiteste.grupodouglascosta.com.br/api/checkouts/view/:checkout
```

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_URL variables:_**

| Key      | Value | Description    |
| -------- | ----- | -------------- |
| checkout | 18    | O ID do pedido |

**_More example Requests/Responses:_**

##### I. Example Request: (result)

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key      | Value | Description    |
| -------- | ----- | -------------- |
| checkout | 18    | O ID do pedido |

##### I. Example Response: (result)

```js
{"message":"Pedindo encontrado!","type":"success","data":{"id":11,"idbuyer":1,"status":"pending","value_total":"743.73","buyer":{"id":1,"iduser":1,"phone_cell":"(12)99222-0333","cpf":"44935100052","user":{"id":1,"name":"Dr. Julieta Queir\u00f3s Cervantes Jr.","email":"danielfalcao.df@gmail.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/1"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/1"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/1"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","checkProducts":[{"id":27,"idcheck":11,"idprod":3,"quant":5,"subtotal":"37.20","product":{"id":3,"name":"Voluptatem corporis maxime magni.","type":"b","value":"7.44","images":[{"id":3,"idprod":3,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/3\/fZnFUTgPrMTmCcfrtRrqQirmpl678u2mLfZT9xBb.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/3","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/3\/fZnFUTgPrMTmCcfrtRrqQirmpl678u2mLfZT9xBb.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/3"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/3"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/3"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/27"},"post":"","put":""}},{"id":28,"idcheck":11,"idprod":7,"quant":6,"subtotal":"488.88","product":{"id":7,"name":"Cum quos perferendis modi perferendis.","type":"w","value":"81.48","images":[{"id":7,"idprod":7,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/7\/xBggFmfYCISn2e8dYS7TNhtXsTByckpX1mblbCyr.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/7","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/7\/xBggFmfYCISn2e8dYS7TNhtXsTByckpX1mblbCyr.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/7"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/7"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/7"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/28"},"post":"","put":""}},{"id":29,"idcheck":11,"idprod":2,"quant":3,"subtotal":"217.65","product":{"id":2,"name":"Voluptatibus eum qui.","type":"u","value":"72.55","images":[{"id":2,"idprod":2,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/2\/1zCBV0gSDYwvaUPpboPqUupQZYmLRCMg5sBaZmxa.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/2","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/2\/1zCBV0gSDYwvaUPpboPqUupQZYmLRCMg5sBaZmxa.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/2"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/2"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/2"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/29"},"post":"","put":""}}],"link":{"get":{"getCheckouts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/list","getCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/view\/11","getCheckoutsAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/list","getCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/view\/11"},"post":{"addCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/new","addCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/new"},"put":{"editCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/edit\/11"},"delete":{"deleteCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/delete\/11"}}},"code":200}
```

**_Status Code:_** 200

<br>

##### II. Example Request: Token is Invalid, Token is Expired, Authorization Token not found

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key      | Value | Description    |
| -------- | ----- | -------------- |
| checkout | 18    | O ID do pedido |

##### II. Example Response: Token is Invalid, Token is Expired, Authorization Token not found

```js
{"type":"error","code":401,"massage":"Token is Invalid"}
```

**_Status Code:_** 401

<br>

##### III. Example Request: Erros semânticos do código

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key      | Value | Description    |
| -------- | ----- | -------------- |
| checkout | 18    | O ID do pedido |

##### III. Example Response: Erros semânticos do código

```js
{"type":"error","message":"Error","code":422,"data":{"errors":"syntax error, unexpected 'if' (T_IF)"}}
```

**_Status Code:_** 422

<br>

### 2. Buscar todos pedidos

Apresenta uma lista de todos os pedidos com as informações

**_Endpoint:_**

```bash
Method: GET
Type:
URL: https://apiteste.grupodouglascosta.com.br/api/checkouts/list
```

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_More example Requests/Responses:_**

##### I. Example Request: (result)

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

##### I. Example Response: (result)

```js
{"message":"Pedidos encontrado!","type":"success","data":[{"id":1,"idbuyer":2,"status":"pending","value_total":"704.77","buyer":{"id":2,"iduser":2,"phone_cell":"(62) 2090-5325","cpf":"24657910019","user":{"id":2,"name":"Sra. Antonella Jimenes Maldonado Filho","email":"crios@yahoo.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/2"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/2"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/2"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","checkProducts":[{"id":1,"idcheck":1,"idprod":17,"quant":2,"subtotal":"108.14","product":{"id":17,"name":"Enim fuga et sapiente quisquam.","type":"m","value":"54.07","images":[{"id":17,"idprod":17,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/17\/ySTS1ka21ibxmVMVcAUmVlE2LE5wfC5UDYcaLTo4.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/17","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/17\/ySTS1ka21ibxmVMVcAUmVlE2LE5wfC5UDYcaLTo4.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/17"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/17"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/17"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/1"},"post":"","put":""}},{"id":2,"idcheck":1,"idprod":12,"quant":6,"subtotal":"400.14","product":{"id":12,"name":"Magnam qui ut odit iste.","type":"t","value":"66.69","images":[{"id":12,"idprod":12,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/12\/s7U17BSsFbS00JTP80IggGAvJuycVHnKeCLoc1Mp.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/12","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/12\/s7U17BSsFbS00JTP80IggGAvJuycVHnKeCLoc1Mp.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/12"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/12"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/12"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/2"},"post":"","put":""}},{"id":3,"idcheck":1,"idprod":13,"quant":1,"subtotal":"86.71","product":{"id":13,"name":"Odio optio eaque.","type":"e","value":"86.71","images":[{"id":13,"idprod":13,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/13\/5SzKqRNoyShdUeH1b3Hhxk70HBb9ClSQ7DG0f5GX.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/13","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/13\/5SzKqRNoyShdUeH1b3Hhxk70HBb9ClSQ7DG0f5GX.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/13"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/13"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/13"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/3"},"post":"","put":""}},{"id":4,"idcheck":1,"idprod":1,"quant":2,"subtotal":"109.78","product":{"id":1,"name":"Molestiae vero numquam.","type":"c","value":"54.89","images":[{"id":1,"idprod":1,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/1\/YI9ZXpJ3M8FI6hl4JIJ3BJgRZSHnhmt8keuZJuKb.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/1","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/1\/YI9ZXpJ3M8FI6hl4JIJ3BJgRZSHnhmt8keuZJuKb.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/1"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/1"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/1"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/4"},"post":"","put":""}}],"link":{"get":{"getCheckouts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/list","getCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/view\/1","getCheckoutsAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/list","getCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/view\/1"},"post":{"addCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/new","addCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/new"},"put":{"editCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/edit\/1"},"delete":{"deleteCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/delete\/1"}}},{"id":2,"idbuyer":14,"status":"pending","value_total":"80.25","buyer":{"id":14,"iduser":14,"phone_cell":"(37) 2368-2655","cpf":"85889980173","user":{"id":14,"name":"Mauro Mar\u00e9s Montenegro","email":"hugo70@escobar.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/14"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/14"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/14"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","checkProducts":[{"id":5,"idcheck":2,"idprod":11,"quant":5,"subtotal":"80.25","product":{"id":11,"name":"Quo dicta pariatur est doloribus.","type":"m","value":"16.05","images":[{"id":11,"idprod":11,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/11\/STtrNTvA8k8yWIOO45JoLq8B0Wgjks31Xi5b5jQ2.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/11","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/11\/STtrNTvA8k8yWIOO45JoLq8B0Wgjks31Xi5b5jQ2.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/11"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/11"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/11"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/5"},"post":"","put":""}}],"link":{"get":{"getCheckouts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/list","getCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/view\/2","getCheckoutsAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/list","getCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/view\/2"},"post":{"addCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/new","addCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/new"},"put":{"editCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/edit\/2"},"delete":{"deleteCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/delete\/2"}}},{"id":3,"idbuyer":20,"status":"pending","value_total":"333.45","buyer":{"id":20,"iduser":20,"phone_cell":"(24) 2801-4267","cpf":"35382758743","user":{"id":20,"name":"Cauan Bittencourt Gon\u00e7alves","email":"sergio36@terra.com.br","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/20"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/20"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/20"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","checkProducts":[{"id":6,"idcheck":3,"idprod":12,"quant":5,"subtotal":"333.45","product":{"id":12,"name":"Magnam qui ut odit iste.","type":"t","value":"66.69","images":[{"id":12,"idprod":12,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/12\/s7U17BSsFbS00JTP80IggGAvJuycVHnKeCLoc1Mp.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/12","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/12\/s7U17BSsFbS00JTP80IggGAvJuycVHnKeCLoc1Mp.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/12"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/12"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/12"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/6"},"post":"","put":""}}],"link":{"get":{"getCheckouts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/list","getCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/view\/3","getCheckoutsAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/list","getCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/view\/3"},"post":{"addCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/new","addCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/new"},"put":{"editCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/edit\/3"},"delete":{"deleteCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/delete\/3"}}},{"id":4,"idbuyer":9,"status":"pending","value_total":"514.05","buyer":{"id":9,"iduser":9,"phone_cell":"(73) 97917-8522","cpf":"75839663964","user":{"id":9,"name":"Dr. Renato Fontes","email":"yromero@ferreira.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/9"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/9"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/9"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","checkProducts":[{"id":7,"idcheck":4,"idprod":8,"quant":9,"subtotal":"195.21","product":{"id":8,"name":"Consequatur velit quaerat ab.","type":"o","value":"21.69","images":[{"id":8,"idprod":8,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/8\/thNCW6JjWCNP5sjfxCaqV9ADAsDrVR930WmMTFMe.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/8","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/8\/thNCW6JjWCNP5sjfxCaqV9ADAsDrVR930WmMTFMe.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/8"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/8"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/8"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/7"},"post":"","put":""}},{"id":8,"idcheck":4,"idprod":18,"quant":4,"subtotal":"318.84","product":{"id":18,"name":"Natus eius sunt soluta.","type":"e","value":"79.71","images":[{"id":18,"idprod":18,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/18\/7ydyCx5cyqbw58LYjaJOOPDf0CokYdZXv1rNNfbo.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/18","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/18\/7ydyCx5cyqbw58LYjaJOOPDf0CokYdZXv1rNNfbo.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/18"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/18"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/18"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/8"},"post":"","put":""}}],"link":{"get":{"getCheckouts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/list","getCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/view\/4","getCheckoutsAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/list","getCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/view\/4"},"post":{"addCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/new","addCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/new"},"put":{"editCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/edit\/4"},"delete":{"deleteCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/delete\/4"}}},{"id":5,"idbuyer":14,"status":"pending","value_total":"21.69","buyer":{"id":14,"iduser":14,"phone_cell":"(37) 2368-2655","cpf":"85889980173","user":{"id":14,"name":"Mauro Mar\u00e9s Montenegro","email":"hugo70@escobar.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/14"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/14"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/14"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","checkProducts":[{"id":9,"idcheck":5,"idprod":8,"quant":1,"subtotal":"21.69","product":{"id":8,"name":"Consequatur velit quaerat ab.","type":"o","value":"21.69","images":[{"id":8,"idprod":8,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/8\/thNCW6JjWCNP5sjfxCaqV9ADAsDrVR930WmMTFMe.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/8","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/8\/thNCW6JjWCNP5sjfxCaqV9ADAsDrVR930WmMTFMe.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/8"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/8"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/8"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/9"},"post":"","put":""}}],"link":{"get":{"getCheckouts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/list","getCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/view\/5","getCheckoutsAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/list","getCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/view\/5"},"post":{"addCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/new","addCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/new"},"put":{"editCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/edit\/5"},"delete":{"deleteCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/delete\/5"}}},{"id":6,"idbuyer":14,"status":"pending","value_total":"115.93","buyer":{"id":14,"iduser":14,"phone_cell":"(37) 2368-2655","cpf":"85889980173","user":{"id":14,"name":"Mauro Mar\u00e9s Montenegro","email":"hugo70@escobar.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/14"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/14"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/14"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","checkProducts":[{"id":10,"idcheck":6,"idprod":8,"quant":2,"subtotal":"43.38","product":{"id":8,"name":"Consequatur velit quaerat ab.","type":"o","value":"21.69","images":[{"id":8,"idprod":8,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/8\/thNCW6JjWCNP5sjfxCaqV9ADAsDrVR930WmMTFMe.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/8","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/8\/thNCW6JjWCNP5sjfxCaqV9ADAsDrVR930WmMTFMe.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/8"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/8"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/8"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/10"},"post":"","put":""}},{"id":11,"idcheck":6,"idprod":2,"quant":1,"subtotal":"72.55","product":{"id":2,"name":"Voluptatibus eum qui.","type":"u","value":"72.55","images":[{"id":2,"idprod":2,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/2\/1zCBV0gSDYwvaUPpboPqUupQZYmLRCMg5sBaZmxa.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/2","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/2\/1zCBV0gSDYwvaUPpboPqUupQZYmLRCMg5sBaZmxa.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/2"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/2"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/2"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/11"},"post":"","put":""}}],"link":{"get":{"getCheckouts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/list","getCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/view\/6","getCheckoutsAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/list","getCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/view\/6"},"post":{"addCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/new","addCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/new"},"put":{"editCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/edit\/6"},"delete":{"deleteCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/delete\/6"}}},{"id":7,"idbuyer":2,"status":"pending","value_total":"597.05","buyer":{"id":2,"iduser":2,"phone_cell":"(62) 2090-5325","cpf":"24657910019","user":{"id":2,"name":"Sra. Antonella Jimenes Maldonado Filho","email":"crios@yahoo.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/2"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/2"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/2"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","checkProducts":[{"id":12,"idcheck":7,"idprod":1,"quant":7,"subtotal":"384.23","product":{"id":1,"name":"Molestiae vero numquam.","type":"c","value":"54.89","images":[{"id":1,"idprod":1,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/1\/YI9ZXpJ3M8FI6hl4JIJ3BJgRZSHnhmt8keuZJuKb.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/1","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/1\/YI9ZXpJ3M8FI6hl4JIJ3BJgRZSHnhmt8keuZJuKb.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/1"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/1"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/1"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/12"},"post":"","put":""}},{"id":13,"idcheck":7,"idprod":10,"quant":3,"subtotal":"212.82","product":{"id":10,"name":"Nulla eum quos.","type":"y","value":"70.94","images":[{"id":10,"idprod":10,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/10\/Qdy9WLK4BKd54wQAvUurED9jbZZUc2yKESK1fV9d.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/10","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/10\/Qdy9WLK4BKd54wQAvUurED9jbZZUc2yKESK1fV9d.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/10"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/10"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/10"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/13"},"post":"","put":""}}],"link":{"get":{"getCheckouts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/list","getCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/view\/7","getCheckoutsAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/list","getCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/view\/7"},"post":{"addCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/new","addCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/new"},"put":{"editCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/edit\/7"},"delete":{"deleteCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/delete\/7"}}},{"id":8,"idbuyer":15,"status":"pending","value_total":"1,780.25","buyer":{"id":15,"iduser":15,"phone_cell":"(95) 93765-1989","cpf":"37526896686","user":{"id":15,"name":"Kauan \u00c1vila D'\u00e1vila","email":"lilian.cruz@serrano.org","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/15"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/15"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/15"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","checkProducts":[{"id":14,"idcheck":8,"idprod":4,"quant":4,"subtotal":"318.24","product":{"id":4,"name":"Mollitia consequatur id voluptates.","type":"q","value":"79.56","images":[{"id":4,"idprod":4,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/4\/VrpkLFP9E2zTBBXC5xlw79C2ShhBSGhmaVxYBdf9.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/4","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/4\/VrpkLFP9E2zTBBXC5xlw79C2ShhBSGhmaVxYBdf9.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/4"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/4"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/4"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/14"},"post":"","put":""}},{"id":15,"idcheck":8,"idprod":15,"quant":8,"subtotal":"660.24","product":{"id":15,"name":"Impedit ut aspernatur praesentium delectus.","type":"i","value":"82.53","images":[{"id":15,"idprod":15,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/15\/bNIxHgBvtP0KSNWP08kdrte1PFxOVjbtRFWanE2e.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/15","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/15\/bNIxHgBvtP0KSNWP08kdrte1PFxOVjbtRFWanE2e.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/15"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/15"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/15"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/15"},"post":"","put":""}},{"id":16,"idcheck":8,"idprod":19,"quant":1,"subtotal":"58.31","product":{"id":19,"name":"Vel dolores eligendi iure.","type":"k","value":"58.31","images":[{"id":19,"idprod":19,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/19\/8i9POhKCpYfok4F3GJxYC6ap3jyObCEGdW86a2K1.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/19","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/19\/8i9POhKCpYfok4F3GJxYC6ap3jyObCEGdW86a2K1.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/19"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/19"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/19"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/16"},"post":"","put":""}},{"id":17,"idcheck":8,"idprod":10,"quant":10,"subtotal":"709.40","product":{"id":10,"name":"Nulla eum quos.","type":"y","value":"70.94","images":[{"id":10,"idprod":10,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/10\/Qdy9WLK4BKd54wQAvUurED9jbZZUc2yKESK1fV9d.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/10","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/10\/Qdy9WLK4BKd54wQAvUurED9jbZZUc2yKESK1fV9d.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/10"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/10"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/10"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/17"},"post":"","put":""}},{"id":18,"idcheck":8,"idprod":14,"quant":1,"subtotal":"34.06","product":{"id":14,"name":"Qui sint sit.","type":"t","value":"34.06","images":[{"id":14,"idprod":14,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/14\/cnPL8ov4PXnfR4USjnA0ga81kYORIcF8S80eRLoC.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/14","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/14\/cnPL8ov4PXnfR4USjnA0ga81kYORIcF8S80eRLoC.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/14"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/14"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/14"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/18"},"post":"","put":""}}],"link":{"get":{"getCheckouts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/list","getCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/view\/8","getCheckoutsAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/list","getCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/view\/8"},"post":{"addCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/new","addCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/new"},"put":{"editCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/edit\/8"},"delete":{"deleteCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/delete\/8"}}},{"id":9,"idbuyer":13,"status":"pending","value_total":"1,270.29","buyer":{"id":13,"iduser":13,"phone_cell":"(47) 3146-6306","cpf":"70354548298","user":{"id":13,"name":"Sr. Enzo Aguiar","email":"franco04@yahoo.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/13"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/13"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/13"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","checkProducts":[{"id":19,"idcheck":9,"idprod":18,"quant":8,"subtotal":"637.68","product":{"id":18,"name":"Natus eius sunt soluta.","type":"e","value":"79.71","images":[{"id":18,"idprod":18,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/18\/7ydyCx5cyqbw58LYjaJOOPDf0CokYdZXv1rNNfbo.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/18","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/18\/7ydyCx5cyqbw58LYjaJOOPDf0CokYdZXv1rNNfbo.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/18"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/18"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/18"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/19"},"post":"","put":""}},{"id":20,"idcheck":9,"idprod":13,"quant":6,"subtotal":"520.26","product":{"id":13,"name":"Odio optio eaque.","type":"e","value":"86.71","images":[{"id":13,"idprod":13,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/13\/5SzKqRNoyShdUeH1b3Hhxk70HBb9ClSQ7DG0f5GX.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/13","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/13\/5SzKqRNoyShdUeH1b3Hhxk70HBb9ClSQ7DG0f5GX.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/13"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/13"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/13"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/20"},"post":"","put":""}},{"id":21,"idcheck":9,"idprod":11,"quant":7,"subtotal":"112.35","product":{"id":11,"name":"Quo dicta pariatur est doloribus.","type":"m","value":"16.05","images":[{"id":11,"idprod":11,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/11\/STtrNTvA8k8yWIOO45JoLq8B0Wgjks31Xi5b5jQ2.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/11","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/11\/STtrNTvA8k8yWIOO45JoLq8B0Wgjks31Xi5b5jQ2.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/11"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/11"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/11"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/21"},"post":"","put":""}}],"link":{"get":{"getCheckouts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/list","getCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/view\/9","getCheckoutsAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/list","getCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/view\/9"},"post":{"addCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/new","addCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/new"},"put":{"editCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/edit\/9"},"delete":{"deleteCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/delete\/9"}}},{"id":10,"idbuyer":5,"status":"pending","value_total":"1,126.71","buyer":{"id":5,"iduser":5,"phone_cell":"(11) 92066-0597","cpf":"62124157060","user":{"id":5,"name":"Dr. J\u00e1como \u00cdtalo Prado Jr.","email":"lroque@ig.com.br","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/5"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/5"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/5"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","checkProducts":[{"id":22,"idcheck":10,"idprod":10,"quant":1,"subtotal":"70.94","product":{"id":10,"name":"Nulla eum quos.","type":"y","value":"70.94","images":[{"id":10,"idprod":10,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/10\/Qdy9WLK4BKd54wQAvUurED9jbZZUc2yKESK1fV9d.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/10","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/10\/Qdy9WLK4BKd54wQAvUurED9jbZZUc2yKESK1fV9d.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/10"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/10"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/10"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/22"},"post":"","put":""}},{"id":23,"idcheck":10,"idprod":10,"quant":2,"subtotal":"141.88","product":{"id":10,"name":"Nulla eum quos.","type":"y","value":"70.94","images":[{"id":10,"idprod":10,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/10\/Qdy9WLK4BKd54wQAvUurED9jbZZUc2yKESK1fV9d.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/10","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/10\/Qdy9WLK4BKd54wQAvUurED9jbZZUc2yKESK1fV9d.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/10"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/10"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/10"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/23"},"post":"","put":""}},{"id":24,"idcheck":10,"idprod":19,"quant":5,"subtotal":"291.55","product":{"id":19,"name":"Vel dolores eligendi iure.","type":"k","value":"58.31","images":[{"id":19,"idprod":19,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/19\/8i9POhKCpYfok4F3GJxYC6ap3jyObCEGdW86a2K1.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/19","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/19\/8i9POhKCpYfok4F3GJxYC6ap3jyObCEGdW86a2K1.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/19"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/19"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/19"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/24"},"post":"","put":""}},{"id":25,"idcheck":10,"idprod":14,"quant":8,"subtotal":"272.48","product":{"id":14,"name":"Qui sint sit.","type":"t","value":"34.06","images":[{"id":14,"idprod":14,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/14\/cnPL8ov4PXnfR4USjnA0ga81kYORIcF8S80eRLoC.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/14","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/14\/cnPL8ov4PXnfR4USjnA0ga81kYORIcF8S80eRLoC.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/14"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/14"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/14"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/25"},"post":"","put":""}},{"id":26,"idcheck":10,"idprod":19,"quant":6,"subtotal":"349.86","product":{"id":19,"name":"Vel dolores eligendi iure.","type":"k","value":"58.31","images":[{"id":19,"idprod":19,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/19\/8i9POhKCpYfok4F3GJxYC6ap3jyObCEGdW86a2K1.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/19","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/19\/8i9POhKCpYfok4F3GJxYC6ap3jyObCEGdW86a2K1.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/19"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/19"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/19"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/26"},"post":"","put":""}}],"link":{"get":{"getCheckouts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/list","getCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/view\/10","getCheckoutsAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/list","getCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/view\/10"},"post":{"addCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/new","addCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/new"},"put":{"editCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/edit\/10"},"delete":{"deleteCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/delete\/10"}}},{"id":11,"idbuyer":1,"status":"pending","value_total":"743.73","buyer":{"id":1,"iduser":1,"phone_cell":"(12)99222-0333","cpf":"44935100052","user":{"id":1,"name":"Dr. Julieta Queir\u00f3s Cervantes Jr.","email":"danielfalcao.df@gmail.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/1"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/1"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/1"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","checkProducts":[{"id":27,"idcheck":11,"idprod":3,"quant":5,"subtotal":"37.20","product":{"id":3,"name":"Voluptatem corporis maxime magni.","type":"b","value":"7.44","images":[{"id":3,"idprod":3,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/3\/fZnFUTgPrMTmCcfrtRrqQirmpl678u2mLfZT9xBb.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/3","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/3\/fZnFUTgPrMTmCcfrtRrqQirmpl678u2mLfZT9xBb.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/3"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/3"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/3"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/27"},"post":"","put":""}},{"id":28,"idcheck":11,"idprod":7,"quant":6,"subtotal":"488.88","product":{"id":7,"name":"Cum quos perferendis modi perferendis.","type":"w","value":"81.48","images":[{"id":7,"idprod":7,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/7\/xBggFmfYCISn2e8dYS7TNhtXsTByckpX1mblbCyr.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/7","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/7\/xBggFmfYCISn2e8dYS7TNhtXsTByckpX1mblbCyr.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/7"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/7"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/7"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/28"},"post":"","put":""}},{"id":29,"idcheck":11,"idprod":2,"quant":3,"subtotal":"217.65","product":{"id":2,"name":"Voluptatibus eum qui.","type":"u","value":"72.55","images":[{"id":2,"idprod":2,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/2\/1zCBV0gSDYwvaUPpboPqUupQZYmLRCMg5sBaZmxa.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/2","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/2\/1zCBV0gSDYwvaUPpboPqUupQZYmLRCMg5sBaZmxa.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/2"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/2"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/2"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/29"},"post":"","put":""}}],"link":{"get":{"getCheckouts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/list","getCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/view\/11","getCheckoutsAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/list","getCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/view\/11"},"post":{"addCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/new","addCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/new"},"put":{"editCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/edit\/11"},"delete":{"deleteCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/delete\/11"}}}],"code":200}
```

**_Status Code:_** 200

<br>

##### II. Example Request: Token is Invalid, Token is Expired, Authorization Token not found

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

##### II. Example Response: Token is Invalid, Token is Expired, Authorization Token not found

```js
{"type":"error","code":401,"massage":"Token is Invalid"}
```

**_Status Code:_** 401

<br>

##### III. Example Request: Erros semânticos do código

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

##### III. Example Response: Erros semânticos do código

```js
{"type":"error","message":"Error","code":422,"data":{"errors":"syntax error, unexpected 'if' (T_IF)"}}
```

**_Status Code:_** 422

<br>

### 3. Criar um pedido do comprador

Cadastra um pedido do comprador especificando o ID do comprador.
Se estiver tudo certo será enviado um email ao comprador com a confirmação do pedido

**_Endpoint:_**

```bash
Method: POST
Type: RAW
URL: https://apiteste.grupodouglascosta.com.br/api/checkouts/new
```

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Body:_**

```js
{"idbuyer":"1","products":[{"id":"et","quant":"numquam"},{"id":"et","quant":"numquam"},{"id":"2","quant":"3"}]}
```

**_More example Requests/Responses:_**

##### I. Example Request: (result)

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Body:_**

```js
{"idbuyer":"1","products":[{"id":"et","quant":"numquam"},{"id":"et","quant":"numquam"},{"id":"2","quant":"3"}]}
```

##### I. Example Response: (result)

```js
{"message":"Pedido criado com sucesso!","type":"success","data":{"id":12,"idbuyer":1,"status":"pending","value_total":"486.09","buyer":{"id":1,"iduser":1,"phone_cell":"(12)99222-0333","cpf":"44935100052","user":{"id":1,"name":"Dr. Julieta Queir\u00f3s Cervantes Jr.","email":"danielfalcao.df@gmail.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/1"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/1"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/1"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","checkProducts":[{"id":30,"idcheck":12,"idprod":2,"quant":3,"subtotal":"217.65","product":{"id":2,"name":"Voluptatibus eum qui.","type":"u","value":"72.55","images":[{"id":2,"idprod":2,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/2\/1zCBV0gSDYwvaUPpboPqUupQZYmLRCMg5sBaZmxa.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/2","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/2\/1zCBV0gSDYwvaUPpboPqUupQZYmLRCMg5sBaZmxa.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/2"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/2"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/2"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/30"},"post":"","put":""}},{"id":31,"idcheck":12,"idprod":3,"quant":4,"subtotal":"29.76","product":{"id":3,"name":"Voluptatem corporis maxime magni.","type":"b","value":"7.44","images":[{"id":3,"idprod":3,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/3\/fZnFUTgPrMTmCcfrtRrqQirmpl678u2mLfZT9xBb.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/3","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/3\/fZnFUTgPrMTmCcfrtRrqQirmpl678u2mLfZT9xBb.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/3"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/3"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/3"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/31"},"post":"","put":""}},{"id":32,"idcheck":12,"idprod":4,"quant":3,"subtotal":"238.68","product":{"id":4,"name":"Mollitia consequatur id voluptates.","type":"q","value":"79.56","images":[{"id":4,"idprod":4,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/4\/VrpkLFP9E2zTBBXC5xlw79C2ShhBSGhmaVxYBdf9.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/4","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/4\/VrpkLFP9E2zTBBXC5xlw79C2ShhBSGhmaVxYBdf9.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/4"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/4"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/4"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/32"},"post":"","put":""}}],"link":{"get":{"getCheckouts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/list","getCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/view\/12","getCheckoutsAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/list","getCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/view\/12"},"post":{"addCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/new","addCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/new"},"put":{"editCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/edit\/12"},"delete":{"deleteCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/delete\/12"}}},"code":201}
```

**_Status Code:_** 201

<br>

##### II. Example Request: Token is Invalid, Token is Expired, Authorization Token not found

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Body:_**

```js
{"idbuyer":"1","products":[{"id":"et","quant":"numquam"},{"id":"et","quant":"numquam"},{"id":"2","quant":"3"}]}
```

##### II. Example Response: Token is Invalid, Token is Expired, Authorization Token not found

```js
{"type":"error","code":401,"massage":"Token is Invalid"}
```

**_Status Code:_** 401

<br>

##### III. Example Request: Erros semânticos do código

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Body:_**

```js
{"idbuyer":"1","products":[{"id":"et","quant":"numquam"},{"id":"et","quant":"numquam"},{"id":"2","quant":"3"}]}
```

##### III. Example Response: Erros semânticos do código

```js
{"type":"error","message":"Error","code":422,"data":{"errors":"syntax error, unexpected 'if' (T_IF)"}}
```

**_Status Code:_** 422

<br>

### 4. Deletar Pedido

Deletar um pedido especificado

**_Endpoint:_**

```bash
Method: DELETE
Type:
URL: https://apiteste.grupodouglascosta.com.br/api/checkouts/delete/:checkout
```

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_URL variables:_**

| Key      | Value | Description    |
| -------- | ----- | -------------- |
| checkout | 18    | O ID do pedido |

**_More example Requests/Responses:_**

##### I. Example Request: (result)

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key      | Value | Description    |
| -------- | ----- | -------------- |
| checkout | 18    | O ID do pedido |

##### I. Example Response: (result)

```js
{"message":"Pedido deletado!","type":"success","data":[],"code":200}
```

**_Status Code:_** 200

<br>

##### II. Example Request: Token is Invalid, Token is Expired, Authorization Token not found

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key      | Value | Description    |
| -------- | ----- | -------------- |
| checkout | 18    | O ID do pedido |

##### II. Example Response: Token is Invalid, Token is Expired, Authorization Token not found

```js
{"type":"error","code":401,"massage":"Token is Invalid"}
```

**_Status Code:_** 401

<br>

##### III. Example Request: Erros semânticos do código

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key      | Value | Description    |
| -------- | ----- | -------------- |
| checkout | 18    | O ID do pedido |

##### III. Example Response: Erros semânticos do código

```js
{"type":"error","message":"Error","code":422,"data":{"errors":"syntax error, unexpected 'if' (T_IF)"}}
```

**_Status Code:_** 422

<br>

### 5. Editar Pedido

Editar um pedido (comprador e os produtos) especificado, se tudo estiver certo apresenta as informações do pedido

**_Endpoint:_**

```bash
Method: PUT
Type: RAW
URL: https://apiteste.grupodouglascosta.com.br/api/checkouts/edit/:checkout
```

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_URL variables:_**

| Key      | Value | Description    |
| -------- | ----- | -------------- |
| checkout | 1     | O ID do pedido |

**_Body:_**

```js
{"idbuyer":"1","products":[{"id":"quasi","quant":"quasi"},{"id":"quasi","quant":"quasi"},{"id":"2","quant":"3"}]}
```

**_More example Requests/Responses:_**

##### I. Example Request: (result)

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key      | Value | Description    |
| -------- | ----- | -------------- |
| checkout | 1     | O ID do pedido |

**_Body:_**

```js
{"idbuyer":"1","products":[{"id":"quasi","quant":"quasi"},{"id":"quasi","quant":"quasi"},{"id":"2","quant":"3"}]}
```

##### I. Example Response: (result)

```js
{"message":"Pedido alterado com sucesso!","type":"success","data":{"id":3,"idbuyer":1,"status":"pending","value_total":"571.27","buyer":{"id":1,"iduser":1,"phone_cell":"(12)99222-0333","cpf":"44935100052","user":{"id":1,"name":"Dr. Julieta Queir\u00f3s Cervantes Jr.","email":"danielfalcao.df@gmail.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getBuyers":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers","getBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/view\/1"},"post":{"addBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/add"},"put":{"editBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/edit\/1"},"delete":{"deleteBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/buyers\/delete\/1"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","checkProducts":[{"id":33,"idcheck":3,"idprod":2,"quant":4,"subtotal":"290.20","product":{"id":2,"name":"Voluptatibus eum qui.","type":"u","value":"72.55","images":[{"id":2,"idprod":2,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/2\/1zCBV0gSDYwvaUPpboPqUupQZYmLRCMg5sBaZmxa.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/2","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/2\/1zCBV0gSDYwvaUPpboPqUupQZYmLRCMg5sBaZmxa.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/2"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/2"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/2"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/33"},"post":"","put":""}},{"id":34,"idcheck":3,"idprod":5,"quant":7,"subtotal":"63.42","product":{"id":5,"name":"Occaecati impedit.","type":"x","value":"9.06","images":[{"id":5,"idprod":5,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/5\/08N2v5PoSCLOwBD5pcdGPdZmDY3rxNRa7R9Tn58w.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/5","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/5\/08N2v5PoSCLOwBD5pcdGPdZmDY3rxNRa7R9Tn58w.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/5"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/5"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/5"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/34"},"post":"","put":""}},{"id":35,"idcheck":3,"idprod":2,"quant":3,"subtotal":"217.65","product":{"id":2,"name":"Voluptatibus eum qui.","type":"u","value":"72.55","images":[{"id":2,"idprod":2,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/2\/1zCBV0gSDYwvaUPpboPqUupQZYmLRCMg5sBaZmxa.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/2","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/2\/1zCBV0gSDYwvaUPpboPqUupQZYmLRCMg5sBaZmxa.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/2"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/2"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/2"}}},"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/35"},"post":"","put":""}}],"link":{"get":{"getCheckouts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/list","getCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/view\/3","getCheckoutsAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/list","getCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/view\/3"},"post":{"addCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/me\/new","addCheckoutBuyer":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/new"},"put":{"editCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/edit\/3"},"delete":{"deleteCheckout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/checkouts\/delete\/3"}}},"code":200}
```

**_Status Code:_** 200

<br>

##### II. Example Request: Token is Invalid, Token is Expired, Authorization Token not found

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key      | Value | Description    |
| -------- | ----- | -------------- |
| checkout | 1     | O ID do pedido |

**_Body:_**

```js
{"idbuyer":"1","products":[{"id":"quasi","quant":"quasi"},{"id":"quasi","quant":"quasi"},{"id":"2","quant":"3"}]}
```

##### II. Example Response: Token is Invalid, Token is Expired, Authorization Token not found

```js
{"type":"error","code":401,"massage":"Token is Invalid"}
```

**_Status Code:_** 401

<br>

##### III. Example Request: Erros semânticos do código

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key      | Value | Description    |
| -------- | ----- | -------------- |
| checkout | 1     | O ID do pedido |

**_Body:_**

```js
{"idbuyer":"1","products":[{"id":"quasi","quant":"quasi"},{"id":"quasi","quant":"quasi"},{"id":"2","quant":"3"}]}
```

##### III. Example Response: Erros semânticos do código

```js
{"type":"error","message":"Error","code":422,"data":{"errors":"syntax error, unexpected 'if' (T_IF)"}}
```

**_Status Code:_** 422

<br>

## Produtos

### 1. Buscar produto

Apresenta as informações do produto especificado

**_Endpoint:_**

```bash
Method: GET
Type:
URL: https://apiteste.grupodouglascosta.com.br/api/products/view/:product
```

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_URL variables:_**

| Key     | Value | Description     |
| ------- | ----- | --------------- |
| product | 18    | O ID do produto |

**_More example Requests/Responses:_**

##### I. Example Request: (result)

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key     | Value | Description     |
| ------- | ----- | --------------- |
| product | 18    | O ID do produto |

##### I. Example Response: (result)

```js
{"message":"Produto encontrado!","type":"success","data":{"id":14,"name":"Qui sint sit.","type":"t","value":"34.06","images":[{"id":14,"idprod":14,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/14\/cnPL8ov4PXnfR4USjnA0ga81kYORIcF8S80eRLoC.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/14","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/14\/cnPL8ov4PXnfR4USjnA0ga81kYORIcF8S80eRLoC.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/14"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/14"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/14"}}},"code":200}
```

**_Status Code:_** 200

<br>

##### II. Example Request: Token is Invalid, Token is Expired, Authorization Token not found

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key     | Value | Description     |
| ------- | ----- | --------------- |
| product | 18    | O ID do produto |

##### II. Example Response: Token is Invalid, Token is Expired, Authorization Token not found

```js
{"type":"error","code":401,"massage":"Token is Invalid"}
```

**_Status Code:_** 401

<br>

##### III. Example Request: Erros semânticos do código

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key     | Value | Description     |
| ------- | ----- | --------------- |
| product | 18    | O ID do produto |

##### III. Example Response: Erros semânticos do código

```js
{"type":"error","message":"Error","code":422,"data":{"errors":"syntax error, unexpected 'if' (T_IF)"}}
```

**_Status Code:_** 422

<br>

### 2. Buscar todos os produtos

Apresenta uma lista de todos os produtos com as informações

**_Endpoint:_**

```bash
Method: GET
Type:
URL: https://apiteste.grupodouglascosta.com.br/api/products/list
```

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_More example Requests/Responses:_**

##### I. Example Request: (result)

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

##### I. Example Response: (result)

```js
{"message":"Produtos encontrado!","type":"success","data":[{"id":1,"name":"Molestiae vero numquam.","type":"c","value":"54.89","images":[{"id":1,"idprod":1,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/1\/YI9ZXpJ3M8FI6hl4JIJ3BJgRZSHnhmt8keuZJuKb.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/1","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/1\/YI9ZXpJ3M8FI6hl4JIJ3BJgRZSHnhmt8keuZJuKb.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/1"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/1"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/1"}}},{"id":2,"name":"Voluptatibus eum qui.","type":"u","value":"72.55","images":[{"id":2,"idprod":2,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/2\/1zCBV0gSDYwvaUPpboPqUupQZYmLRCMg5sBaZmxa.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/2","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/2\/1zCBV0gSDYwvaUPpboPqUupQZYmLRCMg5sBaZmxa.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/2"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/2"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/2"}}},{"id":3,"name":"Voluptatem corporis maxime magni.","type":"b","value":"7.44","images":[{"id":3,"idprod":3,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/3\/fZnFUTgPrMTmCcfrtRrqQirmpl678u2mLfZT9xBb.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/3","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/3\/fZnFUTgPrMTmCcfrtRrqQirmpl678u2mLfZT9xBb.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/3"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/3"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/3"}}},{"id":4,"name":"Mollitia consequatur id voluptates.","type":"q","value":"79.56","images":[{"id":4,"idprod":4,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/4\/VrpkLFP9E2zTBBXC5xlw79C2ShhBSGhmaVxYBdf9.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/4","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/4\/VrpkLFP9E2zTBBXC5xlw79C2ShhBSGhmaVxYBdf9.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/4"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/4"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/4"}}},{"id":5,"name":"Occaecati impedit.","type":"x","value":"9.06","images":[{"id":5,"idprod":5,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/5\/08N2v5PoSCLOwBD5pcdGPdZmDY3rxNRa7R9Tn58w.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/5","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/5\/08N2v5PoSCLOwBD5pcdGPdZmDY3rxNRa7R9Tn58w.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/5"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/5"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/5"}}},{"id":6,"name":"Corrupti eum nostrum.","type":"s","value":"36.24","images":[{"id":6,"idprod":6,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/6\/sSXMcnw5R5YdOZJyWMYy3wrsrrTNtvlMESa2uDLV.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/6","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/6\/sSXMcnw5R5YdOZJyWMYy3wrsrrTNtvlMESa2uDLV.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/6"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/6"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/6"}}},{"id":7,"name":"Cum quos perferendis modi perferendis.","type":"w","value":"81.48","images":[{"id":7,"idprod":7,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/7\/xBggFmfYCISn2e8dYS7TNhtXsTByckpX1mblbCyr.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/7","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/7\/xBggFmfYCISn2e8dYS7TNhtXsTByckpX1mblbCyr.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/7"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/7"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/7"}}},{"id":8,"name":"Consequatur velit quaerat ab.","type":"o","value":"21.69","images":[{"id":8,"idprod":8,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/8\/thNCW6JjWCNP5sjfxCaqV9ADAsDrVR930WmMTFMe.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/8","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/8\/thNCW6JjWCNP5sjfxCaqV9ADAsDrVR930WmMTFMe.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/8"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/8"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/8"}}},{"id":9,"name":"Sit veritatis odit sit quasi.","type":"e","value":"3.71","images":[{"id":9,"idprod":9,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/9\/7iSUqXWAwjprXxCIARF4EFnjr36uPUuivAPPd82X.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/9","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/9\/7iSUqXWAwjprXxCIARF4EFnjr36uPUuivAPPd82X.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/9"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/9"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/9"}}},{"id":10,"name":"Nulla eum quos.","type":"y","value":"70.94","images":[{"id":10,"idprod":10,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/10\/Qdy9WLK4BKd54wQAvUurED9jbZZUc2yKESK1fV9d.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/10","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/10\/Qdy9WLK4BKd54wQAvUurED9jbZZUc2yKESK1fV9d.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/10"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/10"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/10"}}},{"id":11,"name":"Quo dicta pariatur est doloribus.","type":"m","value":"16.05","images":[{"id":11,"idprod":11,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/11\/STtrNTvA8k8yWIOO45JoLq8B0Wgjks31Xi5b5jQ2.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/11","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/11\/STtrNTvA8k8yWIOO45JoLq8B0Wgjks31Xi5b5jQ2.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/11"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/11"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/11"}}},{"id":12,"name":"Magnam qui ut odit iste.","type":"t","value":"66.69","images":[{"id":12,"idprod":12,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/12\/s7U17BSsFbS00JTP80IggGAvJuycVHnKeCLoc1Mp.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/12","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/12\/s7U17BSsFbS00JTP80IggGAvJuycVHnKeCLoc1Mp.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/12"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/12"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/12"}}},{"id":13,"name":"Odio optio eaque.","type":"e","value":"86.71","images":[{"id":13,"idprod":13,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/13\/5SzKqRNoyShdUeH1b3Hhxk70HBb9ClSQ7DG0f5GX.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/13","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/13\/5SzKqRNoyShdUeH1b3Hhxk70HBb9ClSQ7DG0f5GX.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/13"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/13"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/13"}}},{"id":14,"name":"Qui sint sit.","type":"t","value":"34.06","images":[{"id":14,"idprod":14,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/14\/cnPL8ov4PXnfR4USjnA0ga81kYORIcF8S80eRLoC.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/14","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/14\/cnPL8ov4PXnfR4USjnA0ga81kYORIcF8S80eRLoC.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/14"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/14"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/14"}}},{"id":15,"name":"Impedit ut aspernatur praesentium delectus.","type":"i","value":"82.53","images":[{"id":15,"idprod":15,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/15\/bNIxHgBvtP0KSNWP08kdrte1PFxOVjbtRFWanE2e.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/15","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/15\/bNIxHgBvtP0KSNWP08kdrte1PFxOVjbtRFWanE2e.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/15"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/15"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/15"}}},{"id":16,"name":"Asperiores numquam quisquam.","type":"x","value":"68.52","images":[{"id":16,"idprod":16,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/16\/IJmgVTfELCZQbFfkM8vrVbLlM5t80pRBzCnOFZTW.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/16","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/16\/IJmgVTfELCZQbFfkM8vrVbLlM5t80pRBzCnOFZTW.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/16"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/16"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/16"}}},{"id":17,"name":"Enim fuga et sapiente quisquam.","type":"m","value":"54.07","images":[{"id":17,"idprod":17,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/17\/ySTS1ka21ibxmVMVcAUmVlE2LE5wfC5UDYcaLTo4.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/17","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/17\/ySTS1ka21ibxmVMVcAUmVlE2LE5wfC5UDYcaLTo4.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/17"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/17"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/17"}}},{"id":18,"name":"Natus eius sunt soluta.","type":"e","value":"79.71","images":[{"id":18,"idprod":18,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/18\/7ydyCx5cyqbw58LYjaJOOPDf0CokYdZXv1rNNfbo.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/18","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/18\/7ydyCx5cyqbw58LYjaJOOPDf0CokYdZXv1rNNfbo.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/18"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/18"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/18"}}},{"id":19,"name":"Vel dolores eligendi iure.","type":"k","value":"58.31","images":[{"id":19,"idprod":19,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/19\/8i9POhKCpYfok4F3GJxYC6ap3jyObCEGdW86a2K1.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/19","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/19\/8i9POhKCpYfok4F3GJxYC6ap3jyObCEGdW86a2K1.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/19"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/19"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/19"}}},{"id":20,"name":"Numquam sit quasi.","type":"q","value":"81.79","images":[{"id":20,"idprod":20,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/20\/byVYvDVFDkpa74os0vtqCxL4zSbPx0jW0U19JfsP.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/20","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/20\/byVYvDVFDkpa74os0vtqCxL4zSbPx0jW0U19JfsP.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/20"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/20"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/20"}}}],"code":200}
```

**_Status Code:_** 200

<br>

##### II. Example Request: Token is Invalid, Token is Expired, Authorization Token not found

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

##### II. Example Response: Token is Invalid, Token is Expired, Authorization Token not found

```js
{"type":"error","code":401,"massage":"Token is Invalid"}
```

**_Status Code:_** 401

<br>

##### III. Example Request: Erros semânticos do código

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

##### III. Example Response: Erros semânticos do código

```js
{"type":"error","message":"Error","code":422,"data":{"errors":"syntax error, unexpected 'if' (T_IF)"}}
```

**_Status Code:_** 422

<br>

### 3. Cadastrar um produto

Cadastrar um produto com foto ou não, se tudo estiver certo apresenta as informações do produto

**_Endpoint:_**

```bash
Method: POST
Type: FORMDATA
URL: https://apiteste.grupodouglascosta.com.br/api/products/add
```

**_Headers:_**

| Key          | Value               | Description |
| ------------ | ------------------- | ----------- |
| Content-Type | multipart/form-data |             |
| Accept       | application/json    |             |

**_Body:_**

| Key      | Value   | Description |
| -------- | ------- | ----------- |
| name     | est     |             |
| type     | maiores |             |
| value    | 655019  |             |
| images[] |         |             |

**_More example Requests/Responses:_**

##### I. Example Request: (result)

**_Headers:_**

| Key          | Value               | Description |
| ------------ | ------------------- | ----------- |
| Content-Type | multipart/form-data |             |
| Accept       | application/json    |             |

**_Body:_**

| Key      | Value   | Description |
| -------- | ------- | ----------- |
| name     | est     |             |
| type     | maiores |             |
| value    | 655019  |             |
| images[] |         |             |

##### I. Example Response: (result)

```js
{"message":"Produto cadastrado!","type":"success","data":{"id":21,"name":"alias","type":"labore","value":"12.99","images":[{"id":21,"idprod":21,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/21\/bRSSyIgMMslOWxauMJzqzvxRcaHI0bNDivy7Nnrp.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/21","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/21\/bRSSyIgMMslOWxauMJzqzvxRcaHI0bNDivy7Nnrp.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/21"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/21"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/21"}}},"code":201}
```

**_Status Code:_** 201

<br>

##### II. Example Request: Token is Invalid, Token is Expired, Authorization Token not found

**_Headers:_**

| Key          | Value               | Description |
| ------------ | ------------------- | ----------- |
| Content-Type | multipart/form-data |             |
| Accept       | application/json    |             |

**_Body:_**

| Key      | Value   | Description |
| -------- | ------- | ----------- |
| name     | est     |             |
| type     | maiores |             |
| value    | 655019  |             |
| images[] |         |             |

##### II. Example Response: Token is Invalid, Token is Expired, Authorization Token not found

```js
{"type":"error","code":401,"massage":"Token is Invalid"}
```

**_Status Code:_** 401

<br>

##### III. Example Request: Erros semânticos do código

**_Headers:_**

| Key          | Value               | Description |
| ------------ | ------------------- | ----------- |
| Content-Type | multipart/form-data |             |
| Accept       | application/json    |             |

**_Body:_**

| Key      | Value   | Description |
| -------- | ------- | ----------- |
| name     | est     |             |
| type     | maiores |             |
| value    | 655019  |             |
| images[] |         |             |

##### III. Example Response: Erros semânticos do código

```js
{"type":"error","message":"Error","code":422,"data":{"errors":"syntax error, unexpected 'if' (T_IF)"}}
```

**_Status Code:_** 422

<br>

### 4. Deletar produto

Deletar um produto especificado

**_Endpoint:_**

```bash
Method: DELETE
Type:
URL: https://apiteste.grupodouglascosta.com.br/api/products/delete/:product
```

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_URL variables:_**

| Key     | Value | Description     |
| ------- | ----- | --------------- |
| product | 9     | O ID do produto |

**_More example Requests/Responses:_**

##### I. Example Request: (result)

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key     | Value | Description     |
| ------- | ----- | --------------- |
| product | 9     | O ID do produto |

##### I. Example Response: (result)

```js
{"message":"Produto deletado!","type":"success","data":[],"code":200}
```

**_Status Code:_** 200

<br>

##### II. Example Request: Token is Invalid, Token is Expired, Authorization Token not found

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key     | Value | Description     |
| ------- | ----- | --------------- |
| product | 9     | O ID do produto |

##### II. Example Response: Token is Invalid, Token is Expired, Authorization Token not found

```js
{"type":"error","code":401,"massage":"Token is Invalid"}
```

**_Status Code:_** 401

<br>

##### III. Example Request: Erros semânticos do código

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key     | Value | Description     |
| ------- | ----- | --------------- |
| product | 9     | O ID do produto |

##### III. Example Response: Erros semânticos do código

```js
{"type":"error","message":"Error","code":422,"data":{"errors":"syntax error, unexpected 'if' (T_IF)"}}
```

**_Status Code:_** 422

<br>

### 5. Editar produto

Editar um produto especificado, se tudo estiver certo apresenta as informações do produto

**_Endpoint:_**

```bash
Method: PUT
Type: RAW
URL: https://apiteste.grupodouglascosta.com.br/api/products/edit/:product
```

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_URL variables:_**

| Key     | Value | Description     |
| ------- | ----- | --------------- |
| product | 4     | O ID do produto |

**_Body:_**

```js
{"name":"illo","type":"ea","value":81835.1799999999930150806903839111328125}
```

**_More example Requests/Responses:_**

##### I. Example Request: (result)

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key     | Value | Description     |
| ------- | ----- | --------------- |
| product | 4     | O ID do produto |

**_Body:_**

```js
{"name":"illo","type":"ea","value":81835.1799999999930150806903839111328125}
```

##### I. Example Response: (result)

```js
{"message":"Produto alterado!","type":"success","data":{"id":14,"name":"quis","type":"quia","value":"25.42","images":[{"id":14,"idprod":14,"path":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/14\/cnPL8ov4PXnfR4USjnA0ga81kYORIcF8S80eRLoC.jpg","created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/14","img":"https:\/\/apiteste.grupodouglascosta.com.br\/storage\/products\/imgs\/14\/cnPL8ov4PXnfR4USjnA0ga81kYORIcF8S80eRLoC.jpg"},"post":"","delete":""}}],"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getProducts":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/list","getProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/view\/14"},"post":{"addProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/add"},"put":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/edit\/14"},"delete":{"editProduct":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/products\/delete\/14"}}},"code":200}
```

**_Status Code:_** 200

<br>

##### II. Example Request: Token is Invalid, Token is Expired, Authorization Token not found

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key     | Value | Description     |
| ------- | ----- | --------------- |
| product | 4     | O ID do produto |

**_Body:_**

```js
{"name":"illo","type":"ea","value":81835.1799999999930150806903839111328125}
```

##### II. Example Response: Token is Invalid, Token is Expired, Authorization Token not found

```js
{"type":"error","code":401,"massage":"Token is Invalid"}
```

**_Status Code:_** 401

<br>

##### III. Example Request: Erros semânticos do código

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Query:_**

| Key     | Value | Description     |
| ------- | ----- | --------------- |
| product | 4     | O ID do produto |

**_Body:_**

```js
{"name":"illo","type":"ea","value":81835.1799999999930150806903839111328125}
```

##### III. Example Response: Erros semânticos do código

```js
{"type":"error","message":"Error","code":422,"data":{"errors":"syntax error, unexpected 'if' (T_IF)"}}
```

**_Status Code:_** 422

<br>

## Usuários

### 1. Buscar todos os usuários

Apresenta uma lista de todos os usuários com as informações

**_Endpoint:_**

```bash
Method: GET
Type:
URL: https://apiteste.grupodouglascosta.com.br/api/users
```

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_More example Requests/Responses:_**

##### I. Example Request: (result)

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

##### I. Example Response: (result)

```js
{"message":"Usu\u00e1rios encontrado!","type":"success","data":[{"id":1,"name":"Dr. Julieta Queir\u00f3s Cervantes Jr.","email":"danielfalcao.df@gmail.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},{"id":2,"name":"Sra. Antonella Jimenes Maldonado Filho","email":"crios@yahoo.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},{"id":3,"name":"Cristina Ayla Uchoa Sobrinho","email":"davi66@uol.com.br","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},{"id":4,"name":"Aparecida Salgado","email":"azambrano@hotmail.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},{"id":5,"name":"Dr. J\u00e1como \u00cdtalo Prado Jr.","email":"lroque@ig.com.br","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},{"id":6,"name":"Dr. Roberta Flor Amaral","email":"thalia.dasilva@oliveira.com.br","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},{"id":7,"name":"Elisa Rocha Esteves","email":"roberto64@hotmail.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},{"id":8,"name":"Dr. Augusto da Silva Amaral","email":"tiago08@terra.com.br","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},{"id":9,"name":"Dr. Renato Fontes","email":"yromero@ferreira.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},{"id":10,"name":"Sr. Ziraldo Duarte Vega Neto","email":"ufidalgo@terra.com.br","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},{"id":11,"name":"Thiago Medina","email":"pereira.beatriz@sanches.com.br","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},{"id":12,"name":"Sra. Louise Alves","email":"wcaldeira@terra.com.br","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},{"id":13,"name":"Sr. Enzo Aguiar","email":"franco04@yahoo.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},{"id":14,"name":"Mauro Mar\u00e9s Montenegro","email":"hugo70@escobar.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},{"id":15,"name":"Kauan \u00c1vila D'\u00e1vila","email":"lilian.cruz@serrano.org","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},{"id":16,"name":"Laura Mar\u00edlia Guerra","email":"laura.queiros@yahoo.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},{"id":17,"name":"Dr. Jo\u00e3o Fidalgo Matos","email":"escobar.violeta@uol.com.br","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},{"id":18,"name":"Sim\u00e3o Lira Soto Filho","email":"pamela.santos@gmail.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},{"id":19,"name":"Sr. Jo\u00e3o Robson Romero Neto","email":"elisa97@terra.com.br","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},{"id":20,"name":"Cauan Bittencourt Gon\u00e7alves","email":"sergio36@terra.com.br","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},{"id":21,"name":"Raquel Lutero","email":"ovalencia@barreto.net.br","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},{"id":22,"name":"teste","email":"teste@teste.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}}],"code":200}
```

**_Status Code:_** 200

<br>

##### II. Example Request: Token is Invalid, Token is Expired, Authorization Token not found

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

##### II. Example Response: Token is Invalid, Token is Expired, Authorization Token not found

```js
{"type":"error","code":401,"massage":"Token is Invalid"}
```

**_Status Code:_** 401

<br>

##### III. Example Request: Erros semânticos do código

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

##### III. Example Response: Erros semânticos do código

```js
{"type":"error","message":"Error","code":422,"data":{"errors":"syntax error, unexpected 'if' (T_IF)"}}
```

**_Status Code:_** 422

<br>

### 2. Buscar usuário JWT

Apresenta as informações do usuário logado que foi passado com JWT

**_Endpoint:_**

```bash
Method: GET
Type:
URL: https://apiteste.grupodouglascosta.com.br/api/users/me
```

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_More example Requests/Responses:_**

##### I. Example Request: (result)

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

##### I. Example Response: (result)

```js
{"message":"Usu\u00e1rio encontrado!","type":"success","data":{"id":1,"name":"Dr. Julieta Queir\u00f3s Cervantes Jr.","email":"danielfalcao.df@gmail.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"code":200}
```

**_Status Code:_** 200

<br>

##### II. Example Request: Token is Invalid, Token is Expired, Authorization Token not found

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

##### II. Example Response: Token is Invalid, Token is Expired, Authorization Token not found

```js
{"type":"error","code":401,"massage":"Token is Invalid"}
```

**_Status Code:_** 401

<br>

##### III. Example Request: Erros semânticos do código

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

##### III. Example Response: Erros semânticos do código

```js
{"type":"error","message":"Error","code":422,"data":{"errors":"syntax error, unexpected 'if' (T_IF)"}}
```

**_Status Code:_** 422

<br>

### 3. Editar usuário JWT

Alterar dados do usuário logado que foi passado com JWT, se tudo estiver certo apresenta as informações do usuário

**_Endpoint:_**

```bash
Method: PUT
Type: RAW
URL: https://apiteste.grupodouglascosta.com.br/api/users/me/edit
```

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Body:_**

```js
{"name":"qui","email":"vero"}
```

**_More example Requests/Responses:_**

##### I. Example Request: (result)

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Body:_**

```js
{"name":"qui","email":"vero"}
```

##### I. Example Response: (result)

```js
{"message":"Usu\u00e1rio alterado!","type":"success","data":{"id":1,"name":"dolore","email":"magi@teste.com","email_verified_at":null,"created_at":"08\/09\/2021","updated_at":"08\/09\/2021","link":{"get":{"getListAll":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users","getMe":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me"},"post":{"login":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/login","register":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/register","logout":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/auth\/logout"},"put":{"editNameEmail":"https:\/\/apiteste.grupodouglascosta.com.br\/api\/users\/me\/edit"}}},"code":200}
```

**_Status Code:_** 200

<br>

##### II. Example Request: Token is Invalid, Token is Expired, Authorization Token not found

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Body:_**

```js
{"name":"qui","email":"vero"}
```

##### II. Example Response: Token is Invalid, Token is Expired, Authorization Token not found

```js
{"type":"error","code":401,"massage":"Token is Invalid"}
```

**_Status Code:_** 401

<br>

##### III. Example Request: Erros semânticos do código

**_Headers:_**

| Key          | Value            | Description |
| ------------ | ---------------- | ----------- |
| Content-Type | application/json |             |
| Accept       | application/json |             |

**_Body:_**

```js
{"name":"qui","email":"vero"}
```

##### III. Example Response: Erros semânticos do código

```js
{"type":"error","message":"Error","code":422,"data":{"errors":"syntax error, unexpected 'if' (T_IF)"}}
```

**_Status Code:_** 422

<br>

**_Available Variables:_**

| Key     | Value                             | Type   |
| ------- | --------------------------------- | ------ |
| baseUrl | apiteste.grupodouglascosta.com.br | string |

---

[Back to top](#ecommerceapi-copy)

> Made with &#9829; by [thedevsaddam](https://github.com/thedevsaddam) | Generated at: 2021-09-08 15:19:36 by [docgen](https://github.com/thedevsaddam/docgen)
