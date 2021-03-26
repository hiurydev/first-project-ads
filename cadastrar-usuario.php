<?php

$login = $_POST['login'];
$senha = $_POST['senha'];
$nome  = $_POST['nome'];
$data  = $_POST['dataNascimento'];

include 'head.php';

$query_select = "SELECT login_usu FROM usuario WHERE login_usu = '$login'";

$select = mysqli_query($conexao, $query_select);

$array = mysqli_fetch_array($select);
$logarray = $array['login_usu'];

if($logarray == $login){

    echo "<script language='javascript' type='text/javascript'>
              alert('Ja existe um usuário registrado com este login');window.location.href='cadastro.php'
          </script>";

}else{
    $query = "INSERT INTO usuario (login_usu, senha_usu, nome_usu, data_nasc_usu) VALUES ('$login','$senha','$nome','$data')";
    $insert = mysqli_query($conexao, $query);

    if($insert){
        echo "<script language='javascript' type='text/javascript'>
                 alert('Usuário cadastrado com sucesso!');window.location.href='login.php'
              </script>";
    }else {
        echo "<script language='javascript' type='text/javascript'>
                 alert('Não foi possível cadastrar esse usuário');
              </script>";
    }
}

?>