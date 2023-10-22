<?php

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/constants/config.php";

use App\Query\Query;

$d = new Query();

print_r($d->get_texts());