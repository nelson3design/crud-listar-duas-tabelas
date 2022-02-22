<?php
 include 'config.php';

 $lista=[];

 $sql=$pdo->query('SELECT users.*, users_2.rua, users_2.bairro ,users_2.cidade FROM users INNER JOIN users_2 ON users.id= users_2.id_endereco');

 if($sql->rowCount() > 0){

     $lista= $sql->fetchAll( PDO::FETCH_ASSOC);
     
 }

 

?>

<button>
    <a href="adicionar.php">adicionar</a>
</button>

<h3>quatidade de usuario cadastrado: <?php echo $sql->rowCount()?></h3>

<table border="1" width= "100%" >

<tr>

<th>nome</th>
<th>email</th>
<th>telefone</th>
<th>idade</th>
<th>endereço</th>
<th>acões</th>

</tr>

<?php foreach( $lista as $usuario): ?>
   <?php $age=substr($usuario['idade'],0,4);?>

   <?php $dd=substr($usuario['tel'],0,2);?>
   <?php $tele1=substr($usuario['tel'],3,4);?>
   <?php $tele2=substr($usuario['tel'],7,15);?>

  
<tr>

        <td> <?=$usuario['nome']?></td>
        <td> <?=$usuario['email']?></td>
        <!-- <td> <?=$usuario['tel']?></td> -->

        <td> <?php echo "(".$dd.")"." ".$tele1."-".$tele2 ?></td>
      
        <td> <?php echo date("Y")-$age ?> anos</td>
    
        <td> <?=$usuario['rua']?></td>

        <td>
            <a href="editar.php?id=<?=$usuario['id'];?>"><button>editar</button></a>

            <a href="excluir.php?id=<?=$usuario['id'];?>" onclick="return confirm('tem certeza de excluir esse usuario?')"><button>excluir</button></a>
        </td>
        
    </tr>
    <?php endforeach;?>

</table>