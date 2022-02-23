<?php
session_start(); // iniciar a sessão


// limpar o buffer de saida
ob_start();

include 'config.php';

$nome= filter_input(INPUT_POST, 'nome');
$email= filter_input(INPUT_POST, 'email');
$tel= filter_input(INPUT_POST, 'tel');
$idade= filter_input(INPUT_POST, 'idade');

$rua= filter_input(INPUT_POST, 'rua');
$bairro= filter_input(INPUT_POST, 'bairro');
$cidade= filter_input(INPUT_POST, 'cidade');


$sql= $pdo->prepare("SELECT * FROM users WHERE email=:email");
$sql->bindValue(':email', $email );
$sql->execute();
if($sql->rowCount() ===0){

    if($nome && $email){
    
        $sql= $pdo->prepare("INSERT INTO users (nome, email, tel, idade) VALUES (:nome, :email, :tel, :idade)");
        $sql->bindValue(':nome', $nome );
        $sql->bindValue(':email', $email );
        $sql->bindValue(':tel', $tel );
        $sql->bindValue(':idade', $idade );
        $sql->execute();

        var_dump($pdo->lastInsertId());

        $id_endereco = $pdo->lastInsertId();

        $sql= $pdo->prepare("INSERT INTO users_2 (rua, bairro, cidade, id_endereco) VALUES (:rua, :bairro, :cidade, :id_endereco)");
        $sql->bindValue(':rua', $rua );
        $sql->bindValue(':bairro', $bairro );
        $sql->bindValue(':cidade', $cidade );
        $sql->bindValue(':id_endereco', $id_endereco );
        $sql->execute();


        $_SESSION['menssagem']="<span style=' color: green; font-weight: 700; font-size: 20px'>$nome</span> <span style=' color: green;'> cadastrado com sucesso!</span>";
    
     header("location: index.php");
     
    
    }else{
        $_SESSION['menssagem']="<span style=' color: red; font-weight: 700; font-size: 20px'>Error: </span> <span style=' color: red;'> Usuário não cadastrado com sucesso!</span>";
        header("location: adicionar.php");
        header("location: adicionar.php");
      
    }
}else{
    $_SESSION['menssagem']="<span style=' color: red; font-weight: 700; font-size: 20px'>$email </span> <span style=' color: red;'> já existe!</span>";
    header("location: adicionar.php");
   
}


?>