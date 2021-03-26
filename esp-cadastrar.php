<?php

include ('head.php');

$nomeEsp = $_POST['nomeEspecialidade'] ?? '';
$descEsp = $_POST['descEspecialidade'] ?? '';

$query = "INSERT INTO especialidade (nome_esp, descricao_esp) VALUES ('$nomeEsp', '$descEsp')";
$result = mysqli_query($conexao, $query);

if ($result) {
    echo "<script language='javascript' type='text/javascript'>
        window.location.href='../especialidade.php';
      </script>";
}
