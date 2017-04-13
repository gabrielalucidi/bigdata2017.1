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
    <script type="text/JavaScript" src="libs/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/JavaScript" src="js/script.js"></script>
    <script type="text/JavaScript" src="libs/bootstrap/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>
                        Events in RIO!
                    </h1>
                </div>
                <div class="col-sm-6">
                    <h1>
                        <button type="submit" class="button btn btn-success btn-lg" name="search_events" value="search_events">
                            Submit
                        </button>
                    </h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div id="count">
                </div>
            </div>
            <div class="row">
                <div id="results">
                </div>
            </div>
        </div>
    </body>
</html>