<?php
    class Usuario{
        private $idAtividade;
        private $titulo;
        private $descricao;
        private $vagas;
        private $tipoUsuario;
        private $senha;

        public function getIdAtividade(){
            return $this->idAtividade;
        }

        public function setIdAtividade($idAtividade){
            $this->idAtividade = $idAtividade;
        }

        
        public function getTitulo(){
            return $this->titulo;
        }

        public function setTitulo($titulo){
            $this->titulo = $titulo;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function setDescricao($descricao){
            $this->descricao = $descricao;
        }

        
        public function getVagas(){
            return $this->vagas;
        }

        public function setVagas($vagas){
            $this->vagas = $vagas;
        }

    }
?>