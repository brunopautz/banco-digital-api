## Sobre o Sistema

Api do banco digital construida em PHP/Laravel, utilizando um banco de dados relacional.

### Requesitos

Essas foram as tecnologias utilizadas para construção da API.

- PHP v8.2.0
- Composer 2.5.1   
- 10.4.27-MariaDB  
- Node v16.10.0


## Inicialização do Projeto

Após clonar os arquivos em seu computador, configure o arquivo .env, definindo um banco de dados e usuario e senha para que Laravel tenha acesso.

Em seguida execute o seguinte comando para rodar as migrations e popular o banco de dados dentro da pasta do projeto:

```bash
# install migrations
php artisan migrate:fresh --seed

# serve running http://127.0.0.1:8000
php artisan serve

```