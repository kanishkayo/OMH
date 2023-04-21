<template>
    <div class="pa-10">
        <v-row>
            <v-col cols="3">
                <v-card elevation="8" height="200">
                    <MnthSUM />
                </v-card>

            </v-col>
            <v-col cols="3">
                <v-card elevation="8" height="200">
                    <LineChart />
                </v-card>
            </v-col>
            <v-col cols="3">
                <v-card elevation="8" height="200">
                    <MnthSUM />
                </v-card>
            </v-col>
            <v-col cols="3">
                <v-card elevation="8" height="200">
                    <OpsDSD />
                </v-card>
            </v-col>
        </v-row>
        <v-row>
            <v-col cols="12" >
                <PharmacyList />
            </v-col>
        </v-row>
    </div>
</template>
<script>
import OpsDSD from "./CMCLineChart";
import MnthSUM from "./CurrentMonthSummary";
import LineChart from "./AreaChart";
import PharmacyList from "./user";


export default {

    components: {

        OpsDSD,
        MnthSUM,
        LineChart,
        PharmacyList,
    },

    data() {
        return {

        }
    },

    created() {

    },

    watch: {

    },

    methods: {

    },

    mounted() {

    }
}
</script>
<style></style>
