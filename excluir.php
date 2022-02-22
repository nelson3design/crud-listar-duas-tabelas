<?php

include 'config.php';
$id= filter_input(INPUT_GET, 'id');


    if($id){
    
        $sql= $pdo->prepare("DELETE FROM users WHERE id= :id");
        $sql->bindValue(':id', $id );
        $sql->execute();


        $sql= $pdo->prepare("DELETE FROM users_2 WHERE id_endereco= :id");
        $sql->bindValue(':id', $id );
        $sql->execute();
    
     header("location: index.php");
     exit;
    
    }else{
        header("location: index.php");
        exit;
    }


?>