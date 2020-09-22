<?php
require("vendor/autoload.php");
$openapi = \OpenApi\scan('index.php');
header('Content-Type: application/x-yaml');
echo $openapi->toYaml();
?>