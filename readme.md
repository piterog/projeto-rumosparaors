# Projeto Rumos para o RS!

Sistema de contabilização de votos em propostas!

# Pré-Requisitos
- PHP 5.6+
- PostgresSql 9.6+
- Laravel 5.4
- Voyager 1.1

# Instalação

- Faça o clone do projeto;
- Edite o arquivo **.env.example** para **.env** e faça a configuração do banco de dados;
- Para gerar uma nova chave de identificação do projeto execute:
>php artisan key:generate
- Para download do Voyager e atualização das bibliotecas do projeto, execute:
>composer require tcg/voyager
- Abra o arquivo config/app.php e adicione ``TCG\Voyager\VoyagerServiceProvider::class,`` em **providers**;
- Execute o comando abaixo para instalar o Voyager:
> php artisan voyager:install
- Execute o comando abaixo para adicionar um usuário administrador:
>php artisan voyager:admin your@email.com --create
- Execute a seguir para iniciar sua aplicação em ``localhost:8000``
> php artisan serve