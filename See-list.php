<?php
include'connection.php';



$query = "SELECT id,description,completed FROM tasks";
$lista = $con->query($query)->fetchAll();

if (isset($_GET['delete'])){
    $id = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);
    $query = "DELETE FROM tasks WHERE id=:id";
    $stm = $con->prepare($query);
    $stm->bindParam('id', $id);
    $stm->execute();

    

}


if (isset($_GET['conclude'])){
    $id = filter_input(INPUT_GET, 'conclude', FILTER_SANITIZE_NUMBER_INT);
    $query = "UPDATE tasks SET completed=1 WHERE id=:id";
    $stm = $con->prepare($query);
    $stm->bindParam('id', $id);
    $stm->execute();

    
}

if (isset($_GET['reopen'])){
    $id = filter_input(INPUT_GET, 'reopen', FILTER_SANITIZE_NUMBER_INT);
    $query = "UPDATE tasks SET completed=0 WHERE id=:id";
    $stm = $con->prepare($query);
    $stm->bindParam('id', $id);
    $stm->execute();

    
}


?>

            
            <?php foreach($lista as $item):?>
                <li <?= $item['completed']?'class="completed"': ''?>><?=$item['description']?>
                    <?php if(!$item['completed']):?>
                        
                        <a href="?cconclude=<?=$item['id']?>"><input type="submit" value="Conclude"></a>
                    <?php else: ?>
                        <a href="?reopen=<?=$item['id']?>"><input type="submit" value="Reopen"></a>
                    <?php endif; ?>
                    <a href="?delete=<?=$item['id']?>"><input type="submit" value="Delete"></a>
                </li>
               
            <?php endforeach; ?>
   

                