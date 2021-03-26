<html>
<head>
    <?php require 'head.php' ?>
</head>
<body>

<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <div class="form-group text-left">
                    <img class="icone-tela" src="icone-adsaude.gif">
                </div>
            </li>
            <li>
                <a href="agendamento.php"><i class="fa fa-address-book-o" aria-hidden="true"></i>  Agendamentos</a>
            </li>
            <li class="nav-item dropdown">
                <div class="row">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-book" aria-hidden="true"></i>  Cadastros</a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="medico.php"><i class="fa fa-user-md" aria-hidden="true"></i> Médicos</a>
                        <a class="dropdown-item" href="paciente.php"><i class="fa fa-user" aria-hidden="true"></i> Pacientes</a>
                        <a class="dropdown-item" href="upa.php"><i class="fa fa-hospital-o" aria-hidden="true"></i> Upas</a>
                        <a class="dropdown-item" href="especialidade.php"><i class="fa fa-stethoscope" aria-hidden="true"></i> Especialidade</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <a href="logout.php" id="logout" style="color:black;margin-top: 15px;"><i class="fa fa-sign-out" aria-hidden="true"></i>Sair</a>
                    <h2>UPAS</h2>
                    <nav aria-label="breadcrumb" style="background: #ababab;">
                        <ol class="breadcrumb" style="background: #ababab;">
                            <li class="breadcrumb-item"><a style="color: black!important;">UPAs</a></li>
                            <li class="breadcrumb-item"><a style="color: black!important;">Lista de UPAS</a></li>
                        </ol>
                    </nav>
                    <br>
                    <button style="margin-bottom: 10px;" type="button" class="btn btn-info" onclick="cadastrarUpa()"><i class="fa fa-plus" aria-hidden="true"></i> Nova UPA</button>
                    <table class="table">
                        <thead style="background-color: #02a446; color: white;">
                        <tr>
                            <th style="width: 100px;" scope="col">Código</th>
                            <th style="width: 300px;" scope="col">Nome</th>
                            <th style="width: 300px;" scope="col">Endereço</th>
                            <th style="width: 200px;" scope="col">Telefone</th>
                            <th style="width: 100px;" class="text-center" scope="col">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = "SELECT * FROM upa";

                        $registros = mysqli_query($conexao, $query);

                        while ($row = mysqli_fetch_assoc($registros)) {
                            $codigo   = $row['codigo_upa'];
                            $nome     = $row['nome_upa'];
                            $endereco = $row['endereco_upa'];
                            $telefone = $row['telefone_upa'];

                            ?>
                            <tr class="odd gradeX">
                                <td class="text-left vertical-custom"><?= $codigo; ?></td>
                                <td class="text-left vertical-custom"><?= $nome; ?></td>
                                <td class="text-left vertical-custom"><?= $endereco; ?></td>
                                <td class="text-left vertical-custom"><?= $telefone; ?></td>
                                <td class="text-center vertical-custom" style="width: 150px;">
                                    <div class="tooltip-sidebar-toggle">
                                        <button class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Editar" onclick="editarUpa('<?= $codigo; ?>','<?= $nome; ?>','<?= $endereco; ?>','<?= $telefone; ?>');">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>
                                        <button class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Excluir" onclick="excluirUpa('<?= $codigo; ?>');">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<div class="modal fade" id="modalUpa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form action="upa-cadastrar.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro de UPA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nome:</label>
                        <input type="text" class="form-control" id="nomeUpa" name="nomeUpa" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Endereço:</label>
                        <input type="text" class="form-control" id="enderecoUpa" name="enderecoUpa" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Telefone:</label>
                        <input type="text" class="form-control" id="telefoneUpa" name="telefoneUpa" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="btnSalvar">Salvar</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="modalUpaAtt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form action="upa-atualizar.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edição de UPA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nome:</label>
                        <input type="text" class="form-control" id="nomeUpaAtt" name="nomeUpaAtt" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Endereço:</label>
                        <input type="text" class="form-control" id="enderecoUpaAtt" name="enderecoUpaAtt" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Telefone:</label>
                        <input type="text" class="form-control" id="telefoneUpaAtt" name="telefoneUpaAtt" required>
                    </div>
                    <input type="hidden" id="codigoUpaAtt" name="codigoUpaAtt">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>

            </form>

        </div>
    </div>
</div>

</body>
</html>