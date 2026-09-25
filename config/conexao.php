<?php
    class Conexao{
        private $servidor = "localhost";
        private $usuario = "root";
        private $senha = "";
        private $banco = "experiencia_viva";

        private $conexao;

        public function estabelecerConexao(){
            return mysqli_connect($this->servidor, $this->usuario, $this->senha, $this->banco);
        }

        public function getConexao(){
            $this->conexao = $this->estabelecerConexao();

            if($this->conexao){
               // echo "CONEXAO ESTABELECIDA";

                return $this->conexao;

            }
        }
    }

   
?>