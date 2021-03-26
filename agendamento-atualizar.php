<?php

include ('head.php');

$paciente = $_POST['pacAgendamentoAtt'];
$espec    = $_POST['espAgendamentoAtt'];
$upa      = $_POST['upaAgendamentoAtt'];
$data     = $_POST['dataAgendamentoAtt'];
$hora     = $_POST['horaAgendamentoAtt'];
$codigo   = $_POST['codigoAgendamentoAtt'];


$update = "UPDATE agendamento SET 
            data_age = '$data', 
            hora_age = '$hora', 
            med_codigo_age = '$espec', 
            pac_codigo_age = '$paciente',
            upa_codigo_age = '$upa'
            WHERE codigo_age = $codigo";

$result = mysqli_query($conexao, $update);

if ($result) {
    echo "<script language='javascript' type='text/javascript'>
        window.location.href='../agendamento.php';
      </script>";
}
