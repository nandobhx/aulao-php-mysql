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
                        <h2><?php echo isset($_GET["id"]) ? "Atualizar" : "Nova"; ?> Pessoa</h2>
                    </div>
                </div>
            </section>
            <section class="container-fluid my-2">
                <div class="row">
                    <div class="col border rounded py-2">
                        <form action="pessoas.php?action=<?php echo $_GET["action"]; ?><?php echo isset($_GET["id"]) ? "&id=" . $_GET["id"] : ""; ?>" method="post">
                            <?php
                                if ($error != "") {
                            ?>
                                <div class="row">
                                    <div class="col mb-2">
                                        <div class="alert alert-danger">
                                            <?php echo $error; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                }
                            ?>
                            <div class="row">
                                <div class="col-sm-6 mb-2">
                                    <label for="id" class="form-label">ID:</label>
                                    <input type="text" id="id" name="id" class="form-control" value="<?php echo $id; ?>" readonly>
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <label for="nome" class="form-label">Nome:</label>
                                    <input type="text" id="nome" name="nome" class="form-control" value="<?php echo $nome; ?>">
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <label for="idade" class="form-label">Idade:</label>
                                    <input type="number" id="idade" name="idade" class="form-control" value="<?php echo $idade; ?>">
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <label for="sexo" class="form-label">Sexo:</label>
                                    <select id="sexo" name="sexo" class="form-select">
                                        <option value=""></option>
                                        <option value="M" <?php echo $sexo == "M" ? "selected" : ""; ?>>MASCULINO</option>
                                        <option value="F" <?php echo $sexo == "F" ? "selected" : ""; ?>>FEMININO</option>
                                    </select>
                                </div>                                                                
                            </div>
                            <div class="row">
                                <div class="col mb-2 text-end">
                                    <button class="btn btn-primary">Salvar</button>
                                    <a href="pessoas.php" class="btn btn-secondary">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>            
        </article>    
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>