<?php
include'conexao.php';



$query = "SELECT id,descricao,concluida FROM tarefas";
$lista = $con->query($query)->fetchAll();

if (isset($_GET['excluir'])){
    $id = filter_input(INPUT_GET, 'excluir', FILTER_SANITIZE_NUMBER_INT);
    $query = "DELETE FROM tarefas WHERE id=:id";
    $stm = $con->prepare($query);
    $stm->bindParam('id', $id);
    $stm->execute();

    header('Location: http://localhost/projeto/ver-lista.php');

}


if (isset($_GET['concluir'])){
    $id = filter_input(INPUT_GET, 'concluir', FILTER_SANITIZE_NUMBER_INT);
    $query = "UPDATE tarefas SET concluida=1 WHERE id=:id";
    $stm = $con->prepare($query);
    $stm->bindParam('id', $id);
    $stm->execute();

    header('Location: http://localhost/projeto/ver-lista.php');
}

if (isset($_GET['reabrir'])){
    $id = filter_input(INPUT_GET, 'reabrir', FILTER_SANITIZE_NUMBER_INT);
    $query = "UPDATE tarefas SET concluida=0 WHERE id=:id";
    $stm = $con->prepare($query);
    $stm->bindParam('id', $id);
    $stm->execute();

    header('Location: http://localhost/projeto/ver-lista.php');
}


?>

            
            <?php foreach($lista as $item):?>
                <li <?= $item['concluida']?'class="concluida"': ''?>><?=$item['descricao']?>
                    <?php if(!$item['concluida']):?>
                        
                        <a href="?concluir=<?=$item['id']?>"><input type="submit" value="Concluida"></a>
                    <?php else: ?>
                        <a href="?reabrir=<?=$item['id']?>"><input type="submit" value="Reabrir"></a>
                    <?php endif; ?>
                    <a href="?excluir=<?=$item['id']?>"><input type="submit" value="Excluir"></a>
                </li>
               
            <?php endforeach; ?>
   
<a href="index.html"> <input type="submit" value="Add Tarefas"></a>
                