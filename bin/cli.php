<?php

require 'vendor/autoload.php';

use Cli\Cli;
use Command\Ls;
use Command\Mk;

$cli = new Cli($argv);
$cli->registerCommand(new Ls());
$cli->registerCommand(new Mk());

$cli->run();