<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    <div class="dashboard">
        <div class="navbar">Navbar</div>
        <div class="leftnav">Leftnav</div>
        <div class="main">
            <div id="chart1"></div>
            <div id="chart2"></div>
            <div id="chart3"></div>
        </div>
        <div class="footer">Footer</div>
    </div>

    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
    <script type="text/javascript" src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.zune.js?cacheBust=56"></script>
    <script type="text/javascript">
        FusionCharts.ready(function () {

            // Multi-series Bar chart
            new FusionCharts({
                type: 'mscolumn2d',
                renderAt: 'chart1',
                width: '100%',
                height: '300',
                dataFormat: 'jsonurl',
                dataSource: '/chart/revenue1'
            }).render();

            // Pie Chart
            new FusionCharts({
                type: 'pie2d',
                renderAt: 'chart2',
                width: '100%',
                height: '300',
                dataFormat: 'jsonurl',
                dataSource: '/revenue2.json'
            }).render();

            new FusionCharts({
                id: "stockRealTimeChart",
                type: 'realtimeline',
                renderAt: 'chart3',
                width: '100%',
                height: '300',
                dataFormat: 'jsonurl',
                dataSource: '/chart/stocks',
                "events": {
                    "initialized": function (e) {
                        function addLeadingZero(num) {
                            return (num <= 9) ? ("0" + num) : num;
                        }
                        function updateData() {
                            // Get reference to the chart using its ID
                            var chartRef = FusionCharts("stockRealTimeChart"),
                                // We need to create a querystring format incremental update, containing
                                // label in hh:mm:ss format
                                // and a value (random).
                                currDate = new Date(),
                                label = addLeadingZero(currDate.getHours()) + ":" +
                                    addLeadingZero(currDate.getMinutes()) + ":" +
                                    addLeadingZero(currDate.getSeconds()),
                                // Get random number between 35.25 & 35.75 - rounded to 2 decimal places
                                randomValue = Math.floor(Math.random()
                                    * 50) / 100 + 35.25,
                                // Build Data String in format &label=...&value=...
                                strData = "&label=" + label
                                    + "&value="
                                    + randomValue;

                                 console.log(strData) 

                                 window.axios.get("/chart/stocks").then(function(response) {
                                     console.log(response.data.categories[0]);
                                     console.log(response.data.dataset.data[0]);
                                      strData = "&label=" + response.data.categories[0].category.label
                                            + "&value="
                                            + response.data.dataset.data[0].value;
                                    chartRef.feedData(strData);
                                 })
                            // Feed it to chart.
                            
                        }

                        var myVar = setInterval(function () {
                            updateData();
                        }, 5000);
                    }
                }
            }).render();
        });
    </script>
</body>

</html>