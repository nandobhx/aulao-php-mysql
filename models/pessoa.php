<?php

    class Pessoa {

        private $id = 0;
        private $nome = "";
        private $idade = 0;
        private $sexo = "";

        public function __construct($id, $nome, $idade, $sexo) {
            $this->set_id($id);
            $this->set_nome($nome);
            $this->set_idade($idade);
            $this->set_sexo($sexo);
        }

        public function set_id($id) {
            $this->id = intval($id);
        }

        public function set_nome($nome) {
            $this->nome = strtoupper($nome);
            if ($this->nome == "") {
                throw new Exception("Nome não pode ser vazio!");
            }
        }

        public function set_idade($idade) {
            $this->idade = intval($idade);
            if ($this->idade <= 0) {
                throw new Exception("Idade deve ser maior do que zero!");
            }
        }
        
        public function set_sexo($sexo) {
            $this->sexo = strtoupper($sexo);
            if ($this->sexo != "M" && $this->sexo != "F") {
                throw new Exception("Sexo deve ser MASCULINO ou FEMININO!");
            }            
        }

        public function get_id() {
            return $this->id;
        }

        public function get_nome() {
            return $this->nome;
        }

        public function get_idade() {
            return $this->idade;
        }
        
        public function get_sexo() {
            return $this->sexo;
        }

        public function get_sexo_string() {
            return $this->sexo == "M" ? "MASCULINO" : "FEMININO";
        }

    }

?>