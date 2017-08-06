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
                id: "realTimeSessions",
                type: 'realtimeline',
                renderAt: 'chart3',
                width: '100%',
                height: '300',
                dataFormat: 'json',
                dataSource: {
                chart: {
                    theme: "zune",
                    caption: "Active Sessions",
                    slantlabels: 1,
                    labeldisplay: "rotate",
                    yaxismaxvalue: "100",
                    showrealtimevalue: "0",
                    datastreamurl: "/chart/sessions",
                    refreshinterval: "2",
                    showlabels: "1",
                    showborder: "0"
                },
                categories: [
                    {
                        category: [
                            {
                                label: "Start",
                                stepSkipped: true,
                                appliedSmartLabel: true,
                                leftShift: 1,
                                delete: true
                            }
                        ]
                    }
                ],
                dataset: [
                    {
                        showvalues: 0,
                        showlabels: 1,
                        data: [
                            {
                                value: 0
                            }
                        ]
                    }
                ]
            }
            }).render();
        });
    </script>
</body>

</html>