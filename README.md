# bigdata 2017.1

## Como iniciar a aplica��o:

1. Instalar o [XAMPP](https://www.apachefriends.org/index.html) em um ambiente Linux.
2. Ap�s instalado e inicializado, � necess�rio clonar o reposit�rio do [GitHub](https://github.com/gabrielalucidi/bigdata2017.1), renomear a pasta principal para *bigdata* e coloc�-la na pasta *htdocs* do XAMPP (por exemplo, /opt/lampp/htdocs).
3. � preciso dar permiss�o de leitura e escrita para a pasta *json* e todas as pastas subsequentes atrav�s do comando *chmod 777 -R*. 
4. Para tornar a busca de eventos e o processamento do Spark autom�ticos, � necess�rio executar um cron job, que consiste em usar o comando *crontab -e* para inici�-lo e _0 5 * * * php /opt/lampp/htdocs/bigdata/php/spark-warehouse/cron.php_ para rodar todo dia �s 5 da manh�, ou _*/10 * * * * php /opt/lampp/htdocs/bigdata/php/spark-warehouse/cron.php_, para rodar a cada dez minutos.
5. Feito tudo isso, resta apenas acessar a p�gina que est� em servidor local atrav�s do navegador (localhost/bigdata/index.php).
-- -- --
##### **Esta aplica��o foi desenvolvida como trabalho final da disciplina de Big Data por alunos de Engenharia de Controle e Automa��o da UFRJ no primeiro per�odo de 2017.**

+ **Gabriel Pelielo**
+ **Gabriel Premoli**
+ **Gabriela L�cidi**
+ **Jean Am�rico**