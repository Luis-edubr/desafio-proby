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

Não se esqueça que, pra funcionar o fluxo de email, será necessário alterar o arquivo .env com credenciais de SMTP pra envio de e-mail. 

## Último comando

Utilize o terminal pra rodar os seguintes comandos:

chmod -R 775 storage
chmod -R 775 bootstrap/cache

Faça isso pra que a aplicação possa gerenciar com eficácia o upload e delete de arquivos.

Agora basta fazer bom uso da plataforma!


#### EXPLICAÇÕES

## Descrição das funcionalidades e explicação de escolhas técnicas

Criei todas as funcionalidades solicitadas no docs que foi enviado.

A ferramenta gerencia o login dos usuários considerando um contexto onde não há níveis diferentes de acesso, ou seja,
todos os usuários podem usar todas as funcionalidades da plataforma sem restrição contanto que estejam devidamente autenticados.

Resolvi utilizar o Laravel Breeze pra gerenciar a autenticação pela possibilidade de alterar tudo que eu queira devido à minha experiência
e familiaridade com o framework e, especialmente, por ele já vir com cingurações adequadas pra gerenciar todo o processo de ponta a ponta
desde o login em si, até mesmo redefinição de senha com notificação por e-mail. Sendo assim, acelerando o desenvolvimento e trazendo uma 
considerável robustez na segurança.

Dentro da plataforma, utilizei o layout padrão do laravel, mas modificando todo o corpo do app; Sendo assim, logo de cara o usuário pode
ver todos os projetos que foram criados listando ordenadamente começando por projetos pendentes, dps em andamento, dps concluídos.

Cada projeto pode ser visualizado e editado individualmente e, no topo da tabela, tem um botão em que se pode criar um novo projeto.

Tudo isso é gerenciado através de um banco de dados mysql que, foi escolhido, não tanto pela familiaridade (apesar de também contar), mas
pela simplicidade da aplicação que não necessitava de nada complexo que fosse muito além de consultas CRUD e armazenamento de dados simples.
Sendo assim, foi possível com o mysql, unir praticidade, simplicidade e familiaridade dentro do projeto. Também poderia ter utilizado um banco
de dados noSQL dentro dessa ótica, mas como não tenho tanta praticidade e o Breeze oferece suporte padrão pro mySQL, penso ser a escolha mais adequada.

Pra realizar as consultas, utilizei o ORM padrão do laravel, ELOQUENT. Que adiciona uma camada a mais de proteção nas consultas sem que eu tenha que
me preocupar com problemas de segurança básicos que eu precisaria implementar soluções como pra SQL injection. Sendo assim, o ELOQUENT simplifica as 
consultas utilizando métodos, o que torna o código mais inteligível, limpo e seguro.

Também é possível realizar o envio e exclusão de documentos em que cada um deles é atrelado a um projeto específico usando relacionamento entre tabelas.

Pra gerenciar tudo isso, resolvi usar o storage do laravel, por apresentar menores riscos de segurança, pois o documento só se torna disponível pro usuário
no momento em que ele faz o download do mesmo. Dessa forma, o documento não precisa ser carregado pra os arquivos que servem o lado do cliente, estando disponíveis
somente no servidor. O usuário pode visualizar apenas o nome e extensão do documento e só pode fazer o download caso esteja logado.

O relacionamento entre tabelas também permite que ao excluir um projeto, todos os documentos relativos à ele também sejam excluidos tanto da db quanto do servidor, evitando
acúmulo de documentos inutilizados e levando a um gerenciamento ineficiente de memória (o que pra essa aplicação em pequena escala, não é tão relevante. Poŕem, é bom manter o padrão
pra saber como fazer pra manter a aplicação com uma fácil escalabilidade).

