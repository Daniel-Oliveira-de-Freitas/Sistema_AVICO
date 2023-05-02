# Sistema_Gestao_AVICO

## Requisitos para executar o projeto

- [Laravel](https://laravel.com/docs/9.x) >= 9.0 
- [PHP](https://www.php.net/downloads.php) >= 8.2
- [Composer](https://getcomposer.org/)
- Algum banco de dados relacional (Recomendo postgresql ou sqlite)

## Como executar

Após realizar o clone do projeto execute os seguintes comandos no terminal:


```
composer install
```

```
composer dump-autoload
````

```
cp .env.example .env
php artisan key:generate
```

Para rodar a aplicação utilize o comando abaixo:


> Atenção, caso o banco de dados não foi configurado pule para etapa abaixo antes de rodar esse comando.

```
php artisan serve
```

### Para configurar algum banco de dados no laravel, você deve modificar no arquivo .env como mostrado em alguns trechos abaixo

### Postgresql

```dotenv
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432 //porta pafrão do postgresql
DB_DATABASE=avico //nome do banco criado
DB_USERNAME=meu_usuario
DB_PASSWORD=minha_senha
```
### SQLite

No caso do SQLite o DB_DATABASE você deve indicar o caminho que deseja que o banco seja criado, senão ele irá criar na raiz do projeto.

```dotenv
DB_CONNECTION=sqlite
DB_DATABASE=../database/avico.sqlite
DB_FOREIGN_KEYS=true
```

Para mais informações sobre outros bancos consulte a documentação oficial https://laravel.com/docs/9.x/database
