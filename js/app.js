var qtdCadastros = [];
var qtdOcorrencias = [];
var qtdPacientes = [];


//Donut
$("document").ready(function() {
    $.ajax({
        type: "POST",
        url: "../area-restrita-administrador/chats/chartCountPaciente.php",
        dataType: "json",
        success: function(data) {
            for (var i in data) {
                qtdCadastros[0] = (data[i]);
            }
            graficoDonut(qtdCadastros);
        }
    });
})
$("document").ready(function() {
    $.ajax({
        type: "POST",
        url: ["../area-restrita-administrador/chats/chartCountMedico.php",],
        dataType: "json",
        success: function(data) {
            for (var i in data) {
                qtdCadastros[1] = (data[i]);
            }
            graficoDonut(qtdCadastros);
        }
    });
})
$("document").ready(function() {
    $.ajax({
        type: "POST",
        url: "../area-restrita-administrador/chats/chartCountFuncionario.php",
        dataType: "json",
        success: function(data) {
            for (var i in data) {

                qtdCadastros[2] = (data[i]);
            }
            graficoDonut(qtdCadastros);
        }
    });
})


//Consultas
$("document").ready(function() {
    $.ajax({
        type: "POST",
        url: "../area-restrita-administrador/chats/PacienteMes/chartPacienteJan.php",
        dataType: "json",
        success: function(data) {
            for (var i in data) {

                qtdPacientes[0] = (data[i]);
            }
            graficoLinha(qtdPacientes);
        }
    });
})
$("document").ready(function() {
    $.ajax({
        type: "POST",
        url: "../area-restrita-administrador/chats/PacienteMes/chartPacienteFev.php",
        dataType: "json",
        success: function(data) {
            for (var i in data) {

                qtdPacientes[1] = (data[i]);
            }
            graficoLinha(qtdPacientes);
        }
    });
})
$("document").ready(function() {
    $.ajax({
        type: "POST",
        url: "../area-restrita-administrador/chats/PacienteMes/chartPacienteMar.php",
        dataType: "json",
        success: function(data) {
            for (var i in data) {
                qtdPacientes[2] =(data[i]);
            }
            graficoLinha(qtdPacientes);
        }
    });
})
$("document").ready(function() {
    $.ajax({
        type: "POST",
        url: "../area-restrita-administrador/chats/PacienteMes/chartPacienteAbr.php",
        dataType: "json",
        success: function(data) {
            for (var i in data) {
                qtdPacientes[3] =(data[i]);
            }
            graficoLinha(qtdPacientes);
        }
    });
})
$("document").ready(function() {
    $.ajax({
        type: "POST",
        url: "../area-restrita-administrador/chats/PacienteMes/chartPacienteMai.php",
        dataType: "json",
        success: function(data) {
            for (var i in data) {
                qtdPacientes[4] =(data[i]);
            }
            graficoLinha(qtdPacientes);
        }
    });
})
$("document").ready(function() {
    $.ajax({
        type: "POST",
        url: "../area-restrita-administrador/chats/PacienteMes/chartPacienteJun.php",
        dataType: "json",
        success: function(data) {
            for (var i in data) {
                qtdPacientes[5] =(data[i]);
            }
            graficoLinha(qtdPacientes);
        }
    });
})
$("document").ready(function() {
    $.ajax({
        type: "POST",
        url: "../area-restrita-administrador/chats/PacienteMes/chartPacienteJul.php",
        dataType: "json",
        success: function(data) {
            for (var i in data) {
                qtdPacientes[6] =(data[i]);
            }
            graficoLinha(qtdPacientes);
        }
    });
})
$("document").ready(function() {
    $.ajax({
        type: "POST",
        url: "../area-restrita-administrador/chats/PacienteMes/chartPacienteAgo.php",
        dataType: "json",
        success: function(data) {
            for (var i in data) {
                qtdPacientes[7] =(data[i]);
            }
            graficoLinha(qtdPacientes);
        }
    });
})
$("document").ready(function() {
    $.ajax({
        type: "POST",
        url: "../area-restrita-administrador/chats/PacienteMes/chartPacienteSet.php",
        dataType: "json",
        success: function(data) {
            for (var i in data) {
                qtdPacientes[8] =(data[i]);
            }
            graficoLinha(qtdPacientes);
        }
    });
})
$("document").ready(function() {
    $.ajax({
        type: "POST",
        url: "../area-restrita-administrador/chats/PacienteMes/chartPacienteOut.php",
        dataType: "json",
        success: function(data) {
            for (var i in data) {
                qtdPacientes[9] =(data[i]);
            }
            graficoLinha(qtdPacientes);
        }
    });
})
$("document").ready(function() {
    $.ajax({
        type: "POST",
        url: "../area-restrita-administrador/chats/PacienteMes/chartPacienteNov.php",
        dataType: "json",
        success: function(data) {
            for (var i in data) {
                qtdPacientes[10] =(data[i]);
            }
            graficoLinha(qtdPacientes);        
        }
    });
})
$("document").ready(function() {
    $.ajax({
        type: "POST",
        url: "../area-restrita-administrador/chats/PacienteMes/chartPacienteDez.php",
        dataType: "json",
        success: function(data) {
            for (var i in data) {
                qtdPacientes[11] =(data[i]);
            }
            graficoLinha(qtdPacientes);
            console.log(qtdPacientes);
        }
    });
})

