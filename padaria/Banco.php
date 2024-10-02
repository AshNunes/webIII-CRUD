<?php 
    class Banco {
        private $host = 'localhost'; //talvez localhost:3307
        private $dbname = 'padaria';
        private $username = 'root';
        private $password = '';
        private $conexao;

        public function __construct(){
            $this->conexao = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
        }

        public function getConexao(){
            return $this->conexao;
        }
    }

?>
