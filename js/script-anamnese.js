var btnDivFormularioAnamnese = document.getElementById('btn-div-formulario-anamnese');
var btnDivCadastrarAnamnese = document.getElementById('btn-div-cadastrar-anamnese');
var btnDivCadastrarAnamnesee = document.getElementById('btn-div-cadastrar-anamnesee');
var containerFormularioAnamnese = document.querySelector('.container-formulario-anamnese');
var containerTabelaAnamnese = document.querySelector('.container-tabela-anamnese');





btnDivCadastrarAnamnese.addEventListener('click', function () {
    if ( containerFormularioAnamnese.style.display === 'none') {
        containerFormularioAnamnese.style.display = 'block';

    } else if ( containerFormularioAnamnese.style.display === 'block') {
        containerFormularioAnamnese.style.display = 'none';

    }
});

btnDivCadastrarAnamnesee.addEventListener('click', function () {
    if (containerTabelaAnamnese.style.display === 'none' && containerFormularioAnamnese.style.display === 'none') {
        containerFormularioAnamnese.style.display = 'block';
        containerTabelaAnamnese.style.display = 'none'
        containerAlterFormularioAnamnese.style.display = 'none';
    } else if (containerTabelaAnamnese.style.display === 'block' && containerFormularioAnamnese.style.display === 'none') {
        containerFormularioAnamnese.style.display = 'block';
        containerTabelaAnamnese.style.display = 'none';
        containerAlterFormularioAnamnese.style.display = 'none';

    }
});

btnDivAlterAnamnesee.addEventListener('click', function () {
    containerFormularioAnamnese.style.display = 'none';
    containerTabelaAnamnese.style.display = 'none';
    containerAlterFormularioAnamnese.style.display = 'block';
});
