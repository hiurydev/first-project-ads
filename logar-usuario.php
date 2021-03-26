<?php
$login  = $_POST['login'];
$senha  = $_POST['senha'];
$valida = $_POST['entrar'];

$conexao = mysqli_connect("localhost", "root", "", "upa-agendamento-prod");

if (isset($valida)) {

    $verifica = mysqli_query($conexao, "SELECT * FROM usuario WHERE login_usu ='$login' AND senha_usu = '$senha'") or die("Erro");
    if (mysqli_num_rows($verifica)<=0){
        echo "<script language='javascript' type='text/javascript'>
                 alert('Login e/ou senha incorretos');window.location.href='login.php';
              </script>";
        die();
    }else{
        header("Location: agendamento.php");
        setcookie("login",$login);
    }
}
?>