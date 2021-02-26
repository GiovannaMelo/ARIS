var btnDivTabelaFuncionario = document.getElementById('btn-div-tabela-funcionario');
var btnDivTabelaFuncionarioCpf = document.getElementById('btn-div-tabela-funcionario-cpf');
var btnDivFormCadastroFuncionario = document.getElementById('btn-div-form-cadastro-funcionario');
var containerTabelaFuncionarioCadastrado = document.querySelector('.container-tabela-funcionario-cadastrado');
var containerFormFuncionario = document.querySelector('.container-form-funcionario');





btnDivFormCadastroFuncionario.addEventListener('click', function () {
    if (containerFormFuncionario.style.display === 'none') {
        containerFormFuncionario.style.display = 'block';
        
    } else if (  containerFormFuncionario.style.display === 'block') {
        containerFormFuncionario.style.display = 'none';
        
    }
});














