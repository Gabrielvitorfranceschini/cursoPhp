## cursoPhp


## Comando para listar arquivos e diretorios 
ls -l 


## Comando para dar permissão na pasta (.) refesece ao diretorio atual onde eu estou 
sudo chmod 777 -R  .


## Comando para mudar propetario da pasta e arquivos (usario) refese ao meu usario por exemplo gabriel (.) refesece ao diretorio atual onde eu estou 
chown usario:usario -R .


## Comando para baixar meu projeto (LINK DO GITUB)
git clone LINK


## Comando para adicionar ao commit os arquivos que foram modificados (.) refesece ao diretorio atual onde eu estou
git add .

## Comando para adicionar uma mensagem ao commit, exemplo "cursoPhp"
git commit -m "


## Comando para para mandar os arquivos par o git hub
git push 

## Comando para ver se o apache esta rodando
sudo service apache2 status
exemplo: se nao estiver funcinado-* apache2 is not running


## Comando para ativar o apache
sudo service apache2 start

## Comando para ativar o localhost 
php -S localhost:8080 -t public/


## Entrar no mariaDB pelo vs code 
sudo mysql -u root -p
sudo service apache2 start
-Starting Apache httpd web server apache2

Para sair ctrl c


## comando para parar o apache
sudo service apache2 stop
- * Stopping Apache httpd web server apache2 


## comando para ver se o mysql esta funcionando 
sudo service mysql status
* MariaDB is stopped.

## comando para ativar o mysql
 sudo service mysql start
 -* Starting MariaDB database server mysqld
 
 
 ## comando para parar o mysql
 sudo service mysql stop
 -* Stopping MariaDB database server mysqld   

## Para criar usuario maria db
CREATE USER 'user1'@localhost IDENTIFIED BY 'password1';

## Para dar todos os privilegios 
GRANT ALL PRIVILEGES ON *.* TO 'user1'@localhost IDENTIFIED BY 'password1';

