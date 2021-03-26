<?php

include ('head.php');

$nome     = $_POST['nomeUpa'] ?? '';
$endereco = $_POST['enderecoUpa'] ?? '';
$telefone = $_POST['telefoneUpa'] ?? '';


$query = "INSERT INTO upa (nome_upa, endereco_upa, telefone_upa) VALUES ('$nome', '$endereco', '$telefone')";
$result = mysqli_query($conexao, $query);

if ($result) {
    echo "<script language='javascript' type='text/javascript'>
        window.location.href='../upa.php';
      </script>";
}
