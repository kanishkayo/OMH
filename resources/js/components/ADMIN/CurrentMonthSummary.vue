<template>
    <div v-ripple="{ center: true }" class="CurrentMonthSummary" ref="chartdiv_CurrentMonthSummary"></div>
</template>

<script>
    import * as am4core from "@amcharts/amcharts4/core";
    import * as am4charts from "@amcharts/amcharts4/charts";

    function am4themes_myTheme(target) {
        if (target instanceof am4core.ColorSet) {
            target.list = [
                am4core.color("#FF3D00"),
                am4core.color("#651FFF"),
                am4core.color("#00B0FF"),
                am4core.color("#004D40"),
                am4core.color("#D32F2F"),
            ];
        }
    }
    am4core.useTheme(am4themes_myTheme);

    export default {
        name: "CurrentMonthSummary",
        mounted() {
            let chart = am4core.create(
                this.$refs.chartdiv_CurrentMonthSummary,
                am4charts.PieChart
            );

            chart.fontSize = 10;
            chart.logo.disabled = true;
            // Add percent sign to all numbers
            chart.data = [];

            // Add data
            chart.data = [{
                "district": "Matara",
                "valueS": 42
            }, {
                "district": "Hambantota",
                "valueS": 21
            }, {
                "district": "Galle",
                "valueS": 28
            }];

            // Add and configure Series
            let pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "valueS";
            pieSeries.dataFields.category = "district";
            pieSeries.innerRadius = am4core.percent(50);
            pieSeries.ticks.template.disabled = true;
            pieSeries.labels.template.disabled = true;

            let rgm = new am4core.RadialGradientModifier();
            rgm.brightnesses.push(-0.8, -0.8, -0.5, 0, - 0.5);
            pieSeries.slices.template.fillModifier = rgm;
            pieSeries.slices.template.strokeModifier = rgm;
            pieSeries.slices.template.strokeOpacity = 0.4;
            pieSeries.slices.template.strokeWidth = 0;

            chart.legend = new am4charts.Legend();
            chart.legend.position = "right";
        }
    };
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    .CurrentMonthSummary {
        width: 100%;
        height: 100%;
    }
</style>