//Ocorrencias
$("document").ready(function() {
    $.ajax({
        type: "POST",
        url: "../area-restrita-administrador/chats/ocorrenciaMes/chartOcorrenciaJan.php",
        dataType: "json",
        success: function(data) {
            for (var i in data) {

                qtdOcorrencias[0] =(data[i]);
            }
            graficoBarra(qtdOcorrencias);
        }
    });
})
$("document").ready(function() {
    $.ajax({
        type: "POST",
        url: "../area-restrita-administrador/chats/ocorrenciaMes/chartOcorrenciaFev.php",
        dataType: "json",
        success: function(data) {
            for (var i in data) {

                qtdOcorrencias[1] =(data[i]);
            }
            graficoBarra(qtdOcorrencias);
        }
    });
})
$("document").ready(function() {
    $.ajax({
        type: "POST",
        url: "../area-restrita-administrador/chats/ocorrenciaMes/chartOcorrenciaMar.php",
        dataType: "json",
        success: function(data) {
            for (var i in data) {
                qtdOcorrencias[2] =(data[i]);
            }
            graficoBarra(qtdOcorrencias);
        }
    });
})
$("document").ready(function() {
    $.ajax({
        type: "POST",
        url: "../area-restrita-administrador/chats/ocorrenciaMes/chartOcorrenciaAbr.php",
        dataType: "json",
        success: function(data) {
            for (var i in data) {
                qtdOcorrencias[3] =(data[i]);
            }
            graficoBarra(qtdOcorrencias);
        }
    });
})
$("document").ready(function() {
    $.ajax({
        type: "POST",
        url: "../area-restrita-administrador/chats/ocorrenciaMes/chartOcorrenciaMai.php",
        dataType: "json",
        success: function(data) {
            for (var i in data) {
                qtdOcorrencias[4] =(data[i]);
            }
            graficoBarra(qtdOcorrencias);
        }
    });
})
$("document").ready(function() {
    $.ajax({
        type: "POST",
        url: "../area-restrita-administrador/chats/ocorrenciaMes/chartOcorrenciaJun.php",
        dataType: "json",
        success: function(data) {
            for (var i in data) {
                qtdOcorrencias[5] =(data[i]);
            }
            graficoBarra(qtdOcorrencias);
        }
    });
})
$("document").ready(function() {
    $.ajax({
        type: "POST",
        url: "../area-restrita-administrador/chats/ocorrenciaMes/chartOcorrenciaJul.php",
        dataType: "json",
        success: function(data) {
            for (var i in data) {
                qtdOcorrencias[6] =(data[i]);
            }
            graficoBarra(qtdOcorrencias);
        }
    });
})
$("document").ready(function() {
    $.ajax({
        type: "POST",
        url: "../area-restrita-administrador/chats/ocorrenciaMes/chartOcorrenciaAgo.php",
        dataType: "json",
        success: function(data) {
            for (var i in data) {
                qtdOcorrencias[7] =(data[i]);
            }
            graficoBarra(qtdOcorrencias);
        }
    });
})
$("document").ready(function() {
    $.ajax({
        type: "POST",
        url: "../area-restrita-administrador/chats/ocorrenciaMes/chartOcorrenciaSet.php",
        dataType: "json",
        success: function(data) {
            for (var i in data) {
                qtdOcorrencias[8] =(data[i]);
            }
            graficoBarra(qtdOcorrencias);
        }
    });
})
$("document").ready(function() {
    $.ajax({
        type: "POST",
        url: "../area-restrita-administrador/chats/ocorrenciaMes/chartOcorrenciaOut.php",
        dataType: "json",
        success: function(data) {
            for (var i in data) {
                qtdOcorrencias[9] =(data[i]);
            }
            graficoBarra(qtdOcorrencias);
        }
    });
})
$("document").ready(function() {
    $.ajax({
        type: "POST",
        url: "../area-restrita-administrador/chats/ocorrenciaMes/chartOcorrenciaNov.php",
        dataType: "json",
        success: function(data) {
            for (var i in data) {
                qtdOcorrencias[10] =(data[i]);
            }
            graficoBarra(qtdOcorrencias);
        }
    });
})
$("document").ready(function() {
    $.ajax({
        type: "POST",
        url: "../area-restrita-administrador/chats/ocorrenciaMes/chartOcorrenciaDez.php",
        dataType: "json",
        success: function(data) {
            for (var i in data) {
                qtdOcorrencias[11] =(data[i]);
            }
            graficoBarra(qtdOcorrencias);
            console.log(qtdOcorrencias);
        }
    });
})

