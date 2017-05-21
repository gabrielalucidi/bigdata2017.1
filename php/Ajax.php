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
    $payload = array();
    if ($success) {
        $payload["status"] = $nOfResults . ' resultados foram gravados no arquivo JSON';

        $log = $searchEngine->triggerSpark();
        $payload["log"] = $log;

        $dir = "../json/latlong.json/"; 
        $dh = opendir($dir); 
        while (false !== ($filename = readdir($dh))) { 
            if (substr($filename,-5) == ".json") { 
                $spark_json = file_get_contents($dir . $filename); 
            }
        }
        $payload["results"] = $spark_json;
    } else {
        $payload["status"] = 'Falha ao gravar resultados no arquivo JSON';
    }

    echo json_encode($payload);
}
