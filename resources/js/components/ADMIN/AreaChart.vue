<template>
  <div v-ripple="{ center: true }" class="LineChart_weatherData" ref="chartdivWeatherData"></div>
</template>

<script>
  import * as am4core from "@amcharts/amcharts4/core";
  import * as am4charts from "@amcharts/amcharts4/charts";
  import am4themes_animated from "@amcharts/amcharts4/themes/animated";
  am4core.useTheme(am4themes_animated);

  export default {
    name: "LineChart_weather",
    mounted() {
      let chart = am4core.create(
              this.$refs.chartdivWeatherData,
              am4charts.XYChart
      );
      chart.fontSize = 10;
      chart.logo.disabled = true;
      chart.colors.list = [
        am4core.color("#0D47A1"),
        am4core.color("#FF9800"),
        am4core.color("#D50000"),
        am4core.color("#00897B"),
        am4core.color("#F4FF81"),
      ];
      // Add data
      chart.data = [
        {
          Value: "Jan",
          Weather: 21,
          Wind: 16,
          Temperature: 32
        },
        {
          Value: "Feb",
          Weather: 22,
          Wind: 15,
          Temperature: 31
        },
        {
          Value: "Mar",
          Weather: 12,
          Wind: 46,
          Temperature: 26
        },
        {
          Value: "Apr",
          Weather: 19,
          Wind: 57,
          Temperature: 34
        },
        {
          Value: "May",
          Weather: 20,
          Wind: 49,
          Temperature: 28
        },
        {
          Value: "Jun",
          Weather: 18,
          Wind: 12,
          Temperature: 27
        },
        {
          Value: "Jul",
          Weather: 57,
          Wind: 25,
          Temperature: 26
        },
        {
          Value: "Aug",
          Weather: 49,
          Wind: 34,
          Temperature: 30
        },
        {
          Value: "Sep",
          Weather: 18,
          Wind: 12,
          Temperature: 27
        },
        {
          Value: "Oct",
          Weather: 48,
          Wind: 38,
          Temperature: 29
        },
        {
          Value: "Nov",
          Weather: 67,
          Wind: 45,
          Temperature:26
        },
        {
          Value: "Dec",
          Weather: 48,
          Wind: 22,
          Temperature: 20
        }
      ];

      /* Create axes */
      let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
      categoryAxis.dataFields.category = "Value";
      categoryAxis.renderer.minGridDistance = 30;

      /* Create value axis */
      let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());


      let lineSeries = chart.series.push(new am4charts.LineSeries());
      lineSeries.name = "Weather";
      lineSeries.dataFields.valueY = "Weather";
      lineSeries.dataFields.categoryX = "Value";

      lineSeries.stroke = am4core.color("#304FFE");
      lineSeries.strokeWidth = 2;
      lineSeries.propertyFields.strokeDasharray = "lineDash";
      lineSeries.tooltip.label.textAlign = "middle";


      let lineSeries1 = chart.series.push(new am4charts.LineSeries());
      lineSeries1.name = "Wind";
      lineSeries1.dataFields.valueY = "Wind";
      lineSeries1.dataFields.categoryX = "Value";

      lineSeries1.stroke = am4core.color("#827717");
      lineSeries1.strokeWidth = 2;
      lineSeries1.propertyFields.strokeDasharray = "lineDash";
      lineSeries1.tooltip.label.textAlign = "middle";


      let lineSeries2 = chart.series.push(new am4charts.LineSeries());
      lineSeries2.name = "Temperature";
      lineSeries2.dataFields.valueY = "Temperature";
      lineSeries2.dataFields.categoryX = "Value";

      lineSeries2.stroke = am4core.color("#F44336");
      lineSeries2.strokeWidth = 2;
      lineSeries2.propertyFields.strokeDasharray = "lineDash";
      lineSeries2.tooltip.label.textAlign = "middle";



      let bullet = lineSeries.bullets.push(new am4charts.Bullet());
      bullet.fill = am4core.color("#304FFE"); // tooltips grab fill from parent by default
      bullet.tooltipText = "[#fff font-size: 15px]{name} in {categoryX}:\n[/][#fff font-size: 20px]{valueY}[/] [#fff]{additional}[/]"
      let circle = bullet.createChild(am4core.Circle);
      circle.radius = 2;
      circle.fill = am4core.color("#fff");
      circle.strokeWidth = 2;


      let bullet1 = lineSeries1.bullets.push(new am4charts.Bullet());
      bullet1.fill = am4core.color("#827717"); // tooltips grab fill from parent by default
      bullet1.tooltipText = "[#fff font-size: 15px]{name} in {categoryX}:\n[/][#fff font-size: 20px]{valueY}[/] [#fff]{additional}[/]"
      let circle1 = bullet1.createChild(am4core.Circle);
      circle1.radius = 2;
      circle1.fill = am4core.color("#fff");
      circle1.strokeWidth = 2;


      let bullet2 = lineSeries2.bullets.push(new am4charts.Bullet());
      bullet2.fill = am4core.color("#F44336"); // tooltips grab fill from parent by default
      bullet2.tooltipText = "[#fff font-size: 15px]{name} in {categoryX}:\n[/][#fff font-size: 20px]{valueY}[/] [#fff]{additional}[/]"
      let circle2 = bullet2.createChild(am4core.Circle);
      circle2.radius = 2;
      circle2.fill = am4core.color("#fff");
      circle2.strokeWidth = 2;
    }
  };
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .LineChart_weatherData {
    width: 100%;
    height: 100%;
  }
</style>
