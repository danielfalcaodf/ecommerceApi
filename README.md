<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<h3 align="center">danielfalcaodf/ecommerceApi</h3>

<div align="center">

[![Status](https://img.shields.io/badge/status-active-success.svg)]()

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
-   [Deployment](#deployment)
-   [Uso](#usage)
-   [Built usando](#built_using)
    <!-- - [TODO](../TODO.md) -->
    <!-- - [Contributing](../CONTRIBUTING.md) -->
    <!-- - [Authors](#authors) -->
    <!-- - [Acknowledgments](#acknowledgement) -->

## 🧐 Sobre <a name = "about"></a>

API RESTFul para o gerenciamento de pedidos de um E-commerce utilizando o framework Laravel, contêm os módulos Comprador, Produto, Checkout, Auth e Usuário

## 🏁 Começando <a name = "getting_started"></a>

Essas instruções fornecerão uma cópia do projeto instalado e funcionando em sua máquina local para fins de desenvolvimento e teste. Consulte [Deployment](#deployment) para obter notas sobre como implantar o projeto em um sistema ativo.

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

-   Logo após de configurar o `.env`, Abir o CMD na raiz do projeto , execultar comando `php artisan migrate:fresh --seed` com isso as Migrations e Seeds do projeto vai alimentar o banco de dados

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

## :memo: Teste Uniários <a name="test"></a>

Os testes da api foi feito em uma hospedagem propria [E-commerce Api](https://apiteste.grupodouglascosta.com.br "Api docs"),
Api já tem documentação em [Api Docs](https://apiteste.grupodouglascosta.com.br/docs "Api docs")

```
baseUrl = https://apiteste.grupodouglascosta.com.br
```

-   Rotas

    ![img-router](https://github.com/danielfalcaodf/ecommerceApi/blob/master/public/demos/testes/img-route.png?raw=true)
