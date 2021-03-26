<html>
    <head>
        <?php require 'head.php' ?>
    </head>
    <body>

    <div class="login-form">
        <form action="logar-usuario.php" method="post" id="caixaLogin">
            <div class="form-group text-center">
                <img class="icone-login" src="icone-adsaude.gif">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Usuário" required="required" name="login">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Senha" required="required" name="senha">
            </div>
            <div class="form-group">
                <button type="submit" id="botaoLogin" class="btn btn-primary btn-block" name="entrar">Entrar</button>
            </div>
            <div class="clearfix">
                <p class="text-center account-custom"><a class="a-custom" href="cadastro.php">Criar conta</a></p>
            </div>
        </form>

    </div>

    </body>
</html>