<?php

include ('head.php');

$paciente = $_POST['pacAgendamento'];
$espec    = $_POST['espAgendamento'];
$upa      = $_POST['upaAgendamento'];
$data     = $_POST['dataAgendamento'];
$hora     = $_POST['horaAgendamento'];


$query = "INSERT INTO agendamento (status_age, data_age, hora_age, med_codigo_age, pac_codigo_age, upa_codigo_age) 
            VALUES (1, '$data', '$hora', '$espec', '$paciente', '$upa')";

$result = mysqli_query($conexao, $query);

if ($result) {
    echo "<script language='javascript' type='text/javascript'>
        window.location.href='../agendamento.php';
      </script>";
}
