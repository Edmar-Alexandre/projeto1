<?php
include 'connection.php';


if (isset($_POST['assignment'])){
    $assignment = filter_input(INPUT_POST, 'assignment', FILTER_SANITIZE_STRING);
    $query = "INSERT INTO tasks (description, completed) VALUES (:description, 0)";
    $stm = $con->prepare($query);
    $stm->bindParam('description', $assignment);
    $stm->execute();

    header('Location: http://localhost/projeto/index.html');
    
}

?>

