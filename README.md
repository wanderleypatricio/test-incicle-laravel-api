# test-incicle-laravel-api

Esse projeto consiste em duas apis, uma para cadastro de estados e cidades e outra api para cadastro de pessoas.

**O que é necessário**
Para testar esse projeto é necessário que seu computador tenho instalado o composer, banco de dados mysql, PHP e postman.

**Passos para testar a aplicação**

Passo 1 - a primeira coisa a ser feita é baixar o projeto para seu computador ou fazer um clone do repositório.

Passo 2 - com o projeto na sua máquina já descompactado acesse a pasta de projeto pelo prompt de comando na pasta da api-cities e execute o comando: composer install.
Esse comando vai fazer a instalação de todas as dependências necessárias para rodar a api. Faça o mesmo com a api-person.

Passo 3 - agora precisamos criar o banco de dados para isso podemos usar o arquivo banco.sql ou executar as migrations de cada api. Para criar as tabelas usando as migrations é necessário criar o banco de dados chamado incicle, depois pelo cmd execute o comando em cada api: php artisan migrate. Com isso teremos as tabelas criadas.

Passo 4 - Para testar cada api basta acessar a pasta da api-cities por exemplo e digitar o comando: php artisan serve, isso executará o projeto na porta 8000 por padrão. Para testar a api-person temos que executá-la em outra porta, como por exemplo a 9000, para isso digite o comando: php artisan serve --port=9000.

Passo 5 - com as apis sendo executadas abra o postman para realizar os teste para isso vamos usar as seguintes rotas.

**rotas da api-cities**

GET - http://localhost:8000/api/city -> retorna todos os registros

GET - http://localhost:8000/api/city/{id} -> retorna um registro especifico

DEL - http://localhost:8000/api/city/{id} -> deleta um registro

POST - http://localhost:8000/api/city -> cadastra um novo registro

PUT - http://localhost:8000/api/city/{id} -> altera um registro

GET - http://localhost:8000/api/search/city?name={nome-da-cidade} -> retorna se uma cidade existe no banco

obs: para fazer cadastro ou alterar um registro os dados tem que ser enviados no formato json.

ex.: 

{

  "state_id":"id-do-estado",
  
  "city":"nome-da-cidade"
  
}


GET - http://localhost:8000/api/state -> retorna todos os registros

GET - http://localhost:8000/api/state/{id} -> retorna um registro especifico

DEL - http://localhost:8000/api/state/{id} -> deleta um registro

POST - http://localhost:8000/api/state -> cadastra um novo registro

PUT - http://localhost:8000/api/state/{id} -> altera um registro

obs: para fazer cadastro ou alterar um registro os dados tem que ser enviados no formato json.

ex.: 

{

  "uf":"sigla-do-estado",
  
  "name":"nome-do-estado"
  
}


**rotas da api-person**

GET - http://localhost:9000/api/person -> retorna todos os registros

GET - http://localhost:9000/api/person/{id} -> retorna um registro especifico

DEL - http://localhost:9000/api/person/{id} -> deleta um registro

POST - http://localhost:9000/api/person -> cadastra um novo registro

PUT - http://localhost:9000/api/person/{id} -> altera um registro

obs: para fazer cadastro ou alterar um registro os dados tem que ser enviados no formato json.

ex.: 

{

  "name":"nome-da-pessoa",
  
  "cpf":"cpf-da-pessoa",
  
  "state":"sigla-do-estado",
  
  "city":"nome-da-cidade"
  
}
