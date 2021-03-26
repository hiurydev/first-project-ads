<?php

include ('head.php');

$nome      = $_POST['nomePaciente'];
$cpf       = $_POST['cpfPaciente'];
$dataNasc  = $_POST['dataNascPaciente'];
$numeroSus = $_POST['numSusPaciente'];
$telefone  = $_POST['telefonePaciente'];
$endereco  = $_POST['enderecoPaciente'];

$query = "INSERT INTO paciente (nome_pac, cpf_pac, data_nasc_pac, codigo_sus_pac, telefone_pac, endereco_pac) 
            VALUES ('$nome', '$cpf', '$dataNasc', '$numeroSus', '$telefone', '$endereco')";

$result = mysqli_query($conexao, $query);

if ($result) {
    echo "<script language='javascript' type='text/javascript'>
        window.location.href='../paciente.php';
      </script>";
}
