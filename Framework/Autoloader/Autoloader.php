<?php

class AutoLoader {
    public function init(){
        spl_autoload_register(array($this,'loadClass'));
    }
    
    public function loadClass($class){
        $path = str_replace("\\","/",$class) . '.php';
        
        if(file_exists($path)){
            include_once $path;
        } else {
            throw new Exception("Plik na ścieżce " . $path . " nie istnieje");
        }
    }
}