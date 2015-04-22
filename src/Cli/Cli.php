<?php

namespace Cli;

use ArrayObject;

class Cli {

    private $commands = null;
    private $args = null;
    private $cli;

    public function __construct($args) {
        $this->commands = new ArrayObject();
        $this->args = $args;
    }

    public function registerCommand(CliInterface $command) {
        if (strpos($command->getRegisterKey(), ':') > -1) {
            $this->commands->offsetSet($command->getRegisterKey(), $command);
        }
    }

    public function registerKeyCommand($key, CliInterface $command) {
        if (strpos($key, ':') > -1) {
            $this->commands->offsetSet($key, $command);
        }
    }

    public function run() {
        $this->getLine();
        foreach ($this->cli as $cli => $args) {
            if ($this->commands->offsetExists($cli)) {
                $command = $this->commands->offsetGet($cli);
                $command->setArgs($args);
                $command->execute();
            }
        }
    }

    private function getLine() {
        $args = array_slice($this->args, 1);
        $this->cli[$args[0]] = $this->getArguments($args);
    }

    private function getArguments(array $args) {
        unset($args[0]);
        $keys = array();
        foreach ($args as $arg) {
            list($key, $value) = explode('=', $arg);
            if (strpos($key, '--') > -1) {
                $keys[str_replace('--', '', $key)] = $value;
            }
        }
        return $keys;
    }

}
