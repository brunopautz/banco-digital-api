## Sobre o Sistema

Api do banco digital construida em PHP/Laravel, utilizando um banco de dados relacional.

### Requesitos

Essas foram as tecnologias utilizadas para construção da API.

- PHP v8.2.0
- Composer 2.5.1   
- 10.4.27-MariaDB  
- Node v16.10.0


## Inicialização do Projeto

Clone os arquivos em seu computador, configure o arquivo .env, definindo um banco de dados e usuario e senha para que Laravel tenha acesso.

Em seguida execute o seguinte comando para rodar as migrations e popular o banco de dados dentro da pasta do projeto:

```bash
# clone repositorio
git clone https://github.com/brunopautz/banco-digital-api.git

# install migrations
php artisan migrate:fresh --seed

# serve running http://127.0.0.1:8000
php artisan serve

```

## Teste in Laravel

Após executar os comandos acima, o sistema deverá estar pronto para ser testado, os testes que serão realizados são:
- valid account: verifica se a conta existe
- return datas account: verifica se a conta existe e retorna informações da conta
- desposit account: deposita um valor na conta informada, valores devem ser > 0  
- saque account: saca o valor da conta mas verifica se valor informado nao é maior que o saldo e se saque é > 0

```bash
# executa os test
php artisan test
```