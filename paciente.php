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
                    <h2>Pacientes</h2>
                    <nav aria-label="breadcrumb" style="background: #ababab;">
                        <ol class="breadcrumb" style="background: #ababab;">
                            <li class="breadcrumb-item"><a style="color: black!important;">Paciente</a></li>
                            <li class="breadcrumb-item"><a style="color: black!important;">Lista de Pacientes</a></li>
                        </ol>
                    </nav>
                    <br>
                    <button style="margin-bottom: 10px;" type="button" class="btn btn-info" onclick="cadastrarPaciente()"><i class="fa fa-plus" aria-hidden="true"></i> Novo Paciente</button>
                    <table class="table">
                        <thead style="background-color: #02a446; color: white;">
                        <tr>
                            <th style="width: 100px;" scope="col">Código</th>
                            <th style="width: 200px;" scope="col">Nome</th>
                            <th style="width: 200px;" scope="col">CPF</th>
                            <th style="width: 200px;" scope="col">Data Nascimento</th>
                            <th style="width: 200px;" scope="col">Nº SUS</th>
                            <th style="width: 200px;" scope="col">Telefone</th>
                            <th style="width: 200px;" scope="col">Endereco</th>
                            <th style="width: 100px;" class="text-center" scope="col">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = "SELECT * FROM paciente";

                        $registros = mysqli_query($conexao, $query);

                        while ($row = mysqli_fetch_assoc($registros)) {
                            $codigo    = $row['codigo_pac'];
                            $nome      = $row['nome_pac'];
                            $cpf       = $row['cpf_pac'];
                            $dataNasc  = $row['data_nasc_pac'];
                            $numeroSus = $row['codigo_sus_pac'];
                            $telefone  = $row['telefone_pac'];
                            $endereco  = $row['endereco_pac'];

                            $date = date_create($dataNasc);
                            ?>
                            <tr class="odd gradeX">
                                <td class="text-left vertical-custom"><?= $codigo; ?></td>
                                <td class="text-left vertical-custom"><?= $nome; ?></td>
                                <td class="text-left vertical-custom"><?= $cpf; ?></td>
                                <td class="text-left vertical-custom"><?= date_format($date,"d/m/Y"); ?></td>
                                <td class="text-left vertical-custom"><?= $numeroSus; ?></td>
                                <td class="text-left vertical-custom"><?= $telefone; ?></td>
                                <td class="text-left vertical-custom"><?= $endereco; ?></td>
                                <td class="text-center vertical-custom" style="width: 150px;">
                                    <div class="tooltip-sidebar-toggle">
                                        <button class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Editar" onclick="editarPaciente('<?= $codigo; ?>','<?= $nome; ?>','<?= $cpf; ?>','<?= $dataNasc; ?>','<?= $numeroSus; ?>','<?= $telefone; ?>','<?= $endereco; ?>');">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>
                                        <button class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Excluir" onclick="excluirPaciente('<?= $codigo; ?>');">
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

<div class="modal fade" id="modalPaciente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form action="paciente-cadastrar.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro de Paciente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-4">
                            <label for="nomePaciente">Nome:</label>
                            <input type="text" class="form-control input-filter"  id="nomePaciente" name="nomePaciente" value="">
                        </div>
                        <div class="col-lg-4">
                            <label for="cpfPaciente">CPF:</label>
                            <input type="text" class="form-control input-filter"  id="cpfPaciente" name="cpfPaciente" value="">
                        </div>
                        <div class="col-lg-4">
                            <label for="dataNascPaciente">Data Nascimento:</label>
                            <input type="date" class="form-control input-filter"  id="dataNascPaciente" name="dataNascPaciente" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="numSusPaciente">Nº SUS:</label>
                            <input type="text" class="form-control input-filter"  id="numSusPaciente" name="numSusPaciente" value="">
                        </div>
                        <div class="col-lg-4">
                            <label for="telefonePaciente">Telefone:</label>
                            <input type="text" class="form-control input-filter"  id="telefonePaciente" name="telefonePaciente" value="">
                        </div>
                        <div class="col-lg-4">
                            <label for="enderecoPaciente">Endereço:</label>
                            <input type="text" class="form-control input-filter"  id="enderecoPaciente" name="enderecoPaciente" value="">
                        </div>
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

<div class="modal fade" id="modalPacienteAtt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form action="paciente-atualizar.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro de Paciente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-4">
                            <label for="nomePacienteAtt">Nome:</label>
                            <input type="text" class="form-control input-filter"  id="nomePacienteAtt" name="nomePacienteAtt" value="">
                        </div>
                        <div class="col-lg-4">
                            <label for="cpfPacienteAtt">CPF:</label>
                            <input type="text" class="form-control input-filter"  id="cpfPacienteAtt" name="cpfPacienteAtt" value="">
                        </div>
                        <div class="col-lg-4">
                            <label for="dataNascPacienteAtt">Data Nascimento:</label>
                            <input type="date" class="form-control input-filter"  id="dataNascPacienteAtt" name="dataNascPacienteAtt" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="numSusPacienteAtt">Nº SUS:</label>
                            <input type="text" class="form-control input-filter"  id="numSusPacienteAtt" name="numSusPacienteAtt" value="">
                        </div>
                        <div class="col-lg-4">
                            <label for="telefonePacienteAtt">Telefone:</label>
                            <input type="text" class="form-control input-filter"  id="telefonePacienteAtt" name="telefonePacienteAtt" value="">
                        </div>
                        <div class="col-lg-4">
                            <label for="enderecoPacienteAtt">Endereço:</label>
                            <input type="text" class="form-control input-filter"  id="enderecoPacienteAtt" name="enderecoPacienteAtt" value="">
                        </div>
                    </div>
                    <input type="hidden" id="codigoPacienteAtt" name="codigoPacienteAtt">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="btnSalvar">Salvar</button>
                </div>
            </form>

        </div>
    </div>
</div>

</body>
</html>