<?php

include ('head.php');

$codigo = $_GET['codigo'];

$query = "DELETE FROM paciente WHERE codigo_pac  = $codigo";

$result = mysqli_query($conexao, $query);

if ($result) {
    echo "<script language='javascript' type='text/javascript'>
        window.location.href='../paciente.php';
      </script>";
} else {
    echo "<script language='javascript' type='text/javascript'>
         alert('Não é possível deletar! ' +
          'Esse registro já está sendo utilizado em um agendamento!');window.location.href='../upa.php';
        </script>";
}