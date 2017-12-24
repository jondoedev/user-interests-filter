<?php

require_once __DIR__.'/vendor/autoload.php';

\App\App::init();



$configFile = __DIR__.'/psysh.config.php';
$sh = new \Psy\Shell(new \Psy\Configuration(['configFile' => $configFile]));
$sh->setScopeVariables(get_defined_vars());
$sh->run();