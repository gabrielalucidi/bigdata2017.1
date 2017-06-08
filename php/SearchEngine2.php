<?php

require_once __DIR__ . '/../vendor/autoload.php';

class SearchEngine2
{
    protected $neighborhood;

    protected $results;

    public function setNeighborhood($neighborhood)
    {
        $this->neighborhood = $neighborhood;
    }

    public function init()
    {
        $fb = new Facebook\Facebook([
          'app_id' => '1684179328553694',
          'app_secret' => '8629679f39a68fb4c84bf1d31fc61c8c',
          'default_graph_version' => 'v2.8',
        ]);

        $fb->setDefaultAccessToken($fb->getApp()->getAccessToken());

        try {
            $query = '/search?q='. $this->neighborhood . '&type=event&limit=500';
            $response = $fb->get($query);
            $this->results = $response->getGraphEdge();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
          // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
          // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
    }

    public function getResults()
    {
        return $this->results;
    }

    public function writeResultsinJSON()
    {
        $success = true;
        //If you're having permission problems, go to '../json/' folder in terminal
        //and use 'sudo chmod 777 results.json' command
        $fileName = '../json/db/last' . $this->neighborhood . '.json';
        if (!$handle = fopen($fileName, 'w')) {
            $success = false;
        }

        foreach ($this->results as $key => $event) {
            if (fwrite($handle, $event . "\n") === false) {
                $success = false;
            }
        }

        fclose($handle);

        return $success;
    }

    public function triggerSpark()
    {
        $cmd = '/home/bigdata/spark-2.1.0-bin-hadoop2.7/bin/spark-submit ../facebook-event-mapper/target/scala-2.10/facebook-event-mapper_2.10-0.2.jar "../json/" 2>&1';
        $log = shell_exec($cmd);

        return $log;
    }
}
