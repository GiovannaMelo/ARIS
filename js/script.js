/*Grafico Agendamento*/
am4core.ready(function() {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chart = am4core.create("chartdiv1", am4charts.XYChart);

    // Add data
    chart.data = [{
        "month": 'Julho',
        "confirmadas": 23.5,
        "desmarcadas": 18.1
    }, {
        "month": 'Agosto',
        "confirmadas": 26.2,
        "desmarcadas": 22.8
    }, {
        "month": 'Setembro',
        "confirmadas": 30.1,
        "desmarcadas": 23.9
    }, {
        "month": 'Outubro',
        "confirmadas": 29.5,
        "desmarcadas": 25.1
    }, {
        "month": 'Novembro',
        "confirmadas": 24.6,
        "desmarcadas": 25
    }];

    // Create axes
    var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "month";
    categoryAxis.numberFormatter.numberFormat = "#";
    categoryAxis.renderer.inversed = true;
    categoryAxis.renderer.grid.template.location = 0;
    categoryAxis.renderer.cellStartLocation = 0.1;
    categoryAxis.renderer.cellEndLocation = 0.9;

    var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
    valueAxis.renderer.opposite = true;

    // Create series
    function createSeries(field, name) {
        var series = chart.series.push(new am4charts.ColumnSeries());
        series.dataFields.valueX = field;
        series.dataFields.categoryY = "month";
        series.name = name;
        series.columns.template.tooltipText = "{name}: [bold]{valueX}[/]";
        series.columns.template.height = am4core.percent(100);
        series.sequencedInterpolation = true;

        var valueLabel = series.bullets.push(new am4charts.LabelBullet());
        valueLabel.label.text = "{valueX}";
        valueLabel.label.horizontalCenter = "left";
        valueLabel.label.dx = 10;
        valueLabel.label.hideOversized = false;
        valueLabel.label.truncate = false;

        var categoryLabel = series.bullets.push(new am4charts.LabelBullet());
        categoryLabel.label.text = "{name}";
        categoryLabel.label.horizontalCenter = "right";
        categoryLabel.label.dx = -10;
        categoryLabel.label.fill = am4core.color("#fff");
        categoryLabel.label.hideOversized = false;
        categoryLabel.label.truncate = false;
    }

    createSeries("confirmadas", "Confirmadas");
    createSeries("desmarcadas", "Desmarcadas");

}); // end am4core.ready()

/*Graficos Cadastros*/

am4core.ready(function() {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chart = am4core.create("chartdiv2", am4charts.XYChart);


    // Data for both series
    var data = [{
        "month": "Julho",
        "Cadastros": 23.5,
        "Crescimento": 21.1
    }, {
        "month": "Setembro",
        "Cadastros": 26.2,
        "Crescimento": 30.5
    }, {
        "month": "Outubro",
        "Cadastros": 30.1,
        "Crescimento": 34.9
    }, {
        "month": "Novembro",
        "Cadastros": 29.5,
        "Crescimento": 31.1
    }, {
        "month": "Dezembro",
        "Cadastros": 30.6,
        "Crescimento": 28.2,
        "lineDash": "5,5",
    }];

    /* Create axes */
    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "month";
    categoryAxis.renderer.minGridDistance = 30;

    /* Create value axis */
    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

    /* Create series */
    var columnSeries = chart.series.push(new am4charts.ColumnSeries());
    columnSeries.name = "Cadastros";
    columnSeries.dataFields.valueY = "Cadastros";
    columnSeries.dataFields.categoryX = "month";

    columnSeries.columns.template.tooltipText = "[#fff font-size: 15px]{name} em {categoryX}:\n[/][#fff font-size: 20px]{valueY}[/] [#fff]{additional}[/]"
    columnSeries.columns.template.propertyFields.fillOpacity = "fillOpacity";
    columnSeries.columns.template.propertyFields.stroke = "stroke";
    columnSeries.columns.template.propertyFields.strokeWidth = "strokeWidth";
    columnSeries.columns.template.propertyFields.strokeDasharray = "columnDash";
    columnSeries.tooltip.label.textAlign = "middle";

    var lineSeries = chart.series.push(new am4charts.LineSeries());
    lineSeries.name = "Crescimento";
    lineSeries.dataFields.valueY = "Crescimento";
    lineSeries.dataFields.categoryX = "month";

    lineSeries.stroke = am4core.color("#fdd400");
    lineSeries.strokeWidth = 3;
    lineSeries.propertyFields.strokeDasharray = "lineDash";
    lineSeries.tooltip.label.textAlign = "middle";

    var bullet = lineSeries.bullets.push(new am4charts.Bullet());
    bullet.fill = am4core.color("#fdd400"); // tooltips grab fill from parent by default
    bullet.tooltipText = "[#fff font-size: 15px]{name} in {categoryX}:\n[/][#fff font-size: 20px]{valueY}[/] [#fff]{additional}[/]"
    var circle = bullet.createChild(am4core.Circle);
    circle.radius = 4;
    circle.fill = am4core.color("#fff");
    circle.strokeWidth = 3;

    chart.data = data;

}); // end am4core.ready()

