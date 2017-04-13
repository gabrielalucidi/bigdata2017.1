<?php
require_once __DIR__ . '/../vendor/autoload.php';

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'search_events':
            search();
            break;
    }
}

function search()
{
    if (!session_id()) {
        session_start();
    }
    $fb = new Facebook\Facebook([
      'app_id' => '1684179328553694',
      'app_secret' => '40c355e2a78c6affe6edc7052508f7fb',
      'default_graph_version' => 'v2.8',
    ]);

    $token = $_SESSION['facebook_access_token'];
    $fb->setDefaultAccessToken($token);


    try {
        $response = $fb->get('/search?q=Rio de Janeiro&type=event&limit=200');
        $graphEdge = $response->getGraphEdge();
    } catch (Facebook\Exceptions\FacebookResponseException $e) {
      // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
      // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }

    echo $graphEdge;
}
