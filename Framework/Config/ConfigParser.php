<?php

namespace Framework\Config;

class ConfigParser {
    protected $config;
    
    public function __construct(array $config) {
        $this->config = $config;
    }
    
    public function get($key){
        return $this->config[$key];
    }
}

