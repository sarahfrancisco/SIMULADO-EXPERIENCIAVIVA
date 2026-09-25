<?php
    class Usuario{
        private $idInscricao;
        private $fkUsuario;
        private $fkAtividade;


        public function getIdInscricao(){
            return $this->idInscricao;
        }

        public function setIdInscricao($idInscricao){
            $this->idInscricao = $idInscricao;
        }

        
        public function getFkUsuario(){
            return $this->fkUsuario;
        }

        public function setFkUsuario($fkUsuario){
            $this->fkUsuario = $fkUsuario;
        }

        public function getFkAtividade(){
            return $this->fkAtividade;
        }

        public function setFkAtividade($fkAtividade){
            $this->fkAtividade = $fkAtividade;
        }


    }
?>