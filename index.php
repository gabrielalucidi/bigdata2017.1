<?php
require_once __DIR__ . '/vendor/autoload.php';

// workaround to activate php error reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset='utf-8'>
    <title> Events in RIO!
    </title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="libs/bootstrap/css/bootstrap.min.css">
    <script type="text/JavaScript" src="libs/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/JavaScript" src="js/script.js"></script>
    <script type="text/JavaScript" src="libs/bootstrap/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container">
            <h1>
                Events in RIO!
            </h1>
            <div class="row">
                <div class="col-sm-12">
                    <div>
                        <h4>
                            Selecione o bairro:
                        </h4>
                        <select name="neighborhoods">
                            <option value="Rio de Janeiro">Todos</option>
                            <option value="Andarai">Andarai</option>
                            <option value="Bangu">Bangu</option>
                            <option value="Barra da Tijuca">Barra da Tijuca</option>
                            <option value="Benfica">Benfica</option>
                            <option value="Bonsucesso">Bonsucesso</option>
                            <option value="Cascadura">Cascadura</option>
                            <option value="Catete">Catete</option>
                            <option value="Centro">Centro</option>
                            <option value="Cidade Universitária">Cidade Universitária</option>
                            <option value="Copacabana">Copacabana</option>
                            <option value="Del Castilho">Del Castilho</option>
                            <option value="Glória">Glória</option>
                            <option value="Grajau">Grajau</option>
                            <option value="Gávea">Gávea</option>
                            <option value="Humaitá">Humaitá</option>
                            <option value="Ipanema">Ipanema</option>
                            <option value="Jardim Botânico">Jardim Botânico</option>
                            <option value="Lagoa">Lagoa</option>
                            <option value="Laranjeiras">Laranjeiras</option>
                            <option value="Leblon">Leblon</option>
                            <option value="Madureira">Madureira</option>
                            <option value="Meier">Meier</option>
                            <option value="Pavuna">Pavuna</option>
                            <option value="Penha">Penha</option>
                            <option value="Recreio dos Bandeirantes">Recreio dos Bandeirantes</option>
                            <option value="Tijuca">Tijuca</option>
                            <option value="Benfica">Urca</option>
                        </select>
                        <button type="submit" class="button btn btn-success btn-sm" name="search_events" value="search_events">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div id="count">
                </div>
            </div>
            <div class="row">
                <div id="results">
                </div>
            </div>
        </div>
    </body>
</html>