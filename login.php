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
$permissions = ['email', 'user_likes'];
$loginUrl = $helper->getLoginUrl('http://localhost/bigdata/login-callback.php', $permissions);
echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
