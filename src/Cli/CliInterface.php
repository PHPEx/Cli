<?php

namespace Cli;

interface CliInterface {
    public function execute();
    
    public function setArgs(array $args = array());
    
    public function getRegisterKey();
}