//GRAFICOS

//DONUT
function graficoDonut(qtdCadastros){
    
    var ctx1 = document.getElementById('myChart1').getContext('2d');

    var chart1 = new Chart(ctx1, {
        // The type of chart we want to create
        type: 'doughnut',

        // The data for our dataset
        data: {
            labels: ['Pacientes', 'Médicos', 'Funcionários'],
            
            
            datasets: [{
                label: 'Pessoas',
                backgroundColor: ['rgb(0,75,168)','rgb(14, 18, 36)', 'rgb(52,113,187)'],
                borderColor: '#fff',
                data: qtdCadastros
            }]
        },

        // Configuration options go here
        options: {
            
        }
    });
}


//PACIENTES
function graficoLinha(qtdPacientes){

    var ctx2 = document.getElementById('myChart2').getContext('2d');
    
    var chart2 = new Chart(ctx2, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 
            'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            
            
            datasets: [{
                label: 'Pacientes Cadastrados',
                backgroundColor: '#00000000',
                pointBackgroundColor:'rgb(000, 0, 0)',
                borderColor: 'rgb(000, 99, 172)',
                data: qtdPacientes
            }]
        },

        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    stacked: true
                }]
            }
        }
    });
}


//CONSULTAS
function graficoBarra(qtdOcorrencias){
    
    var ctx3 = document.getElementById('myChart3').getContext('2d');

    var chart3 = new Chart(ctx3, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 
            'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            
            
            datasets: [{
                label: 'Consultas feitas',
                backgroundColor: 'rgb(0, 99, 172)',
                borderColor: 'rgb(255, 99, 132)',
                data: qtdOcorrencias
            }]
        },

        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    stacked: true,
                }]
            }
        }
    });
}