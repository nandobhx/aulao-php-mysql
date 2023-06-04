<?php
    session_start();
    header("Content-Type: text/html; charset=utf-8");

    $action = isset($_GET["action"]) ? $_GET["action"] : "list";
    $con = new mysqli("localhost", "root", "", "aulao_php_mysql");

    switch ($action) {
        case "list":
            require_once(__DIR__ . "/../data/pessoas-data.php");
            $pessoas = (new PessoasData($con))->get_pessoas();
            require_once(__DIR__ . "/../views/pessoas/list.php");
            break;
        
        case "new":
            require_once(__DIR__ . "/../models/pessoa.php");
            
            $error = "";
            $id = "";
            $nome = "";
            $idade = "";
            $sexo = "";
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $id = $_POST["id"];
                $nome = $_POST["nome"];
                $idade = $_POST["idade"];
                $sexo = $_POST["sexo"];

                try {

                    $pessoa = new Pessoa($id, $nome, $idade, $sexo);
                    require_once(__DIR__ . "/../data/pessoas-data.php");
                    (new PessoasData($con))->save_pessoa($pessoa);
                    $_SESSION["pessoas_msg"] = "Pessoa criada com sucesso!";
                    header("Location: pessoas.php");
                    break;

                } catch (Exception $e) {
                    $error = $e->getMessage();
                }

            }

            require_once(__DIR__ . "/../views/pessoas/form.php");
            break;

        case "edit":
            require_once(__DIR__ . "/../models/pessoa.php");

            $error = "";

            if (!isset($_GET["id"])) {
                $_SESSION["pessoas_msg"] = "ID não informado!";
                header("Location: pessoas.php");
                break;
            }

            require_once(__DIR__ . "/../data/pessoas-data.php");
            $pessoa = (new PessoasData($con))->get_pessoa(intval($_GET["id"]));
            
            if ($pessoa == null) {
                $_SESSION["pessoas_msg"] = "ID não encontrado!";
                header("Location: pessoas.php");
                break;                
            }

            $id = $pessoa->get_id();
            $nome = $pessoa->get_nome();
            $idade = $pessoa->get_idade();
            $sexo = $pessoa->get_sexo();
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $nome = $_POST["nome"];
                $idade = $_POST["idade"];
                $sexo = $_POST["sexo"];

                try {
                    $pessoa->set_nome($nome);
                    $pessoa->set_idade($idade);
                    $pessoa->set_sexo($sexo);
                    (new PessoasData($con))->save_pessoa($pessoa);
                    $_SESSION["pessoas_msg"] = "Pessoa atualizada com sucesso!";
                    header("Location: pessoas.php");
                    break;
                } catch (Exception $e) {
                    $error = $e->getMessage();
                }
                
            }

            require_once(__DIR__ . "/../views/pessoas/form.php");
            break;
        
        case "delete":
            if (!isset($_GET["id"])) {
                $_SESSION["pessoas_msg"] = "ID não informado!";
                header("Location: pessoas.php");
                break;
            }

            require_once(__DIR__ . "/../data/pessoas-data.php");
            $pessoa = (new PessoasData($con))->get_pessoa(intval($_GET["id"]));

            if ($pessoa == null) {
                $_SESSION["pessoas_msg"] = "ID não encontrado!";
                header("Location: pessoas.php");
                break;                
            }
            
            $pessoa = (new PessoasData($con))->delete_pessoa($pessoa);
            $_SESSION["pessoas_msg"] = "Pessoa excluída com sucesso!";
            header("Location: pessoas.php");
            break;

        default:
            http_response_code(404);
            echo "Ação não encontrada!";
    }

    $con->close();

?>