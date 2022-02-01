<?php
include 'conexao.php';


if (isset($_POST['tarefa'])){
    $tarefa = filter_input(INPUT_POST, 'tarefa', FILTER_SANITIZE_STRING);
    $query = "INSERT INTO tarefas (descricao, concluida) VALUES (:descricao, 0)";
    $stm = $con->prepare($query);
    $stm->bindParam('descricao', $tarefa);
    $stm->execute();
    header('Location: http://localhost/projeto/index.html');
}

