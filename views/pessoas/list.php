<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulão PHP + MySQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    
    <main>
        <article id="crud-pessoas" class="container">
            <section class="container-fluid my-2">
                <div class="row align-items-center">
                    <div class="col">
                        <h2>Cadastro de Pessoas</h2>
                    </div>
                    <div class="col text-end">
                        <a href="pessoas.php?action=new" class="btn btn-primary" title="Criar Novo"><i class="bi bi-plus-circle"></i> Criar Novo</a>
                    </div>
                </div>
            </section>
            <section class="container-fluid my-2">
                <div class="row">
                    <div class="col">
                        <table class="table align-middle table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Idade</th>
                                    <th>Sexo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($pessoas as $pessoa) {
                                ?>
                                    <tr>
                                        <td><?php echo $pessoa->get_id(); ?></td>
                                        <td><?php echo $pessoa->get_nome(); ?></td>
                                        <td><?php echo $pessoa->get_idade(); ?></td>
                                        <td><?php echo $pessoa->get_sexo_string(); ?></td>
                                        <td class="text-end">
                                            <a href="pessoas.php?action=edit&id=<?php echo $pessoa->get_id(); ?>" class="btn btn-primary" title="Editar"><i class="bi bi-pencil"></i></a>
                                            <a href="pessoas.php?action=delete&id=<?php echo $pessoa->get_id(); ?>" class="btn btn-primary" title="Excluir"><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>            
        </article>    
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        window.addEventListener("DOMContentLoaded", () => {
            <?php
                if (isset($_SESSION["pessoas_msg"]) && $_SESSION["pessoas_msg"] != "") {
            ?>
                alert("<?php echo $_SESSION["pessoas_msg"]; ?>");
            <?php
                    unset($_SESSION["pessoas_msg"]);
                }
            ?>
        });
    </script>
</body>
</html>