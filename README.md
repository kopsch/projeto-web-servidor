# Instruções de Instalação do Projeto Web-Servidor

## Pré-requisitos
### Antes de começar a instalação, certifique-se de que você tem os seguintes pré-requisitos instalados em seu computador:

- XAMPP (versão 7.2.0 ou superior)
- Composer (versão 2.0 ou superior)

## Instalando o XAMPP
### Se você ainda não tem o XAMPP instalado, siga as instruções abaixo:

1. Acesse o site do XAMPP em https://www.apachefriends.org/pt_br/index.html.
2. Clique no botão "Baixar" correspondente à versão do XAMPP para o seu sistema operacional.
3. Execute o arquivo de instalação e siga as instruções na tela para concluir a instalação.

## Instalando o Projeto Web-Servidor
### Siga as instruções abaixo para instalar o projeto:

1. Faça o download do projeto Web-Servidor e extraia o arquivo zip para o diretório raiz do XAMPP.
2. Renomeie a pasta extraída para "projeto-web-servidor".
3. Abra um terminal ou prompt de comando e navegue até a pasta do projeto: cd /caminho/do/projeto-web-servidor.
4. Execute o comando composer install para instalar as dependências do projeto.
5. Inicie o servidor com o comando php -S localhost:8005 -t public.
6. Inicie o MySQL também no painel de controle do XAMPP.
7. Crie um arquivo .env no diretório projeto-web-servidor.
8. Popule o arquivo .env baseado no .env.exemple com as devidas informações de conexão do banco.
9. Instale a biblioteca phinx via composer com o seguinte comando: php composer.phar require robmorgan/phinx
8. Faça as devidas migrations com o comando phinx migrate ou ./vendor/bin/phinx migrate
6. Abra seu navegador e acesse "http://localhost/projeto-web-servidor".

### Pronto! Agora você pode começar a usar o projeto Web-Servidor.