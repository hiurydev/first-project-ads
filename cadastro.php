<html>
<head>
    <?php require 'head.php' ?>
</head>
<body>

<div class="login-form">
    <form action="cadastrar-usuario.php" method="post">
        <h2 class="text-center">Cadastro</h2>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Nome Completo" required="required" name="nome">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Usuário" required="required" name="login">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Senha" required="required" name="senha">
        </div>
        <div class="form-group">
            <span>Data de nascimento</span>
            <input type="date" class="form-control" placeholder="Data" required="required" name="dataNascimento">
        </div>
        <hr>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Criar Conta</button>
        </div>

    </form>
    <p class="text-center"><a href="login.php">Voltar</a></p>
</div>

</body>
</html>