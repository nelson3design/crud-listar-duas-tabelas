<?php

include 'config.php';
$id= filter_input(INPUT_POST, 'id');
$nome= filter_input(INPUT_POST, 'nome');
$email= filter_input(INPUT_POST, 'email');
$tel= filter_input(INPUT_POST, 'tel');
$idade= filter_input(INPUT_POST, 'idade');


$rua= filter_input(INPUT_POST, 'rua');
$bairro= filter_input(INPUT_POST, 'bairro');
$cidade= filter_input(INPUT_POST, 'cidade');



    if($id && $nome && $email){
    
        $sql= $pdo->prepare("UPDATE users SET nome=:nome, email=:email, tel=:tel, idade=:idade WHERE id= :id");
        $sql->bindValue(':id', $id );
        $sql->bindValue(':nome', $nome );
        $sql->bindValue(':email', $email );
        $sql->bindValue(':tel', $tel );
        $sql->bindValue(':idade', $idade);
        $sql->execute();


        $sql= $pdo->prepare("UPDATE users_2 SET rua=:rua, bairro=:bairro, cidade=:cidade WHERE id_endereco= :id");
        $sql->bindValue(':id', $id );
        $sql->bindValue(':rua', $rua );
        $sql->bindValue(':bairro', $bairro );
        $sql->bindValue(':cidade', $cidade );
        $sql->execute();

       

    
    
     header("location: index.php");
     exit;
    
    }else{
        header("location: editar.php");
        exit;
    }


?>