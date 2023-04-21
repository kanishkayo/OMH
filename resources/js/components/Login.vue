<template>
    <div id="app">
  <v-app style="

    background: url('/images/background.jpg') no-repeat center center fixed !important;
    background-size: cover;



  ">
    <v-main>
       <v-container  class="fill-height" fluid style="height: 100vh; max-height: 100%; " >
            <v-row>
                <v-col cols="12" xs="12" sm="12" md="12" lg="12" xl="12">
                    <v-row
                            justify="center"
                    >
                        <v-card tile style="background-color: rgba(255, 255, 255, 0.1);">
                            <v-layout justify-center align-center >
                            <v-flex xs6 class="hidden-sm-and-down pa-5">
                                <v-img src="/images/main_logo.png" fill-height="200px" fill-width="300px"></v-img>
                            </v-flex>
                            <v-flex class="pa-10 pb-8 text-center">

                                    <v-container class="fill-height" fluid>
                                                <v-row align="center" justify="center">

                                                        <v-card style=" background-color: #FFB300;" class="mt-3 mx-auto rounded- align-center text-center"  tile >
                                                            <v-alert style="font-family: Segoe UI !important;font-size: 12px;border-radius:0px !important; width: 100% !important;" v-model="alert" dismissible close-icon="mdi-close-circle-outline" :type="alertType" border="left" elevation="12" :icon="alertIcon">
                                                                <strong>{{ alertMessage }}</strong>
                                                            </v-alert>
                                                        </v-card>

                                                        <v-card
                                                            style=" background-color: rgba(255, 255, 255,0.5);"
                                                            class=" mx-auto rounded- align-center text-center"
                                                            tile
                                                        >

                                                            <v-row class="mt-0 pt-0">
                                                                <v-col cols="12" class="mt-0 pt-0">
                                                                    <v-flex class="text-center mt-0 pt-0" >
                                                                        <!-- <v-card-title class="justify-center mb-1 white--text" style="background-color: #34726f;" >
                                                                            <strong> SIGN IN  </strong>
                                                                        </v-card-title> -->

                                                                        <h2></h2>

                                                                    </v-flex>
                                                                </v-col>
                                                            </v-row>

                                                            <v-card-text>
                                                                <v-form
                                                                    v-model="valid"
                                                                    ref="form"
                                                                    action="login"
                                                                    method="post"
                                                                >
                                                                    <v-text-field
                                                                        name="_token"
                                                                        :value="csrf"
                                                                        v-model="csrf"
                                                                        v-show="false"
                                                                    ></v-text-field>
                                                                    <v-text-field
                                                                        label="Enter your e-mail address"
                                                                        v-model="email"
                                                                        :value="email"
                                                                        name="email"
                                                                        dense
                                                                        outlined
                                                                        :error-messages="email_errors"
                                                                        :rules="emailRules"
                                                                        required
                                                                    ></v-text-field>
                                                                    <v-text-field
                                                                    label="Enter your password"
                                                                        v-model="password"
                                                                        :value="password"
                                                                        name="password"
                                                                        :error-messages="password_errors"
                                                                        outlined
                                                                        dense
                                                                        min="8"
                                                                        :append-icon="
                                                                            e1
                                                                                ? 'mdi-eye'
                                                                                : 'mdi-eye-off'
                                                                        "
                                                                        @click:append="e1 = !e1"
                                                                        :type="e1 ? 'text' : 'password'"
                                                                        :rules="passwordRules"
                                                                        required
                                                                    ></v-text-field>




                                                                    <v-btn
                                                                        small
                                                                        :loading="cardLoader"
                                                                        @click="submit"
                                                                        dark
                                                                        color="#34726f"

                                                                        >Sign in</v-btn
                                                                    >

                                                                    <v-layout> </v-layout>
                                                                </v-form>
                                                            </v-card-text>

                                                        </v-card>


                                                </v-row>
                                    </v-container>

                            </v-flex>
                            </v-layout>
                            <v-progress-linear
                                color="#34726f"
                                rounded
                                value="100"
                                >
                            </v-progress-linear>
                        </v-card>
                    </v-row>
                </v-col>
            </v-row>
        </v-container>
    </v-main>




                <v-snackbar
                :top="snackBarTop"
                :color="snackColor"
                v-model="snackbar"
                >
                    {{ snackMessage }}
                </v-snackbar>

        </v-app>



    </div>
