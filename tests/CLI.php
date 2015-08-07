<?php

require_once __DIR__."/../vendor/autoload.php";

$actions = new Cielo24\Actions("http://api-dev.cielo24.com");
$code = "return \$actions->" . $argv[1];
$result = eval($code);
print_r($result);

# Usage:
# >  php CLI.php 'login("username", "password");'
# ! Pay attention to quotation marks !