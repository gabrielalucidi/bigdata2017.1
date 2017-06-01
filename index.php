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
  <style>
  /* Always set the map height explicitly to define the size of the div
  * element that contains the map. */
  #map {
    height: 60%;
  }
  /* Optional: Makes the sample page fill the window. */
  html, body {
    height: 100%;
    margin: 30px;
    padding: 0;
  }
  #floating-panel {
    position: relative;
    top: 20px;
    left: 25%;
    z-index: 5;
    background-color: #fff;
    padding: 5px;
    border: 1px solid #999;
    text-align: center;
    font-family: 'Roboto','sans-serif';
    line-height: 30px;
    padding-left: 10px;
  }
  #floating-panel {
    background-color: #fff;
    border: 1px solid #999;
    left: 25%;
    padding: 5px;
    position: relative;
    top: 7%;
    z-index: 5;
  }
  </style>
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
            <option value="Urca">Urca</option>
          </select>
          <button type="submit" class="button btn btn-success btn-sm" name="search_events" value="search_events">
            Submit
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div id="floating-panel">
      <button onclick="toggleHeatmap()">Mapa de calor</button>
      <button onclick="changeGradient()">Mudar gradiente</button>
      <button onclick="changeRadius()">Mudar raio</button>
      <button onclick="changeOpacity()">Mudar opacidade</button>
    </div>
  </div>
    <div id="map"></div>
    <div class="container">
      <div class="row">
        <div id="count">
        </div>
      </div>
      <div class="row">
        <div id="status">
        </div>
      </div>
      <div class="row">
        <div id="results">
        </div>
      </div>
      <div>Resultados:
        <p id="resultados">
        </p>
      </div>
    </div>
    <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDX5O6adZKkGf1OKi6cfxrBdwtwCHkMYMA&libraries=visualization">
    </script>

    <script>
    //FUNCTIONS OF THE MAP BUTTONS

    function toggleHeatmap() {
      heatmap.setMap(heatmap.getMap() ? null : map);
    }

    function changeGradient() {
      var gradient = [
        'rgba(0, 255, 255, 0)',
        'rgba(0, 255, 255, 1)',
        'rgba(0, 191, 255, 1)',
        'rgba(0, 127, 255, 1)',
        'rgba(0, 63, 255, 1)',
        'rgba(0, 0, 255, 1)',
        'rgba(0, 0, 223, 1)',
        'rgba(0, 0, 191, 1)',
        'rgba(0, 0, 159, 1)',
        'rgba(0, 0, 127, 1)',
        'rgba(63, 0, 91, 1)',
        'rgba(127, 0, 63, 1)',
        'rgba(191, 0, 31, 1)',
        'rgba(255, 0, 0, 1)'
      ]
      heatmap.set('gradient', heatmap.get('gradient') ? null : gradient);
    }

    function changeRadius() {
      heatmap.set('radius', heatmap.get('radius') ? null : 70);
    }

    function changeOpacity() {
      heatmap.set('opacity', heatmap.get('opacity') ? null : 0.2);
    }
</script>



  <script type="text/JavaScript" src="libs/jquery/jquery-1.11.1.min.js"></script>
  <script type="text/JavaScript" src="js/script.js"></script>
  <script type="text/JavaScript" src="libs/bootstrap/js/bootstrap.min.js"></script>


</body>
</html>
