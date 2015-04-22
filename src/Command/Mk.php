<?php

namespace Command;

use Cli\CliInterface;

class Mk implements CliInterface {

    private $dir;
    private $mode;
    private $recursive;

    public function execute() {
        mkdir($this->dir, $this->mode, $this->recursive);
    }

    public function getRegisterKey() {
        return 'cli:mkdir';
    }

    public function setArgs(array $args = array()) {
        $this->dir = $args['dir'];
        $this->mode = isset($args['mode'])? $args['mode']: 0777;
        $this->recursive = isset($args['recursive'])? (bool) $args['recursive']: false;
    }

}
