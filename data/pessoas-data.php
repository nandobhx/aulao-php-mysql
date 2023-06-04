<?php
    require_once(__DIR__ . "/../models/pessoa.php");

    class PessoasData {

        private mysqli $con;

        public function __construct(mysqli $con) {
            $this->con = $con;
        }

        public function get_pessoas() {
            $pessoas = array();
            $stmt = $this->con->prepare("select * from pessoas order by id");
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_array()) {
                $pessoa = new Pessoa($row["id"], $row["nome"], $row["idade"], $row["sexo"]);
                $pessoas[] = $pessoa;
            }

            $result->close();
            $stmt->close();
            return $pessoas;
        }

        public function get_pessoa($id) {
            $pessoa = null;
            $stmt = $this->con->prepare("select * from pessoas where id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($row = $result->fetch_array()) {
                $pessoa = new Pessoa($row["id"], $row["nome"], $row["idade"], $row["sexo"]);
            }

            $result->close();
            $stmt->close();
            return $pessoa;
        }

        public function delete_pessoa($pessoa) {
            $stmt = $this->con->prepare("delete from pessoas where id = ?");
            $stmt->bind_param("i", $pessoa->get_id());
            $stmt->execute();
            $stmt->close();
        }
        
        public function save_pessoa($pessoa) {
            
            if ($pessoa->get_id() == 0) {

                $stmt = $this->con->prepare("insert into pessoas(nome, idade, sexo) values (?, ?, ?)");
                $stmt->bind_param("sis", $pessoa->get_nome(), $pessoa->get_idade(), $pessoa->get_sexo());
                $stmt->execute();
                $stmt->close();

            } else {

                $stmt = $this->con->prepare("update pessoas set nome = ?, idade = ?, sexo = ? where id = ?");
                $stmt->bind_param("sisi", $pessoa->get_nome(), $pessoa->get_idade(), $pessoa->get_sexo(), $pessoa->get_id());
                $stmt->execute();
                $stmt->close();
                
            }

        }        

    }

?>