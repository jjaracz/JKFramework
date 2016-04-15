<?php

namespace Framework\Db;

use \PDO as PDO;

class Db extends PDO {
    public function __construct($dsn, $username = null, $password = null, array $options = null) {
        parent::__construct($dsn, $username, $password, $options);
    }
}

