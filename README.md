## Sobre o Sistema

Api do banco digital construida em PHP/Laravel, utilizando um banco de dados relacional.

### Requesitos

Essas foram as tecnologias utilizadas para construção da API.

- PHP v8.1.0+
- Composer 2.5.1   
- 10.4.27-MariaDB  
- Node v16.10.0


## Inicialização do Projeto
```bash
# clone repositorio
git clone https://github.com/brunopautz/banco-digital-api.git

# acesse a pasta onde estao os arquivos do projeto

# instale as dependências do projeto Laravel
composer install

# configura o arquivo .env com as credencias de acesso ao banco de dados

# rode as migrations com os seed para construir as tabelas do banco de dados e popular com dados
php artisan migrate:fresh --seed

#  gerar key do app
php artisan key:generate

# Rode o servidor: http://127.0.0.1:8000
php artisan serve
```

## Teste sistemas

Foi criado um sistema web para simular acesso a api, lá é possivel ver saldo, sacar e depositar, o diretorio do projeto esta em [https://github.com/brunopautz/banco-digital-web].

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