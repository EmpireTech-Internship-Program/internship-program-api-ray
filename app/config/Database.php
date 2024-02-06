<?php

class Database {

    private $localhost;
    private $root;
    private $bancoDeDados;
    private $conexao;

    public function __construct($host, $usuario, $senha, $bancoDeDados) {
        $this->host = $host;
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->bancoDeDados = $bancoDeDados;

        $this->conectar();
    }

    private function conectar() {
        $this->conexao = new mysqli($this->host, $this->usuario, $this->senha);
    
        if ($this->conexao->connect_error) {
            die("Falha na conexão: " . $this->conexao->connect_error);
        }
    
        if (!$this->conexao->select_db($this->bancoDeDados)) {
            die("Erro ao selecionar o banco de dados: " . $this->conexao->error);
        }
    }
    
    public function getConnection() {
        return $this->conexao;
    }

    public function closeConnection() {
        $this->conexao->close();
    }
}
?>
