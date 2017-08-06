<template>
  <div>
    <h1>{{siteName}}</h1>
    <div id="chartContainer">FusionCharts XT will load here!</div>
  </div>
</template>

<script>
import FusionCharts from 'fusioncharts'
export default {
  props: ['siteName'],
  mounted () {
    require("fusioncharts/fusioncharts.charts")(FusionCharts)
    FusionCharts.register('theme', {
        name: 'myTheme',
        theme: {
            base: {
                chart: {
                    paletteColors: '#0075c2,#1aaf5d,#f2c500'
              }
            }
        }
    });
    
    var revenueChart = new FusionCharts({
        "type": "column2d",
        "renderAt": "chartContainer",
        "width": "500",
        "height": "300",
        "dataFormat": "json",
        "dataSource": {
          "chart": {
              "caption": "Monthly revenue for last year",
              "subCaption": "Harry's SuperMart",
              "xAxisName": "Month",
              "yAxisName": "Revenues (In USD)",
              "theme": "myTheme"
           },
          "data": [
              {
                 "label": "Jan",
                 "value": "420000"
              },
              {
                 "label": "Feb",
                 "value": "810000"
              },
              {
                 "label": "Mar",
                 "value": "720000"
              },
              {
                 "label": "Apr",
                 "value": "550000"
              },
              {
                 "label": "May",
                 "value": "910000"
              },
              {
                 "label": "Jun",
                 "value": "510000"
              },
              {
                 "label": "Jul",
                 "value": "680000"
              },
              {
                 "label": "Aug",
                 "value": "620000"
              },
              {
                 "label": "Sep",
                 "value": "610000"
              },
              {
                 "label": "Oct",
                 "value": "490000"
              },
              {
                 "label": "Nov",
                 "value": "900000"
              },
              {
                 "label": "Dec",
                 "value": "730000"
              }
           ]
        }
    });

    revenueChart.render();
  }
}
</script>

<style lang="sass" scoped>
h1
  color: green
</style>
