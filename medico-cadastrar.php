<?php

include ('head.php');

$nome      = $_POST['nomeMedico'];
$crm       = $_POST['crmMedico'];
$dataNasc  = $_POST['dataNascMedico'];
$endereco  = $_POST['enderecoMedico'];
$telefone  = $_POST['telefoneMedico'];
$email     = $_POST['emailMedico'];
$espec     = $_POST['especMedico'];

$query = "INSERT INTO medico (nome_med, crm_med, data_nasc_med, endereco_med, telefone_med, email_med, esp_codigo_med) 
            VALUES ('$nome', '$crm', '$dataNasc', '$endereco', '$telefone', '$email', '$espec')";

$result = mysqli_query($conexao, $query);

if ($result) {
    echo "<script language='javascript' type='text/javascript'>
        window.location.href='../medico.php';
      </script>";
}
