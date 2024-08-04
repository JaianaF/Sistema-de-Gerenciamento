# FIAP Management Application

## Requisitos

- PHP >= 7.4
- MySQL
- Composer

## Instalação

1. Clone o repositório:
git clone https://github.com/JaianaF/Sistema-de-Gerenciamento.git


2. Navegue até o diretório do projeto:

3. Instale as dependências do Composer:
    composer install
    composer update
    composer dump-autoload

4. Crie o banco de dados e as tabelas executando o script `dump.sql` no MySQL:
    - mysql -u root -p

5. Configure a conexão com o banco de dados no arquivo `src/utils/Database.php`.

6. Inicie o servidor embutido do PHP:
    - php -S localhost:8000 -t public

7. Acesse a aplicação no navegador:
    - http://localhost:8000


## Funcionalidades

- Cadastro, edição, exclusão e listagem de alunos e turmas
- Paginação na listagem de turmas
- Cadastro de matrículas
- Visualização de alunos matriculados em uma turma
- Autenticação de usuários (em desenvolvimento)

## Regras de Negócio

- As listagens são ordenadas alfabeticamente
- Nome do aluno e da turma devem ter no mínimo 3 caracteres
- Todos os campos são obrigatórios
- Um aluno não pode ser matriculado duas vezes na mesma turma
