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
                    <h2>Agendamentos</h2>
                    <nav aria-label="breadcrumb" style="background: #ababab;">
                        <ol class="breadcrumb" style="background: #ababab;">
                            <li class="breadcrumb-item"><a style="color: black!important;">Agenda</a></li>
                            <li class="breadcrumb-item"><a style="color: black!important;">Lista de agendamentos</a></li>
                        </ol>
                    </nav>
                    <br>
                    <button style="margin-bottom: 10px;" type="button" class="btn btn-info" onclick="cadastrarAgendamento()"><i class="fa fa-plus" aria-hidden="true"></i> Novo Agendamento</button>
                    <table class="table">
                        <thead style="background-color: #02a446; color: white;">
                        <tr>
                            <th style="width: 70px;" scope="col">Cód.</th>
                            <th style="width: 100px;" scope="col">Status</th>
                            <th style="width: 150px;" scope="col">Data</th>
                            <th style="width: 150px;" scope="col">Hora</th>
                            <th style="width: 200px;" scope="col">Especialidade</th>
                            <th style="width: 200px;" scope="col">Paciente</th>
                            <th style="width: 200px;" scope="col">Upa</th>
                            <th class="text-center" style="width: 250px;" scope="col">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = "SELECT * FROM agendamento";

                        $registros = mysqli_query($conexao, $query);

                        while ($row = mysqli_fetch_assoc($registros)) {
                            $codigo   = $row['codigo_age'];
                            $status   = $row['status_age'];
                            $data     = $row['data_age'];
                            $hora     = $row['hora_age'];
                            $espec    = $row['med_codigo_age'];
                            $paciente = $row['pac_codigo_age'];
                            $upa      = $row['upa_codigo_age'];

                            // Pegar especialidade do agendamento
                            $queryEspecialidade = "SELECT esp.nome_esp, esp.codigo_esp FROM medico med 
                                                   JOIN especialidade esp ON (esp.codigo_esp = med.esp_codigo_med)
                                                   WHERE med.codigo_med = $espec";
                            $resultEspecialidade = mysqli_query($conexao, $queryEspecialidade);

                            while ($rowEspecialidade= mysqli_fetch_assoc($resultEspecialidade)){
                                $nomeEspecialidade = $rowEspecialidade['nome_esp'];
                                $codigoEspecialidade = $rowEspecialidade['codigo_esp'];
                            }

                            // Pegar nome do paciente
                            $queryPaciente = "SELECT nome_pac FROM paciente WHERE codigo_pac = '$paciente'";
                            $resultPaciente = mysqli_query($conexao, $queryPaciente);

                            while ($rowPaciente= mysqli_fetch_assoc($resultPaciente)){
                                $nomePaciente = $rowPaciente['nome_pac'];
                            }

                            // Pegar nome da upa
                            $queryUpa = "SELECT nome_upa FROM upa WHERE codigo_upa = '$upa'";
                            $resultUpa = mysqli_query($conexao, $queryUpa);

                            while ($rowUpa = mysqli_fetch_assoc($resultUpa)){
                                $nomeUpa = $rowUpa['nome_upa'];
                            }

                            if ($status == 1) {
                                $status = 'Agendado';
                            }

                            $date = date_create($data);
                            ?>
                            <tr class="odd gradeX">
                                <td class="text-left vertical-custom"><?= $codigo; ?></td>
                                <td class="text-left vertical-custom"><?= $status; ?></td>
                                <td class="text-left vertical-custom"><?= date_format($date,"d/m/Y"); ?></td>
                                <td class="text-left vertical-custom"><?= $hora; ?></td>
                                <td class="text-left vertical-custom"><?= $nomeEspecialidade; ?></td>
                                <td class="text-left vertical-custom"><?= $nomePaciente; ?></td>
                                <td class="text-left vertical-custom"><?= $nomeUpa; ?></td>
                                <td class="text-center vertical-custom" style="width: 150px;">
                                    <div class="tooltip-sidebar-toggle">
                                        <button class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Editar" onclick="editarAgendamento('<?= $codigo; ?>','<?= $status; ?>','<?= $data; ?>','<?= $hora; ?>','<?= $nomeEspecialidade; ?>','<?= $nomePaciente; ?>','<?= $nomeUpa; ?>', '<?= $espec; ?>','<?= $paciente; ?>','<?= $upa; ?>');">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>
                                        <button class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Excluir" onclick="excluirAgendamento('<?= $codigo; ?>');">
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

<div class="modal fade" id="modalAgendamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form action="agendamento-cadastrar.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agendar Consulta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="pacAgendamento" class="col-form-label">Paciente:</label>
                        <select class="form-control" name="pacAgendamento" id="pacAgendamento" required>
                            <option></option>
                            <?php
                            $resultsPaciente = "SELECT nome_pac, codigo_pac FROM paciente";
                            $resultadoPaciente = mysqli_query($conexao, $resultsPaciente);

                            while($rowsPaciente = mysqli_fetch_assoc($resultadoPaciente)) {
                                echo '<option value="'.$rowsPaciente['codigo_pac'].'">'.$rowsPaciente['nome_pac'].' </option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="espAgendamento" class="col-form-label">Especialidade:</label>
                        <select class="form-control" name="espAgendamento" id="espAgendamento" required>
                            <option></option>
                            <?php
                            $resultsEsp = "SELECT esp.nome_esp, med.codigo_med FROM medico med 
                             JOIN especialidade esp ON (esp.codigo_esp = med.esp_codigo_med)";
                            $resultadoEsp = mysqli_query($conexao, $resultsEsp);

                            while($rowsEsp = mysqli_fetch_assoc($resultadoEsp)) {
                                echo '<option value="'.$rowsEsp['codigo_med'].'">'.$rowsEsp['nome_esp'].' </option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="upaAgendamento" class="col-form-label">Upa:</label>
                        <select class="form-control" name="upaAgendamento" id="upaAgendamento" required>
                            <option></option>
                            <?php
                            $resultsUpa = "SELECT nome_upa, codigo_upa FROM upa";
                            $resultadoUpa = mysqli_query($conexao, $resultsUpa);

                            while($rowsUpa = mysqli_fetch_assoc($resultadoUpa)) {
                                echo '<option value="'.$rowsUpa['codigo_upa'].'">'.$rowsUpa['nome_upa'].' </option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="dataAgendamento" class="col-form-label">Data:</label>
                            <input type="date" class="form-control" id="dataAgendamento" name="dataAgendamento" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="horaAgendamento" class="col-form-label">Hora:</label>
                            <input type="time" class="form-control" id="horaAgendamento" name="horaAgendamento" required>
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

<div class="modal fade" id="modalAgendamentoAtt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form action="agendamento-atualizar.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Consulta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="pacAgendamentoAtt" class="col-form-label">Paciente:</label>
                        <select class="form-control" name="pacAgendamentoAtt" id="pacAgendamentoAtt" required>
                            <?php
                            $resultsPaciente = "SELECT nome_pac, codigo_pac FROM paciente";
                            $resultadoPaciente = mysqli_query($conexao, $resultsPaciente);

                            while($rowsPaciente = mysqli_fetch_assoc($resultadoPaciente)) {
                                echo '<option value="'.$rowsPaciente['codigo_pac'].'">'.$rowsPaciente['nome_pac'].' </option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="espAgendamentoAtt" class="col-form-label">Especialidade:</label>
                        <select class="form-control" name="espAgendamentoAtt" id="espAgendamentoAtt" required>
                            <?php
                            $resultsEsp = "SELECT esp.nome_esp, med.codigo_med FROM medico med 
                             JOIN especialidade esp ON (esp.codigo_esp = med.esp_codigo_med)";
                            $resultadoEsp = mysqli_query($conexao, $resultsEsp);

                            while($rowsEsp = mysqli_fetch_assoc($resultadoEsp)) {
                                echo '<option value="'.$rowsEsp['codigo_med'].'">'.$rowsEsp['nome_esp'].' </option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="upaAgendamentoAtt" class="col-form-label">Upa:</label>
                        <select class="form-control" name="upaAgendamentoAtt" id="upaAgendamentoAtt" required>
                            <?php
                            $resultsUpa = "SELECT nome_upa, codigo_upa FROM upa";
                            $resultadoUpa = mysqli_query($conexao, $resultsUpa);

                            while($rowsUpa = mysqli_fetch_assoc($resultadoUpa)) {
                                echo '<option value="'.$rowsUpa['codigo_upa'].'">'.$rowsUpa['nome_upa'].' </option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="dataAgendamentoAtt" class="col-form-label">Data:</label>
                            <input type="date" class="form-control" id="dataAgendamentoAtt" name="dataAgendamentoAtt" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="horaAgendamentoAtt" class="col-form-label">Hora:</label>
                            <input type="time" class="form-control" id="horaAgendamentoAtt" name="horaAgendamentoAtt" required>
                        </div>
                    </div>
                    <input type="hidden" id="codigoAgendamentoAtt" name="codigoAgendamentoAtt">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="btnSalvar">Atualizar</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="modalMedicoAgendamento" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <table class="table" id="tabelaMedicosAgendamento">
                    <thead style="background-color: #02a446; color: white;">
                    <tr>
                        <th style="width: 100px;" scope="col">Código</th>
                        <th style="width: 300px;" scope="col">Nome</th>
                        <th style="width: 300px;" scope="col">CRM</th>
                        <th style="width: 200px;" scope="col">Telefone</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


</body>
</html>