<?php
require_once __DIR__ . '/vendor/autoload.php';

if (!session_id()) {
    session_start();
}

$fb = new Facebook\Facebook([
  'app_id' => '1684179328553694',
  'app_secret' => '40c355e2a78c6affe6edc7052508f7fb',
  'default_graph_version' => 'v2.8',
]);

$helper = $fb->getRedirectLoginHelper();
$_SESSION['FBRLH_state']=$_GET['state'];
try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (isset($accessToken)) {
  // Logged in!
  $_SESSION['facebook_access_token'] = (string) $accessToken;

  // Now you can redirect to another page and use the
  // access token from $_SESSION['facebook_access_token']
  header("location:http://localhost/bigdata/index.php");
}