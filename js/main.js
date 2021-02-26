document.addEventListener('DOMContentLoaded', function() {
    const monthBr = ['janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro']
    const tableDays = document.getElementById('dias');

    function GetDayCalendar(mes, ano) {
        document.getElementById('mes').innerHTML = monthBr[mes];
        document.getElementById('ano').innerHTML = ano;

        let firstDayOfWeek = new Date(ano, mes, 1).getDay() - 1;
        let getLastDayThisMonth = new Date(ano, mes + 1, 0).getDate();

        for (var i = -firstDayOfWeek, index = 0; i < (42 - firstDayOfWeek); i++, index++) {
            let dt = new Date(ano, mes, i);
            let dayTable = tableDays.getElementsByTagName('td')[index];
            dayTable.innerHTML = dt.getDate();
        }
    }
    GetDayCalendar(2, 2001);
})