<?php

class Database {
    private $host = 'seu_host';
    private $dbname = 'project';
    private $username = 'seu_usuario';
    private $password = 'sua_senha';

    public function __construct() {}

    public function getConnection() {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};";
        return new PDO($dsn, $this->username, $this->password);
    }
}
