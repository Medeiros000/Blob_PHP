
# Blog-PHP

Um Blog usando a linguagem PHP de um site fictício
sobre PHP.


## Tela do Blog-PHP

![Screenshot](https://raw.githubusercontent.com/Medeiros000/Medeiros000/a382f95afb70a0d629aa888c3f084abb6eb94a51/imagens/exemplo.png)
## Linguagem

[PHP 8.3](https://www.php.net/releases/8.3/en.php) - Linguagem de script open source de uso geral.


## Dependências
[Composer](https://getcomposer.org/) - Gerenciador de dependencias.

[Docker](https://www.docker.com/) - Gerenciador de dependencias.

## Dependências Extras
[a2enmod](https://www.digitalocean.com/community/tutorials/how-to-rewrite-urls-with-mod_rewrite-for-apache-on-ubuntu-20-04) - Regras de reescrita para o Apache.

[Twig](https://twig.symfony.com/doc/3.x/installation.html) - Mecanismo de modelo moderno para PHP.

[pecee/simple-router](https://packagist.org/packages/pecee/simple-router) - Roteador PHP simples e rápido.

[Bootstrap](https://getbootstrap.com/) - Frontend toolkit.

[MySQL PDO](https://www.mysql.com/) - Extensão para banco de dados MySQL.

## Deploy

Para fazer o deploy desse projeto rode dentro da pasta 'htdocs' de um servidor Apache ou utilize a imagem docker

###### Comando para criar a imagem com o DB Blog necessário.
```bash
  docker build --pull --rm -f "dockerfile" -t blog:latest "." 
```
###### Comando para rodar a imagem criada anteriormente.
```bash
  docker run --rm -d -p 80:80/tcp blog:latest 
```

## DB MySQL

- [MySQL](https://www.mysql.com/) - Dentro da raiz do projeto encontra-se uma pasta "mysql-docker" para montar a imagem do DB necessário além do arquivo "blog.sql" com os comandos necessários para "povoar" o DB.

##### Deve-se alterar esta linha dentro do arquivo de configurações caso você use um MySQL diferente da imagem contida no projeto.
```bash
  // Senha do DB
  define('DB_PSSWRD', '');
```

## Autores

- [@Medeiros000](https://github.com/Medeiros000)


## Referência

 - [UnSet - Tecnologia em  Sistemas](https://www.unset.com.br/)
 - [Awesome README](https://github.com/matiassingers/awesome-readme)
