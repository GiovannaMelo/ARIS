var idContador = 0;

function exclui(id) {
    var campo = $("#" + id.id);
    campo.hide(200);
}

$(document).ready(function() {

    $("#btnAdicionaMedicamento").click(function(e) {
        e.preventDefault();
        var tipoCampo = "text";
        adicionaCampo(tipoCampo);
    })


    function adicionaCampo(tipo) {

        idContador++;

        var idCampo = "campoExtra" + idContador;
        var idForm = "formExtra" + idContador;

        var html = "";

        html += "<div style='margin-top: 8px;' class='input-group' id='" + idForm + "'>";
        html += "<input type='text' id='" + idCampo + "' class='input-container campo-form-lado-a-lado'/>";
        html += "<span class='input-group-btn'>";
        html += "<button class='btn' onclick='exclui(" + idForm + ")' type='button'><span class='fa fa-trash'></span></button>";
        html += "<button class='btn' onclick='exclui(" + idForm + ")' type='button'><span class='fa fa-trash'></span></button>";
        html += "</span>";
        html += "</div>";

        $("#imendaHTML" + tipo).append(html);
    }

    $(".btnExcluir").click(function() {
        console.log("clicou");
        $(this).slideUp(200);
    })

    $("#btnSalvar").click(function() {

        var mensagem = "";
        var novosCampos = [];
        var camposNulos = false;

        $('.campoDefault').each(function() {
            if ($(this).val().length < 1) {
                camposNulos = true;
            }
        });
        $('.novoCampo').each(function() {
            if ($(this).is(":visible")) {
                if ($(this).val().length < 1) {
                    camposNulos = true;
                }
                //novosCampos.push($(this).val());
                mensagem += $(this).val() + "\n";
            }
        });

        if (camposNulos == true) {
            alert("Atenção: existem campos nulos");
        } else {
            alert("Novos campos adicionados: \n\n " + mensagem);
        }

        novosCampos = [];
    })

});









var btnDivTabelaMedico = document.getElementById('btn-div-tabela-medico');
var btnDivTabelaMedicoCrm = document.getElementById('btn-div-tabela-medico-crm');
var btnDivFormCadastroMedico = document.getElementById('btn-div-form-cadastro-medico');
var btnDivHistorico = document.getElementById('btn-div-historico');
var containerTabelaMedicoCadastrado = document.querySelector('.container-tabela-medico');
var containerFormMedico = document.querySelector('.container-form-medico');
var containerHistorico = document.querySelector('.container-historico');


btnDivFormCadastroMedico.addEventListener('click', function() {
    if (containerFormMedico.style.display === 'none') {
        containerFormMedico.style.display = 'block';
    } else if ( containerFormMedico.style.display === 'block') {
        containerFormMedico.style.display = 'none';
    }
});

btnDivHistorico.addEventListener('click', function() {

    if (containerHistorico.style.display === 'none') {
        containerHistorico.style.display = 'block';
    }
});