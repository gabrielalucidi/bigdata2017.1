<?php
require_once __DIR__ . '/SearchEngine.php';

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'search_events':
            $neighborhood = $_POST['neighborhood'];
            search($neighborhood);
            break;
    }
}

function search($neighborhood)
{
    $searchEngine = new SearchEngine();
    $searchEngine->setNeighborhood($neighborhood);
    $searchEngine->init();
    $results = $searchEngine->getResults();
    $nOfResults = count($results);
    $success = $searchEngine->writeResultsinJSON();
    if ($success) {
        echo $nOfResults . ' resultados foram gravados no arquivo JSON';
    } else {
        echo 'Falha ao gravar resultados no arquivo JSON';
    }
}
