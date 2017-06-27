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
  </head>
  <body>
    <div id="neighborhoods-select-container" class="input-group">
      <select id="neighborhoods-select" name="neighborhoods" class="form-control">
        <option value="Rio de Janeiro" disabled selected>Select a neighborhood in Rio!</option>
        <option value="Rio de Janeiro">All</option>
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
        <option value="Urca">Urca</option>
      </select>
      <span id="neighborhoods-submit"class="input-group-btn">
        <button class="button btn btn-secondary" type="submit" name="search_events" value="search_events">Go!</button>
      </span>
    </div>
    <div id="map">
    </div>
    <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDX5O6adZKkGf1OKi6cfxrBdwtwCHkMYMA&libraries=visualization">
    </script>
    <script type="text/JavaScript" src="libs/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/JavaScript" src="js/script.js"></script>
    <script type="text/JavaScript" src="libs/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
