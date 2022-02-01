<?php
include'conexao.php';


if (isset($_POST['tarefa'])){
    $tarefa = filter_input(INPUT_POST, 'tarefa', FILTER_SANITIZE_STRING);
    $query = "INSERT INTO tarefas (descricao, concluida) VALUES (:descricao, 0)";
    $stm = $con->prepare($query);
    $stm->bindParam('descricao', $tarefa);
    $stm->execute();
    header('Location: http://localhost/projeto/index.php');
}


?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas</title>
</head>
    <form method="post">
        Nova Tarefa <input type="text" name="tarefa">
        <input type="submit" value="Incluir">
    </form>
    <br><br>
    <div>
       <a href="ver-lista.php"> <input type="submit" value="Ver Lista"></a>
    </div>
</body>
</html>