$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

$(document).ready(function(e) {
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
});

function cadastrarEspecialidade() {
    $('#modalEspecialidade').modal('show')
}

function excluirEspecialidade(codigo) {
    window.location.href='../esp-deletar.php/?codigo='+ codigo;
}

function editarEspecialidade(codigo, nome, desc) {
    $('#modalEspecialidadeAtt').modal('show')

    $('#modalEspecialidadeAtt').on('shown.bs.modal', function (e) {
        $('#nomeEspecialidadeAtt').val(nome);
        $('#descEspecialidadeAtt').val(desc)

        $('#codigoEspecialidade').val(codigo);
    })
}

function cadastrarUpa() {
    $('#modalUpa').modal('show')
}

function excluirUpa(codigo) {
    window.location.href='/upa-deletar.php/?codigo='+ codigo;
}

function editarUpa(codigo, nome, endereco, telefone) {
    $('#modalUpaAtt').modal('show')

    $('#modalUpaAtt').on('shown.bs.modal', function (e) {
        $('#nomeUpaAtt').val(nome);
        $('#enderecoUpaAtt').val(endereco)
        $('#telefoneUpaAtt').val(telefone)

        $('#codigoUpaAtt').val(codigo);
    })
}

function cadastrarPaciente() {
    $('#modalPaciente').modal('show')
}

function excluirPaciente(codigo) {
    window.location.href='../paciente-deletar.php/?codigo='+ codigo;
}

function editarPaciente(codigo, nome, cpf, dataNasc, numSus, telefone, endereco) {
    $('#modalPacienteAtt').modal('show')

    $('#modalPacienteAtt').on('shown.bs.modal', function (e) {
        $('#nomePacienteAtt').val(nome);
        $('#cpfPacienteAtt').val(cpf);
        $('#dataNascPacienteAtt').val(dataNasc);
        $('#numSusPacienteAtt').val(numSus);
        $('#telefonePacienteAtt').val(telefone);
        $('#enderecoPacienteAtt').val(endereco);

        $('#codigoPacienteAtt').val(codigo);
    })
}

function cadastrarMedico() {
    $('#modalMedico').modal('show')
}

function excluirMedico(codigo) {
    window.location.href='../medico-deletar.php/?codigo='+ codigo;
}

function editarMedico(codigo, nome, crm, dataNasc, endereco, telefone, email) {
    $('#modalMedicoAtt').modal('show')

    $('#modalMedicoAtt').on('shown.bs.modal', function (e) {
        $('#nomeMedicoAtt').val(nome);
        $('#crmMedicoAtt').val(crm);
        $('#dataNascMedicoAtt').val(dataNasc);
        $('#enderecoMedicoAtt').val(endereco);
        $('#telefoneMedicoAtt').val(telefone);
        $('#emailMedicoAtt').val(email);

        $('#codigoMedicoAtt').val(codigo);
    })
}

function cadastrarAgendamento() {
    $('#modalAgendamento').modal('show')
}

function editarAgendamento(codigo, status, data, hora, nomeEspecialidade, nomePaciente, nomeUpa, codigoMedico, codigoPaciente, codigoUpa) {
    $('#modalAgendamentoAtt').modal('show')

    $('#modalAgendamentoAtt').on('shown.bs.modal', function (e) {
        $('#dataAgendamentoAtt').val(data);
        $('#horaAgendamentoAtt').val(hora);

        $('#pacAgendamentoAtt #pac').remove();
        $('#espAgendamentoAtt #nome').remove();
        $('#upaAgendamentoAtt #upa').remove();

        $('#pacAgendamentoAtt #pac').val();
        $('#espAgendamentoAtt #nome').val();
        $('#upaAgendamentoAtt #upa').val();

        $('#pacAgendamentoAtt').append('<option disabled selected value="'+ codigoPaciente +'" id="pac">'+ nomePaciente +'</option>');
        $('#espAgendamentoAtt').append('<option disabled selected value="'+ codigoMedico +'" id="nome">'+ nomeEspecialidade +'</option>');
        $('#upaAgendamentoAtt').append('<option disabled selected value="'+ codigoUpa+'" id="upa"> '+ nomeUpa +'</option>');

        $('#pacAgendamentoAtt').val(codigoPaciente);
        $('#espAgendamentoAtt').val(codigoMedico);
        $('#upaAgendamentoAtt').val(codigoUpa);

        $('#codigoAgendamentoAtt').val(codigo);
    })
}

function excluirAgendamento(codigo) {
    window.location.href='../agendamento-deletar.php/?codigo='+ codigo;
}
