<?php

namespace Command;

use Cli\CliInterface;

class Ls implements CliInterface {

    private $dir;

    public function execute() {
        $dirs = array();
        if (file_exists($this->dir) && is_dir($this->dir) && is_readable($this->dir)) {
            $h = opendir($this->dir);
            while ($r = readdir($h)) {
                $dirs[] = $r;
            }
            sort($dirs);
        }
        print_r($dirs);
    }

    public function setArgs(array $args = array()) {
        $this->dir = $args['dir'];
    }

    public function getRegisterKey() {
        return 'cli:ls';
    }

}
