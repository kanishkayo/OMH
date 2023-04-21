<template>
    <v-app>
        <v-app-bar height="80px" :elevation="8" app color="#34726f">
            <v-toolbar-title extended  class="white--text text-h4"
                ><span  style="font-family: 'Philosopher', sans-serif">Online Medicine Hub</span></v-toolbar-title
            >
            <v-spacer></v-spacer>
            <v-btn white--text @click="goToPharmacyLogin">Login</v-btn>
        </v-app-bar>
        <v-main>
            <v-container fluid>
                <v-img src="/images/cover.jpg" height="400"></v-img>
                <br />
                <v-container>
                    <h2 style="font-family: 'Philosopher', sans-serif">
                        About Us
                    </h2>
                    <v-row>
                        <v-col cols="12" lg="12" md="12" sm="12">
                            <p style="font-family: 'Philosopher', sans-serif9">
                                Welcome to Online Medicine Hub, your one-stop
                                for high-quality medicines and healthcare
                                products delivered right to your doorstep. We
                                are dedicated to providing our customers with
                                fast, reliable, and convenient access to the
                                medications they need to live healthier lives.
                                Our mission is to make healthcare more
                                accessible and convenient for everyone,
                                regardless of their location or financial
                                situation. You can use over 200 pharmacies
                                spread throughout the Southern province through
                                Online Medicine Hub. In this way, you can buy
                                any medicine you need from any pharmacy
                                scattered throughout the southern province to
                                any location you are. We understand that
                                navigating the world of healthcare can be
                                confusing and overwhelming, which is why we
                                strive to provide a seamless and user-friendly
                                experience for our customers. Our website is
                                designed to be easy to use, with clear product
                                descriptions and a simple checkout process. We
                                are committed to protecting your privacy and
                                security. All of our transactions are processed
                                through secure servers and we never share your
                                personal information with third parties. Thank
                                you for choosing our online medicine hub as your
                                trusted source for healthcare products. We look
                                forward to serving you and helping you to live a
                                healthy, happy life
                            </p>
                        </v-col>
                    </v-row>
                    <h2 style="font-family: 'Philosopher', sans-serif">Contact Us</h2>
                    <v-row no-gutters>
                        <v-col cols="12" lg="2" md="2" sm="12">
                            <v-img
                                src="/images/background.jpeg"
                                height="150"
                                width="150"
                            ></v-img>
                        </v-col>
                        <v-col cols="12" lg="10" md="10" sm="10">
                            <p>For any queries, you can reach out to us at:</p>
                            <p>Email: adminomh@gmail.com</p>
                            <p>Hotline: 2000</p>
                            <p>
                                Adress: omh,company(pvt) Ltd No.650 galle road
                                colombo 04 brach
                            </p>
                            <p>Branch: N0.02 Mathara Road,Galle</p>
                        </v-col>
                    </v-row>
                </v-container>
            </v-container>
            <Footer />
        </v-main>
    </v-app>
</template>
<script>
import Footer from "./Footer.vue";
export default {
    components: {
        Footer,
    },

    data() {
        return {};
    },

    created() {},

    watch: {},

    methods: {
        goToPharmacyLogin() {
            window.open("/login", "_blank");
        },
    },

    mounted() {},
};
</script>
<style></style>
