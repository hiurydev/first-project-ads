<?php

include ('head.php');

$codigo   = $_POST['codigoMedicoAtt'];
$nome     = $_POST['nomeMedicoAtt'];
$crm      = $_POST['crmMedicoAtt'];
$data     = $_POST['dataNascMedicoAtt'];
$endereco = $_POST['enderecoMedicoAtt'];
$telefone = $_POST['telefoneMedicoAtt'];
$email    = $_POST['emailMedicoAtt'];
$cdEspec  = $_POST['especMedicoAtt'];

$update = "UPDATE medico SET 
            nome_med = '$nome', 
            crm_med = '$crm', 
            data_nasc_med = '$data', 
            endereco_med = '$endereco',
            telefone_med = '$telefone', 
            email_med = '$email', 
            esp_codigo_med = '$cdEspec'
            WHERE codigo_med = $codigo";

$result = mysqli_query($conexao, $update);

if ($result) {
    echo "<script language='javascript' type='text/javascript'>
        window.location.href='../medico.php';
      </script>";
}
