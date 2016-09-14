<?php

set('use_ssh2', false); 

$project_path = '/var/www/html/livraria_online';

//fcfiZLa#P7f/6XXx
server('producao', '191.101.9.10', 22)
	->user('root')
	->password('Nf(fv4{Ms75Av]b')
	->stage('producao')
    ->env('deploy_path', '/var/www/html/livraria_online');


task('update_git', function ($input) { 
	run("sudo git pull origin master"); 
})->desc('Atualiza os códigos no servidor');


 task('run', array( 
 	'update_git', 
 ))->option('branch', 'b', 'Escolha a branch para deploy', 'master') 
   ->desc('Deploy para servidor'); 