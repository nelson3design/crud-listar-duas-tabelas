<?php
 include 'config.php';

 $info=[];
 $info2=[];
 $id=filter_input(INPUT_GET,'id');
 
 
 if($id){
     
    $sql= $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();


    if($sql->rowCount() > 0){

        $info= $sql->fetch( PDO::FETCH_ASSOC);


    }else{
        header("location: index.php");
        exit;
        
    }
 }else{

header("location: index.php");
exit;

 }


  
 
 if($id){
     
  
    $sql= $pdo->prepare("SELECT * FROM users_2 WHERE id_endereco = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();


    if($sql->rowCount() > 0){

        $info2= $sql->fetch( PDO::FETCH_ASSOC);


    }else{
        header("location: index.php");
        exit;
        
    }
 }else{

header("location: index.php");
exit;

 }
 
 

?>

<h2>editar usuario</h2>

<form action="editar-action.php" method="POST">

<input type="hidden"  name="id" value="<?=$info['id'];?>">

<input type="text" placeholder="nome" name="nome" value="<?=$info['nome'];?>">
<br><br>
<input type="email" placeholder="email" name="email" value="<?=$info['email'];?>">
<br><br>
<input type="tel" placeholder="telefone" name="tel" value="<?=$info['tel'];?>">
<br><br>
<input type="dadte"  name="idade" value="<?=$info['idade'];?>">
<br><br>

<input type="text"  name="rua" placeholder="rua" value="<?=$info2['rua'];?>">
<br><br>

<input type="text"  name="bairro" placeholder="bairro" value="<?=$info2['bairro'];?>">
<br><br>

<input type="text"  name="cidade" placeholder="cidade" value="<?=$info2['cidade'];?>">
<br><br>


<button type="submit">salvar</button>

</form>