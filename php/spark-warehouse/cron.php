# to run script make sure to install php
# sudo apt-get install php7.0-cli
# then call the script
# php /opt/lampp/htdocs/bigdata/php/spark-warehouse/cron.php

<?php
require_once __DIR__ . '/../SearchEngine.php';

$neighborhoods = ["Rio de Janeiro","Andarai","Bangu","Barra da Tijuca","Benfica","Bonsucesso","Cascadura","Catete","Centro","Cidade Universitária","Copacabana","Del Castilho","Glória","Grajau","Gávea","Humaitá","Ipanema","Jardim Botânico","Lagoa","Laranjeiras","Leblon","Madureira","Meier","Pavuna","Penha","Recreio dos Bandeirantes","Tijuca","Urca"];

foreach ($neighborhoods as $index => $neighborhood) {
	search($neighborhood);
}

function search($neighborhood)
{
    $searchEngine = new SearchEngine();
    $searchEngine->setNeighborhood($neighborhood);
    $searchEngine->init();
    $results = $searchEngine->getResults();
    $success = $searchEngine->writeResultsinDB();
    $payload = array();
    if ($success) {
        //$searchEngine->triggerSpark();
    }
}