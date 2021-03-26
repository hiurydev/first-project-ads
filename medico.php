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
                    <h2>Médicos</h2>
                    <nav aria-label="breadcrumb" style="background: #ababab;">
                        <ol class="breadcrumb" style="background: #ababab;">
                            <li class="breadcrumb-item"><a style="color: black!important;">Médico</a></li>
                            <li class="breadcrumb-item"><a style="color: black!important;">Lista de Médicos</a></li>
                        </ol>
                    </nav>
                    <br>
                    <button style="margin-bottom: 10px;" type="button" class="btn btn-info" onclick="cadastrarMedico()"><i class="fa fa-plus" aria-hidden="true"></i> Novo Médico</button>
                    <table class="table">
                        <thead style="background-color: #02a446; color: white;">
                        <tr>
                            <th style="width: 100px;" scope="col">Código</th>
                            <th style="width: 200px;" scope="col">Nome</th>
                            <th style="width: 100px;" scope="col">CRM</th>
                            <th style="width: 150px;" scope="col">Endereço</th>
                            <th style="width: 150px;" scope="col">Telefone</th>
                            <th style="width: 150px;" scope="col">Email</th>
                            <th style="width: 150px;" scope="col">Especialidade</th>
                            <th style="width: 300px;" class="text-center" scope="col">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM medico";

                            $registros = mysqli_query($conexao, $query);

                            while ($row = mysqli_fetch_assoc($registros)) {
                                $codigo   = $row['codigo_med'];
                                $nome     = $row['nome_med'];
                                $crm      = $row['crm_med'];
                                $data     = $row['data_nasc_med'];
                                $endereco = $row['endereco_med'];
                                $telefone = $row['telefone_med'];
                                $email    = $row['email_med'];
                                $cdEspec  = $row['esp_codigo_med'];

                                $queryEspecialidade = "SELECT nome_esp FROM especialidade WHERE codigo_esp = '$cdEspec'";
                                $resultEspecialidade = mysqli_query($conexao, $queryEspecialidade);

                                while ($rowEspecialidade= mysqli_fetch_assoc($resultEspecialidade)){
                                    $nomeEspecialidade = $rowEspecialidade['nome_esp'];
                                }
                                ?>
                                <tr class="odd gradeX">
                                    <td class="text-left vertical-custom"><?= $codigo; ?></td>
                                    <td class="text-left vertical-custom"><?= $nome; ?></td>
                                    <td class="text-left vertical-custom"><?= $crm; ?></td>
                                    <td class="text-left vertical-custom"><?= $endereco; ?></td>
                                    <td class="text-left vertical-custom"><?= $telefone; ?></td>
                                    <td class="text-left vertical-custom"><?= $email; ?></td>
                                    <td class="text-left vertical-custom"><?= $nomeEspecialidade; ?></td>
                                    <td class="text-center vertical-custom" style="width: 150px;">
                                        <div class="tooltip-sidebar-toggle">
                                            <button class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Editar" onclick="editarMedico('<?= $codigo; ?>','<?= $nome; ?>','<?= $crm; ?>','<?= $data; ?>','<?= $endereco; ?>','<?= $telefone; ?>','<?= $email; ?>');">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </button>
                                            <button class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Excluir" onclick="excluirMedico('<?= $codigo; ?>');">
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

<div class="modal fade" id="modalMedico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form action="medico-cadastrar.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro de Médico</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-4">
                            <label for="nomeMedico">Nome:</label>
                            <input type="text" class="form-control input-filter"  id="nomeMedico" name="nomeMedico" value="">
                        </div>
                        <div class="col-lg-4">
                            <label for="crmMedico">CRM:</label>
                            <input type="text" class="form-control input-filter"  id="crmMedico" name="crmMedico" value="">
                        </div>
                        <div class="col-lg-4">
                            <label for="especMedico">Especialidade:</label>
                            <select class="form-control" name="especMedico" id="especMedico" required>
                                <option></option>
                                <?php
                                    $results = "SELECT nome_esp, codigo_esp FROM especialidade";
                                    $resultado = mysqli_query($conexao, $results);

                                    while($rows = mysqli_fetch_assoc($resultado)) {
                                        echo '<option value="'.$rows['codigo_esp'].'">'.$rows['nome_esp'].' </option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="emailMedico">Email:</label>
                            <input type="text" class="form-control input-filter"  id="emailMedico" name="emailMedico" value="">
                        </div>
                        <div class="col-lg-4">
                            <label for="telefoneMedico">Telefone:</label>
                            <input type="text" class="form-control input-filter"  id="telefoneMedico" name="telefoneMedico" value="">
                        </div>
                        <div class="col-lg-4">
                            <label for="dataNascMedico">Data Nascimento:</label>
                            <input type="date" class="form-control input-filter"  id="dataNascMedico" name="dataNascMedico" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="enderecoMedico">Endereço:</label>
                            <input type="text" class="form-control input-filter"  id="enderecoMedico" name="enderecoMedico" value="">
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

<div class="modal fade" id="modalMedicoAtt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form action="medico-atualizar.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edição de Médico</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-4">
                            <label for="nomeMedicoAtt">Nome:</label>
                            <input type="text" class="form-control input-filter"  id="nomeMedicoAtt" name="nomeMedicoAtt" value="">
                        </div>
                        <div class="col-lg-4">
                            <label for="crmMedicoAtt">CRM:</label>
                            <input type="text" class="form-control input-filter"  id="crmMedicoAtt" name="crmMedicoAtt" value="">
                        </div>
                        <div class="col-lg-4">
                            <label for="especMedicoAtt">Especialidade:</label>

                            <select class="form-control" name="especMedicoAtt" id="especMedicoAtt">
                                <?php
                                $results = "SELECT nome_esp, codigo_esp FROM especialidade";
                                $resultado = mysqli_query($conexao, $results);

                                while($rows = mysqli_fetch_assoc($resultado)) {
                                    echo '<option value="'.$rows['codigo_esp'].'">'.$rows['nome_esp'].' </option>';
                                }
                                ?>
                            </select>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="emailMedicoAtt">Email:</label>
                            <input type="text" class="form-control input-filter"  id="emailMedicoAtt" name="emailMedicoAtt" value="">
                        </div>
                        <div class="col-lg-4">
                            <label for="telefoneMedicoAtt">Telefone:</label>
                            <input type="text" class="form-control input-filter"  id="telefoneMedicoAtt" name="telefoneMedicoAtt" value="">
                        </div>
                        <div class="col-lg-4">
                            <label for="dataNascMedicoAtt">Data Nascimento:</label>
                            <input type="date" class="form-control input-filter"  id="dataNascMedicoAtt" name="dataNascMedicoAtt" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="enderecoMedicoAtt">Endereço:</label>
                            <input type="text" class="form-control input-filter"  id="enderecoMedicoAtt" name="enderecoMedicoAtt" value="">
                        </div>
                    </div>
                </div>
                <input type="hidden" id="codigoMedicoAtt" name="codigoMedicoAtt">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="btnSalvar">Atualizar</button>
                </div>
            </form>

        </div>
    </div>
</div>

</body>
</html>