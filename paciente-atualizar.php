<?php

include ('head.php');

$codigo    = $_POST['codigoPacienteAtt'];
$nome      = $_POST['nomePacienteAtt'];
$cpf       = $_POST['cpfPacienteAtt'];
$dataNasc  = $_POST['dataNascPacienteAtt'];
$numeroSus = $_POST['numSusPacienteAtt'];
$telefone  = $_POST['telefonePacienteAtt'];
$endereco  = $_POST['enderecoPacienteAtt'];

$update = "UPDATE paciente SET 
            nome_pac = '$nome', 
            cpf_pac = '$cpf', 
            data_nasc_pac = '$dataNasc', 
            codigo_sus_pac = '$numeroSus',
            telefone_pac = '$telefone', 
            endereco_pac = '$endereco' 
            WHERE codigo_pac = $codigo";

$result = mysqli_query($conexao, $update);

if ($result) {
    echo "<script language='javascript' type='text/javascript'>
        window.location.href='../paciente.php';
      </script>";
}
