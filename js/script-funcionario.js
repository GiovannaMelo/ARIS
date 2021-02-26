
//INICIO MUDANÇAS DE TELA DO FUNCIONARIO PARTE CADASTROS E ALTERAÇÃO
var btnDivTable = document.getElementById('btn-div-table');
var btnDivTableCpf = document.getElementById('btn-div-table-cpf');
var btnDivForm = document.getElementById('btn-div-form');
var btnDivFormm = document.getElementById('btn-div-formm');
var btnDivAlter = document.getElementById('btn-div-alter');
var btnDivHistorico = document.getElementById('btn-div-historico');
var containerTable = document.querySelector('.container-table');
var containerForm = document.querySelector('.container-form');
var containerAlter = document.querySelector('.container-alter');
var containerHistorico = document.querySelector('.container-historico');

btnDivTable.addEventListener('click', function() {

    if(containerTable.style.display === 'none' && containerForm.style.display === 'none') {
        containerTable.style.display = 'block';
        containerForm.style.display = 'none';
        containerAlter.style.display === 'none'
    } else if(containerTable.style.display === 'block' && containerForm.style.display === 'none'){
        containerTable.style.display = 'block';
        containerForm.style.display = 'none';
        containerAlter.style.display === 'none'
    }else if(containerTable.style.display === 'none' && containerForm.style.display === 'block'){
        containerTable.style.display = 'block';
        containerForm.style.display = 'none';
        containerAlter.style.display === 'none'
                                      }
                                    });

btnDivTableCpf.addEventListener('click', function() {

    if(containerTable.style.display === 'none' && containerForm.style.display === 'none') {
        containerTable.style.display = 'block';
        containerForm.style.display = 'none';
        containerAlter.style.display === 'none';
    } else if(containerTable.style.display === 'block' && containerForm.style.display === 'none'){
        containerTable.style.display = 'block';
        containerForm.style.display = 'none';
        containerAlter.style.display === 'none';
    } else if(containerTable.style.display === 'none' && containerForm.style.display === 'block'){
        containerTable.style.display = 'block';
        containerForm.style.display = 'none';
        containerAlter.style.display === 'none';
                                      }
                                    });

btnDivForm.addEventListener('click', function() {

    if(containerForm.style.display === 'none') {
        containerForm.style.display = 'block';
    } else if( containerForm.style.display === 'block'){
        containerForm.style.display = 'none';
    }
                                    });
btnDivAlter.addEventListener('click', function() {

    if(containerAlter.style.display === 'none') {
        containerAlter.style.display = 'block';
    } else if( containerAlter.style.display === 'block'){
        containerAlter.style.display = 'none';
    }
                                    });


btnDivFormm.addEventListener('click', function() {

    if(containerTable.style.display === 'block' && containerForm.style.display === 'none') {
        containerTable.style.display = 'none';
        containerForm.style.display = 'block';
        containerAlter.style.display === 'none';
    } else if(containerTable.style.display === 'none' && containerForm.style.display === 'none'){
        containerTable.style.display = 'none';
        containerForm.style.display = 'block';
        containerAlter.style.display === 'none';
    } else if(containerTable.style.display === 'none' && containerForm.style.display === 'block'){
        containerTable.style.display = 'none';
        containerForm.style.display = 'block';
        containerAlter.style.display === 'none';
    } else if(containerTable.style.display === 'block' && containerForm.style.display === 'none' && containerAlter.style.display === 'none'){
        containerTable.style.display = 'none';
        containerForm.style.display = 'block';
        containerAlter.style.display === 'none';
                                      }
                                    });

btnDivFormm.addEventListener('click', function() {

        containerAlter.style.display = 'none';
                                    });

btnDivAlter.addEventListener('click', function() {

    if(containerAlter.style.display === 'none' && containerTable.style.display === 'block'){
       containerTable.style.display = 'none';
       containerForm.style.display = 'none';
       containerAlter.style.display = 'block';
       }else{
                   containerAlter.style.display === 'none';

       }
       });

btnDivHistorico.addEventListener('click', function() {

    if(containerHistorico.style.display === 'none'){
       containerHistorico.style.display = 'block';
       }
       });

//FINAL MUDANÇAS DE TELA DO FUNCIONARIO PARTE CADASTROS E ALTERAÇÃO