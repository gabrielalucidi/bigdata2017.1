# bigdata 2017.1

## Como iniciar a aplicação:

1. Instalar o [XAMPP](https://www.apachefriends.org/index.html) em um ambiente Linux.
2. Após instalado e inicializado, é necessário clonar o repositório do [GitHub](https://github.com/gabrielalucidi/bigdata2017.1), renomear a pasta principal para *bigdata* e colocá-la na pasta *htdocs* do XAMPP (por exemplo, /opt/lampp/htdocs).
3. É preciso dar permissão de leitura e escrita para a pasta *json* e todas as pastas subsequentes através do comando *chmod 777 -R*. 
4. Para tornar a busca de eventos e o processamento do Spark automáticos, é necessário executar um cron job, que consiste em usar o comando *crontab -e* para iniciá-lo e _0 5 * * * php /opt/lampp/htdocs/bigdata/php/spark-warehouse/cron.php_ para rodar todo dia às 5 da manhã, ou _*/10 * * * * php /opt/lampp/htdocs/bigdata/php/spark-warehouse/cron.php_, para rodar a cada dez minutos.
5. Feito tudo isso, resta apenas acessar a página que está em servidor local através do navegador (localhost/bigdata/index.php).
-- -- --
##### **Esta aplicação foi desenvolvida como trabalho final da disciplina de Big Data por alunos de Engenharia de Controle e Automação da UFRJ no primeiro período de 2017.**

+ **Gabriel Pelielo**
+ **Gabriel Premoli**
+ **Gabriela Lúcidi**
+ **Jean Américo**