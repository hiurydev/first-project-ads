<?php

include ('head.php');

$nome     = $_POST['nomeUpaAtt'] ?? '';
$endereco = $_POST['enderecoUpaAtt'] ?? '';
$telefone = $_POST['telefoneUpaAtt'] ?? '';
$codigo   = $_POST['codigoUpaAtt'] ?? '';

$update = "UPDATE upa SET nome_upa = '$nome', endereco_upa = '$endereco', telefone_upa = '$telefone' WHERE codigo_upa = $codigo";
$result = mysqli_query($conexao, $update);

if ($result) {
    echo "<script language='javascript' type='text/javascript'>
        window.location.href='../upa.php';
      </script>";
}