</template>

<script>

export default {
    name: "apilogin",
    component: {

    },
    data() {
        return {
            alert: false,
                alertMessage: '',
                alertType: '',
                alertIcon: '',
            window: {
                width: 0,
                height: 0
            },
            snackbar: false,
            snackColor: "",
            snackMessage: "",
            snackBarRight: false,
            snackBarTop: false,
            valid: false,
            e1: false,
            password: "Abcdef@123",
            passwordRules: [v => !!v || "Password is required"],
            emailRules: [
                v => !!v || "E-mail is required",
                v =>
                    /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,5})+$/.test(v) ||
                    "E-mail must be valid"
            ],
            csrf: "",
            email_errors: [],
            password_errors: [],
            cardLoader: false,
            socialLoader: false,
            email: "as@gmail.com",
            name: "",
            mobile: "",
            address: "",
            avatar: "",
            myLocation: {
                lat: "",
                lng: ""
            },
            randomPassword: "Abcdef@123",
            header: {},
            user_id: null,
            user_type: null,
            officer_id: null,
            section: null,

        }
    },
    beforeDestroy() {
        clearInterval(this.interval);
    },
    destroyed() {
        window.removeEventListener("resize", this.handleResize);
    },
    mounted() {
        let laravel = JSON.parse(window.Laravel);
            this.csrf =  laravel.csrfToken;
            this.header = {
                'X-CSRF-TOKEN': this.csrf,
                'X-Requested-With': 'XMLHttpRequest',
                'content-type': 'multipart/form-data',
            };
            let user = laravel.user;
    },
    computed: {},
    watch: {},
    created() {
        window.addEventListener("resize", this.handleResize);
        this.handleResize();
    },
    methods: {
        //---------------------------Handling the user window resize event--------------------------------
        handleResize() {
            this.window.width = window.innerWidth;
            this.window.height = window.innerHeight;
        },
        submit() {
            if (this.$refs.form.validate()) {
                this.checkUserLogin();
            }
        },
        clear() {
            this.$refs.form.reset();
        },
        goBack() {
            this.$router.back();
        },
        //------------check user login------------------------------------------------
        checkUserLogin() {
            this.cardLoader = true;
//api/checkLogin
            axios
                .post(
                    "/api/user/login",
                    { email: this.email, password: this.password },
                    this.header
                )
                .then(response => {
                   // alert(response.data);

                    this.cardLoader = false;
                    if (response.data.status == "Success") {
                        
                         localStorage.removeItem('token');
                        localStorage.removeItem('user');

                        // this.snackMessage = "Login successful.Redirecting...";
                        // this.snackColor = "success";
                        // this.snackBarTop = true;
                        // // this.snackbar = true;
                        // this.alertMessage = 'LOGIN SUCCESS !';
                        //     this.alertType = 'success';
                        //     this.alertIcon = 'mdi mdi-thumb-up';
                        //     this.alert = true;
                        console.log('daaaaaaaa',response.data.data);
                       // alert(response.data.data.user);
                        this.snackColor = "success";
                        this.snackMessage = 'Login success.redirecting...';
                        this.snackBarTop = true;
                        this.snackbar = true;
                        localStorage.setItem(
                            "user",
                            JSON.stringify(response.data.data.user)
                        );
                        localStorage.setItem(
                            "token",
                            response.data.data.access_token
                        );
                        this.$refs.form.$el.submit();
                    } else if (response.data.message == "invalid_email") {
                        this.snackMessage = "Invalid Email";
                        this.snackColor = "error";
                        this.snackBarTop = true;
                        this.snackbar = true;

                        this.alertMessage = 'INVALID EMAIL !';
                            this.alertType = 'error';
                            this.alertIcon = 'mdi mdi-alert';
                            this.alert = true;

                        this.password = "";
                        this.email_errors = [
                            "we cannot find user with this email"
                        ];
                    } else if (response.data.message == "invalid_password") {
                        this.snackMessage = "Authentication fail";
                        this.snackColor = "error";
                        this.snackBarTop = true;
                        this.snackbar = true;

                        this.password = "";
                        this.password_errors = [
                            "invalid password.try forget password"
                        ];
                    } else {
                        this.snackMessage = response.data.message;
                        this.snackColor = "error";
                        this.snackBarTop = true;
                        this.snackbar = true;
                        this.password = "";
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
};

</script>
