<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

Bem vindo ao Desafio Proby! A plataforma de gerenciamento de projetos solicitada como desafio pra uma vaga de dev na Startup ProbY!

Pra poder rodar o projeto na sua máquina, siga os seguintes passos:

## PHP

Lembre-se de ter instalado na sua máquina o PHP 8.3 ou uma versão maior. Mas de preferência, o php 8.3.16

## DATABASE

Certifique-se de possuir no seu computador o banco de dados MySQL (da 8 em diante) e faça o seguinte:

Digite no terminal: mysql -u seu_usuario -p sua_senha

Estando dentro do banco de dados, crie uma database:

CREATE DATABASE desafio_proby;

Se tudo der certo, digite \q pra sair e prossiga.

## Clone

Rode o seguinte comando no terminal caso use o git normal: git clone https://github.com/Luis-edubr/desafio-proby.git

Caso prefira usar o GitHub CLI, basta rodar: gh repo clone Luis-edubr/desafio-proby

## .ENV

Dentro do repositório do projeto, rode o comando: cp .env.example .env

Depois rode: php artisan key:generate

Tendo feito isso, acesse o arquivo .env e coloque suas credenciais de banco de dados locais nesse bloco:


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sua_db (que acabou de criar 2 passos atrás)
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

## Instalando e fazendo build das dependências 

Já tendo feito o download do repositório na sua máquina, navegue até ele (por ex: cd desafio-proby/)

E rode os seguintes comandos no terminal:

npm install
composer install
npm run build
php artisan migrate:fresh
php artisan db:seed

## Feito isso, basta fazer somente mais 1 mudança

Afim de não precisar criar uma classe que gerenciasse o e-mail e manter a simplicidade e o layout padrão de emails do laravel,
achei por melhor traduzir os textos de email do laravel de maneira manual. Alguns deles já estão dentro do seu repositório,
mas outros você vai precisar modificar da seguinte maneira:

Acesse dentro do projeto a pasta vendor (não a que fica dentro de resources/views, mas a que está na raiz do projeto) e navegue
pra dentro de laravel/framework/src/Illuminate/Auth/Notifications e acesse o arquivo ResetPassword.php.

Feito isso, basta colar o seguinte código dentro do método buildMailMessage:

        return (new MailMessage)
            ->subject(Lang::get('Notificação de Redefinição de Senha'))
            ->line(Lang::get('Você está recebendo este e-mail porque recebemos uma solicitação de redefinição de senha para sua conta.'))
            ->action(Lang::get('Redefinir Senha'), $url)
            ->line(Lang::get('Este link de redefinição de senha expirará em :count minutos.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
            ->line(Lang::get('Se você não solicitou uma redefinição de senha, nenhuma ação adicional é necessária.'));

Dessa forma, o email de recuperação de senha estará todo em pt-BR. O outro arquivo (VerifyEmail.php) pode deixar como está, pois não vai ser relevante pra essa aplicação.

## Último comando

Utilize o terminal pra rodar os seguintes comandos:

chmod -R 775 storage
chmod -R 775 bootstrap/cache

Faça isso pra que a aplicação possa gerenciar com eficácia o upload e delete de arquivos.

Agora basta fazer bom uso da plataforma!

