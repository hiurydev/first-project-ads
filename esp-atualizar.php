<?php

include ('head.php');

$nomeEsp = $_POST['nomeEspecialidadeAtt'] ?? '';
$descEsp = $_POST['descEspecialidadeAtt'] ?? '';
$codigo  = $_POST['codigoEspecialidadeAtt'] ?? '';

$update = "UPDATE especialidade SET nome_esp = '$nomeEsp', descricao_esp = '$descEsp' WHERE codigo_esp = $codigo";
$result = mysqli_query($conexao, $update);

if ($result) {
    echo "<script language='javascript' type='text/javascript'>
        window.location.href='../especialidade.php';
      </script>";
}
