# Projeto API REST

O projeto foi desenvolvido em PHP 7.4, utilizando o framework Laravel 8, Composer e banco de dados MySql (Maria DB).

# Para rodar o projeto:

1. faça o download do código fonte ou clone esse repositório https://github.com/bbroger1/api_rede_magic.git;
2. crie a database api_rede_magic em seu banco de dados;
3. na pasta do projeto, efetue o comando *Composer update* para que as dependências sejam atualizadas;
4. gere a chave do sistema como o comando *php artisan key:generate* (caso não tenha sido gerada automaticamente);
5. altere as configurações do banco de dados no arquivo .env;
6. crie a tabela no banco de dados rodando o comando *php artisan migrate*;
7. rode o comando php artisan serve e acesse o endereço fornecido pelo sistema;

# Endpoints da API

Você pode acessar os endpoints da API por meio do comando *php artisan route:list*

| Método         | URI                            | Ação
|----------------|--------------------------------|-----------------------------------------------------------------|
| GET            | api/movie                      | Lista todos os filmes cadastrados na API
| GET            | api/movie/{movie}              | Lista o filme pelo ID
| GET            | api/movie/details/{details}    | Pesquisa partes do nome do filme, atores, diretor e classificação
| POST           | api/movie                      | Cadastra os filmes na API
| PUT/PATCH      | api/movie/{movie}              | Permite editar os dados do filme pelo ID
| DELETE         | api/movie/{movie}              | Exclui o filme da base de dados a partir do ID

Os endpoints poderão ser testados no POSTMAN seguindo essa documentação:
https://www.getpostman.com/collections/31bfaa089ca2619a4182

# Passo a Passo para desenvolvimento da API

1. criação do projeto dentro da pasta Xampp - *composer create-project --prefer-dist laravel/laravel api_rede_magic*;
2. criação do database no banco de dados Mysql;
3. criação da rota principal da API por meio do comando *Route::apiResource('movie', 'Api\MoviesController')*;
Resource utilizado para poupar tempo no desenvolvimento, tendo em vista que com esse comando o controller criado já possui todos os métodos Restfull declarados.
Adicionalmente foi desenvolvida a rota api/movie/details/{details} que permite ao usuário pesquisar os filmes por partes do nome do filme, do nome dos atores, do diretor ou pela classificação do filme.
4. criação da MODEL Movie - *php artisan make:model Movie* e feito a inclusão dos campos da tabela;
5. criação da migration, inclusão dos campos da tabela - *php artisan make:migration create_movies*;
6. criação da tabela no banco de dados *php artisan migrate*.

# Validações

Foram incluídas validaçõs no controller tais como: 
1. no cadastramento do filme 
    - se todos os campos foram preenchidos e tem o tamanho e tipo esperado;
    - se o filme já existe no banco de dados;
2. na pesquisa do filme pelo ID
    - verifica se o filme existe e, caso contrário, apresenta mensagem
