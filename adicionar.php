<?php

session_start(); // iniciar a sessão
 include 'config.php';



?>


<h2>adicionar usuario</h2>

<?php
if(isset($_SESSION['menssagem'])){
    echo  $_SESSION['menssagem'];
    unset( $_SESSION['menssagem']);
}

?>
<br><br>
<form action="adiciona-action.php" method="POST">

<input type="text" placeholder="nome" name="nome">
<br><br>
<input type="email" placeholder="email" name="email">
<br><br>
<input type="tel" name="tel"  placeholder="###########">
<br><br>
<input type="date"  name="idade">
<br><br>

<input type="text"  name="rua" placeholder="rua">
<br><br>

<input type="text"  name="bairro" placeholder="bairro">
<br><br>

<input type="text"  name="cidade" placeholder="cidade">
<br><br>

<button type="submit">adicionar</button>
<button><a style="text-decoration: none;" href="index.php">Cancelar</a></button>

</form>
