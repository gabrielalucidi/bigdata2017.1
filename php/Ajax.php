<?php
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
    $dir = "../json/results/" . $neighborhood . "/"; 
    $dh = opendir($dir);
    $spark_json = "";
    while (false !== ($filename = readdir($dh))) { 
        if (substr($filename,-5) == ".json") { 
            $spark_json .= file_get_contents($dir . $filename); 
        }
    }
    $payload["results"] = $spark_json;

    echo json_encode($payload);
}
