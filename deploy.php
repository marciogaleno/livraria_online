<?php

require 'recipe/composer.php';

//fcfiZLa#P7f/6XXx
server('producao', '191.101.9.10', 22)
	->user('root')
	->password('Nf(fv4{Ms75Av]b')
	->stage('producao')
    ->env('deploy_path', '/var/www/html/livraria_online');

set('repository', 'https://github.com/marciovennan/livraria.git');

task('deploy:renomeacao_arquivos', function () {
    run("cd /var/www/html/livraria_online/current");
    run("v .htaccess.dist .htaccess");
    run("cd application/config && mv config.php.dist config.php");
    run("cd tests && mv bootstrap.php.dist bootstrap.php");

})->desc('Renomeando arquivos');