/*GRAFICOS CONSULTAS*/

am4core.ready(function() {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chart = am4core.create("chartdiv3", am4charts.PieChart);

    // Set data
    var selected;
    var types = [{
        type: "Na Unidade",
        percent: 70,
        color: chart.colors.getIndex(0),
        subs: [{
            type: "Clínico Geral",
            percent: 15
        }, {
            type: "Pediatra",
            percent: 35
        }, {
            type: "Ginecologista",
            percent: 20
        }, {
            type: "Dentista",
            percent: 10
        }]
    }, {
        type: "Encaminhamentos",
        percent: 30,
        color: chart.colors.getIndex(1)
    }];

    // Add data
    chart.data = generateChartData();

    // Add and configure Series
    var pieSeries = chart.series.push(new am4charts.PieSeries());
    pieSeries.dataFields.value = "percent";
    pieSeries.dataFields.category = "type";
    pieSeries.slices.template.propertyFields.fill = "color";
    pieSeries.slices.template.propertyFields.isActive = "pulled";
    pieSeries.slices.template.strokeWidth = 0;

    function generateChartData() {
        var chartData = [];
        for (var i = 0; i < types.length; i++) {
            if (i == selected) {
                for (var x = 0; x < types[i].subs.length; x++) {
                    chartData.push({
                        type: types[i].subs[x].type,
                        percent: types[i].subs[x].percent,
                        color: types[i].color,
                        pulled: true
                    });
                }
            } else {
                chartData.push({
                    type: types[i].type,
                    percent: types[i].percent,
                    color: types[i].color,
                    id: i
                });
            }
        }
        return chartData;
    }

    pieSeries.slices.template.events.on("hit", function(event) {
        if (event.target.dataItem.dataContext.id != undefined) {
            selected = event.target.dataItem.dataContext.id;
        } else {
            selected = undefined;
        }
        chart.data = generateChartData();
    });

}); // end am4core.ready()

/*GRAFICO PACIENTES*/

am4core.ready(function() {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chart = am4core.create("chartdiv4", am4charts.XYChart);


    // Data for both series
    var data = [{
        "month": "Julho",
        "Cadastros": 23.5,
        "Crescimento": 21.1
    }, {
        "month": "Setembro",
        "Cadastros": 26.2,
        "Crescimento": 30.5
    }, {
        "month": "Outubro",
        "Cadastros": 30.1,
        "Crescimento": 34.9
    }, {
        "month": "Novembro",
        "Cadastros": 29.5,
        "Crescimento": 31.1
    }, {
        "month": "Dezembro",
        "Cadastros": 30.6,
        "Crescimento": 28.2,
        "lineDash": "5,5",
    }];

    /* Create axes */
    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "month";
    categoryAxis.renderer.minGridDistance = 30;

    /* Create value axis */
    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

    /* Create series */
    var columnSeries = chart.series.push(new am4charts.ColumnSeries());
    columnSeries.name = "Cadastros";
    columnSeries.dataFields.valueY = "Cadastros";
    columnSeries.dataFields.categoryX = "month";

    columnSeries.columns.template.tooltipText = "[#fff font-size: 15px]{name} em {categoryX}:\n[/][#fff font-size: 20px]{valueY}[/] [#fff]{additional}[/]"
    columnSeries.columns.template.propertyFields.fillOpacity = "fillOpacity";
    columnSeries.columns.template.propertyFields.stroke = "stroke";
    columnSeries.columns.template.propertyFields.strokeWidth = "strokeWidth";
    columnSeries.columns.template.propertyFields.strokeDasharray = "columnDash";
    columnSeries.tooltip.label.textAlign = "middle";

    var lineSeries = chart.series.push(new am4charts.LineSeries());
    lineSeries.name = "Crescimento";
    lineSeries.dataFields.valueY = "Crescimento";
    lineSeries.dataFields.categoryX = "month";

    lineSeries.stroke = am4core.color("#fdd400");
    lineSeries.strokeWidth = 3;
    lineSeries.propertyFields.strokeDasharray = "lineDash";
    lineSeries.tooltip.label.textAlign = "middle";

    var bullet = lineSeries.bullets.push(new am4charts.Bullet());
    bullet.fill = am4core.color("#fdd400"); // tooltips grab fill from parent by default
    bullet.tooltipText = "[#fff font-size: 15px]{name} in {categoryX}:\n[/][#fff font-size: 20px]{valueY}[/] [#fff]{additional}[/]"
    var circle = bullet.createChild(am4core.Circle);
    circle.radius = 4;
    circle.fill = am4core.color("#fff");
    circle.strokeWidth = 3;

    chart.data = data;

}); // end am4core.ready()


