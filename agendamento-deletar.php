<?php

include ('head.php');

$codigo = $_GET['codigo'];

$query = "DELETE FROM agendamento WHERE codigo_age  = $codigo";
$result = mysqli_query($conexao, $query);

if ($result) {
    echo "<script language='javascript' type='text/javascript'>
        window.location.href='../agendamento.php';
      </script>";
}