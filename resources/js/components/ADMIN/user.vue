<template>
    <v-card>
        <v-row>
            <v-col cols="6">
                    <v-toolbar dense class="mt-4">
                        <v-toolbar-title>
                            Pharmacy List
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-text-field
                                    v-model="search"
                                    append-icon="mdi-magnify"
                                    label="Search"
                                    single-line
                                    hide-details
                                    clearable
                                ></v-text-field>
                    </v-toolbar>

                    <v-responsive class="overflow-y-auto" max-height="700">
                    <v-row class="pa-5">



                        <!-- <v-row no-gutters >
                            <v-col
                            cols="12" xs="10" sm="10" md="10" lg="10" xl="10" class="mt-3 mx-auto rounded- align-center text-center"
                            >
                                <v-text-field
                                    v-model="search"
                                    append-icon="mdi-magnify"
                                    label="Search"
                                    single-line
                                    hide-details
                                    clearable
                                ></v-text-field>
                            </v-col>

                        </v-row> -->

                        <v-col
                            cols="12"
                            class="mt-3 mx-auto rounded- align-center text-center"
                        >
                            <v-data-table
                                :headers="headers"
                                :items="registeredPharmacyList"
                                :search="search"
                                :items-per-page="10"
                                dense
                                class="elevation-1"
                            >



                            <template
                                v-slot:item.location="{ item }"
                            >
                                <v-btn
                                    color="blue"
                                    elevation="2"
                                    outlined
                                    rounded
                                    x-small
                                    @click="
                                        viewPharmacyLocation(item)
                                    "
                                >
                                    View
                                </v-btn>
                            </template>



                            <template v-slot:item.actions="{ item }">

                                <v-btn

                                    class="white--text "
                                    @click="editUser(item)"
                                    color="#34726f"
                                    dark
                                    x-small
                                    dense
                                ><v-icon x-small dense class="white--text">
                                    mdi-pencil </v-icon> <strong>&nbsp;info</strong>

                                </v-btn>

                            </template>



                        </v-data-table>

                        <template>
                            <v-row justify="center">
                                <v-dialog
                                v-model="editdialog"
                                fullscreen
                                hide-overlay
                                transition="dialog-bottom-transition"
                                >


                                <v-card no-gutters>
                                    <v-row no-gutters>
                                        <v-toolbar
                                        color="#34726f" dense height="36%" dark
                                        >
                                        <v-btn
                                            icon
                                            color="white"
                                            @click="editdialog = false"
                                        >
                                            <strong><v-icon bold>mdi-close</v-icon></strong>
                                        </v-btn>
                                        <!-- <v-toolbar-title class="headline" style="margin-right: 30px">
                                            <span class="font-weight-bold text--sm black--text">User role - @userName</span>
                                        </v-toolbar-title> -->
                                        <v-spacer></v-spacer>
                                        <v-toolbar-items>


                                            <v-btn

                                            text
                                            @click="deleteItem()"
                                            color="white"
                                            >

                                            Deactive
                                            </v-btn>
                                            <v-dialog v-model="dialogDelete" max-width="500px">
                                                <v-card>
                                                    <v-card-title class="text-h5">Are you sure you want to deactive this user?</v-card-title>
                                                    <v-card-actions>
                                                    <v-spacer></v-spacer>
                                                    <v-btn color="#34726f"
                                                    dense
                                                    small
                                                    dark text @click="deactivePharmarcy()">Deactive</v-btn>
                                                    <v-btn color="#34726f"
                                                    dense
                                                    small
                                                    dark @click="dialogDelete=false">Cancel</v-btn>
                                                    <v-spacer></v-spacer>
                                                    </v-card-actions>
                                                </v-card>
                                            </v-dialog>



                                        </v-toolbar-items>
                                        </v-toolbar>
                                    </v-row>


                                        <v-row no-gutters>
                                            <v-col cols="4">

                                                <v-card style="background-color: rgba(52,114,111,0.1);" class="px-3 ma-2" >
                                                                    <v-row justify="center" class="mb-0" align="center" no-gutters style="padding-bottom: 0rem;">
                                                                        <v-col cols="12"  class="mt-3 mx-auto rounded- align-center text-center" >
                                                                            <v-avatar size="180" class="border">
                                                                                <v-img :src="profileImage" height="180px" width="180px" >
                                                                                </v-img>
                                                                            </v-avatar>
                                                                            <v-rating medium class="mt-3 mx-auto rounded- align-center text-center" dense v-model="rating" color="#cbab04" background-color="grey lighten-5"  half-increments hover></v-rating>
                                                                        </v-col>

                                                                        <v-col cols="12" class="black--text">
                                                                            <v-card-title class="text-h5 font-weight-bold">
                                                                                <div>{{ pharmarcyName }}</div>
                                                                                </v-card-title>
                                                                            <v-row>
                                                                                <v-col cols="12" >
                                                                                    <v-card-text class="black--text">

                                                                                        <v-row style="padding-bottom: 1rem;">
                                                                                            <v-icon class="black--text" small>mdi-email</v-icon>
                                                                                            <span class="ml-2">{{ pharmarcyemail }}</span>
                                                                                        </v-row>
                                                                                        <v-row style="padding-bottom: 1rem;">
                                                                                            <v-icon class="black--text" small>mdi-map-marker</v-icon>
                                                                                            <span class="ml-2">{{ pharmarcyaddress }}</span>
                                                                                        </v-row>
                                                                                        <v-row style="padding-bottom: 1rem;">
                                                                                            <v-icon class="black--text" small>mdi-phone</v-icon>
                                                                                            <span class="ml-2">{{ pharmarcycontactNumbers }}</span>
                                                                                        </v-row>
                                                                                        <v-row style="padding-bottom: 1rem;">
                                                                                            <v-icon class="black--text" small>mdi-note</v-icon>
                                                                                            <span class="ml-2">Pharmacy Reg Number : {{ pharmarcyRegId }}</span>
                                                                                        </v-row>
                                                                                        <v-row style="padding-TOP: 0rem;">
                                                                                            <v-icon class="black--text" small>mdi-note</v-icon>
                                                                                            <span class="ml-2">Pharmacy Reg Number(Gaverment) :{{ pharmarcyGovRegId }}</span>
                                                                                        </v-row>

                                                                                    </v-card-text>
                                                                                </v-col>

                                                                            </v-row>
                                                                        </v-col>
                                                                    </v-row>
                                                                    <v-row justify="center" class="mb-0 mt-3"  no-gutters style="padding-top: 0rem;">





                                                                        <v-col cols="4" class="mb-5 ">
                                                                            <v-dialog
                                                                                v-model="dialogma2"
                                                                                fullscreen
                                                                                hide-overlay
                                                                                >
                                                                                <template v-slot:activator="{ on, attrs }">
                                                                                    <v-btn
                                                                                    depressed
                                                                                    color="#34726f"
                                                                                    @click="e1 = 1"
                                                                                    dense
                                                                                    v-bind="attrs"
                                                                                    v-on="on"
                                                                                    dark
                                                                                    small
                                                                                    >
                                                                                    <strong>Reset password </strong>
                                                                                    </v-btn>
                                                                                </template>

                                                                                <v-card>
                                                                                    <div id="app" >
                                                                                        <v-app id="inspire">
                                                                                            <v-row class="bg" align="center" justify="center">
                                                                                                <v-layout row wrap align-center justify-center>
                                                                                                    <v-flex xs6 offset xs-1 sm5 offset-sm1 md6 offset-md1>
                                                                                                        <v-card class="mt-3 mx-auto rounded- align-left text-left" >
                                                                                                            <v-col cols="12" md="10" class="mt-3 mx-auto rounded- align-center text-left">
                                                                                                                <!-- <v-card-title class="text-h5 grey lighten-2">
                                                                                                                    Forget your password?
                                                                                                                </v-card-title> -->
                                                                                                                <v-card-title class="text-h5 align-center text-center">
                                                                                                                Forgotten user password?
                                                                                                                </v-card-title>

                                                                                                                <v-card-text>
                                                                                                                    User will be recived new password to below email address. Please check email to reset the password.
                                                                                                                </v-card-text>

                                                                                                                <v-row>
                                                                                                                    <v-col cols="4">
                                                                                                                        <v-subheader>Customer email</v-subheader>
                                                                                                                    </v-col>
                                                                                                                    <v-col cols="8">

                                                                                                                        <v-subheader>{{ pharmarcyemail }}</v-subheader>

                                                                                                                    </v-col>
                                                                                                                </v-row>
                                                                                                                <v-divider></v-divider>
                                                                                                                <v-row class="pa-5">

                                                                                                                        <v-spacer></v-spacer>
                                                                                                                        <v-btn
                                                                                                                            color="#34726f"
                                                                                                                            dense
                                                                                                                            small
                                                                                                                            dark
                                                                                                                            text
                                                                                                                            @click="dialogma2 = false"
                                                                                                                        >
                                                                                                                            cancel
                                                                                                                        </v-btn>

                                                                                                                        <v-btn
                                                                                                                        depressed
                                                                                                                        color="#34726f"
                                                                                                                        @click="resetPassword()"
                                                                                                                        dense
                                                                                                                        dark
                                                                                                                        small
                                                                                                                        >
                                                                                                                        <strong>Reset password </strong>
                                                                                                                        </v-btn>

                                                                                                                </v-row>
                                                                                                            </v-col>
                                                                                                        </v-card>
                                                                                                    </v-flex>
                                                                                                </v-layout>

                                                                                            </v-row>
                                                                                        </v-app>
                                                                                    </div>
                                                                                </v-card>

                                                                            </v-dialog>
                                                                        </v-col>
                                                                        <v-col cols="4" class="mb-5   ">

                                                                        </v-col>
                                                                        <v-col cols="4" class="mb-5   ">

                                                                        </v-col>

                                                                    </v-row>
                                                                </v-card>

                                            </v-col>
                                            <v-col cols="8">
                                                <v-responsive class="overflow-y-auto" max-height="661">
                                                    <v-row class="pa-5">
                                                        <v-row>
                                                            <v-col cols="12">


                                                                <v-card no-gutters flat>



                                                                    <v-row class=" mt-0"  justify="space-around" no-gutters dense>
                                                                        <v-col
                                                                        cols="12" xs="10" sm="10" md="10" lg="10" xl="10" class="mt-0 mx-auto rounded- align-center text-center"
                                                                    >
                                                                            <v-text-field
                                                                                v-model="search"
                                                                                append-icon="mdi-magnify"
                                                                                label="Search"
                                                                                single-line
                                                                                hide-details
                                                                                clearable
                                                                            ></v-text-field>
                                                                        </v-col>
                                                                    </v-row>


                                                                    <v-row no-gutters>
                                                                            <v-col cols="12" class="mt-3 mx-auto rounded- align-center text-center">
                                                                                <v-card style="background-color: #424242;">
                                                                                    <v-card flat>
                                                                                        <v-data-table
                                                                                            :headers="headerssm"
                                                                                            :search="search"
                                                                                            :items-per-page="5"
                                                                                            :items="pharmacyInventory"
                                                                                            dense
                                                                                            flat
                                                                                            class="elevation-1"
                                                                                            >



                                                                                            <template v-slot:activator="{ on, attrs }">

                                                                                                <v-btn
                                                                                                    class="mr-2 white--text"
                                                                                                    @click="dialogsh(item)"
                                                                                                    color="#CBAB04"
                                                                                                    v-bind="attrs"
                                                                                                    v-on="on"
                                                                                                    dense                                                                                dark
                                                                                                    x-small
                                                                                                ><v-icon dense class="white--text">
                                                                                                    mdi-information-variant </v-icon>
                                                                                                    <strong>&nbsp; view</strong>
                                                                                                </v-btn>

                                                                                            </template>


                                                                                        </v-data-table>
                                                                                    </v-card>
                                                                                </v-card>
                                                                            </v-col>
                                                                    </v-row>
                                                                </v-card>
                                                            </v-col>
                                                        </v-row>
                                                    </v-row>
                                                </v-responsive>
                                            </v-col>


                                        </v-row>


                                </v-card>
                                </v-dialog>
                            </v-row>
                        </template>

                            <!-- <template v-slot:no-data>
                            <v-btn
                                color="primary"
                                @click="initialize"
                            >
                                Reset
                            </v-btn>
                            </template> -->

                    </v-col>

                    </v-row>
                    </v-responsive>

            </v-col>

            <v-col cols="6" class="mx-auto rounded-align-center text-center" >

                <GmapMap
                    style="width: 100% !important;height: 95vh !important; "
                    :options="options"
                    :center="center"
                    :zoom="mapZoom"
                    ref="mapDiv"
                >

                    <GmapInfoWindow
                        :options="infoOptions"
                        :position="infoPosition"
                        :opened="infoOpened"
                        :content="infoContent"
                        @closeclick="infoOpened = false"
                    >
                    </GmapInfoWindow>
                    <GmapMarker
                        v-for="(
                            item, key
                        ) in registeredPharmacyMarkerSet"
                        :key="key"
                        :icon="setMapIcon('#7B1FA2')"
                        :position="getPosition(item)"
                        :clickable="true"
                        @click="
                            toggleInfoJsonMarker(
                                item.lat,
                                item.lng,
                                item,
                                key
                            )
                        "
                    />

                </GmapMap>


            </v-col>
        </v-row>
    </v-card>
</template>

<script>
import { Agent } from 'http';


export default {
    data: () => ({
        dialogdt:false,
        dialog: false,
        dialogsh: false,
        dialogc: false,
        dialogr: false,
        dialogs: false,
        dialogma: false,
        dialogma2: false,
        infosh: false,
        editdialog: false,
        avatar: false,
        radios: null,
        attrs:false,
        on:false,
        e1: 1,
        checkbox: false,
        tab: null,
        select: [],
        items: [],
        phone: [0],
        rating: 4.5,
        ratingsh: 3,
        rate: "",
        roles: "",
        cstatus: "",
        appst: "",
        appst: ['Accept', 'Pending', 'Reject'],
        status: ['TO DO', 'IN PROGRESS', 'DONE', 'Reject'],
        dialogDelete: false,
        search: "",
        role: ["Agent", "Contractor", "Charted Engineer"],
        gender: ["Male", "Female"],
        show1: false,
        rules: {
            required: (value) => !!value || "Required.",
            min: (v) => v.length >= 8 || "Min 8 characters",
        },
        service: [],
        svs: [
            { header: "Group 1" },
            { name: "Service 1", group: "Group 1" },
            { name: "Service 2", group: "Group 1" },
            { name: "Service 3", group: "Group 1" },
            { name: "Service 4", group: "Group 1" },
            { divider: true },
            { header: "Group 2" },
            { name: "Service 5", group: "Group 2" },
            { name: "Service 6", group: "Group 2" },
            { name: "Service 7", group: "Group 2" },
            { name: "Service 8", group: "Group 2" },
            { divider: true },
            { header: "Group 3" },
            { name: "Service 9", group: "Group 3" },
            { name: "Service 10", group: "Group 3" },
            { name: "Service 11", group: "Group 3" },
            { name: "Service 12", group: "Group 3" },
        ],
        ratingf:["1","2","3","4","5"],
        experience: [
            "1 - 12 Months",
            "1 - 2 Years",
            "2 - 3 Years",
            "3 - 4 Years",
            "4 - 5 Years",
            "Above 5 years",
        ],
        years:[],
        months:[],

        days: [
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday",
            "Sunday",
        ],
        options: {
                controlSize: 21,
                zoomControl: true,
                mapTypeControl: true,
                streetViewControl: true,
                scaleControl: true,
                fullscreenControl: true,
                zoomControlOptions: {
                    position: 7,
                },
                streetViewControlOptions: {
                    position: 7,
                },
                mapTypeControlOptions: {
                    position: 3,
                },
                fullscreenControlOptions: {
                    position: 3,
                },
                scaleControlOptions: {
                    position: 7,
                },
            },
        center: { lat: 7.9708759, lng: 80.2615532 },
        GMap: null,
        mapZoom:7.8,

        infoContent: "",
            infoOpened: false,
            infoOptions: {},
            infoPosition: null,
            infoCurrentKey:0,

            snackbar: false,
            snackMessage: false,
            snackColor: "",
            snackBarTop: true,
            snackBarRight: false,
            overlay: false,

            registeredPharmacyMarkerSet: [],
            registeredPharmacyList:[],
            registeredUsers:[],

            profileImage: '/images/parmacyprofile.png',
      pharmarcyName: 'Maheendra Perera',
      pharmarcyemail: 'maheenrdaperera3@gmail.com',
      pharmarcyaddress: '1234 Main St, Moratuwa',
      pharmarcycontactNumbers: '0711111111, 0772222222',
      pharmarcyRegId: 'Bachelor of Science in Civil Engineering',
      pharmarcyGovRegId: '6 years of experience',
      rating: 4,
      pharmarcyid:null,

        time2: null,
        time3: null,
        menu2: false,
        menu3: false,

        autoUpdate: true,
        isUpdating: false,

        loader: null,
        loading: false,

        watch: {
            isUpdating(val) {
                if (val) {
                    setTimeout(() => (this.isUpdating = false), 3000);
                }
            },
            loader() {
                const l = this.loader;
                this[l] = !this[l];

                setTimeout(() => (this[l] = false), 3000);

                this.loader = null;
            },
            dialog (val) {
                val || this.close()
            },
            dialogDelete (val) {
                val || this.closeDelete()
            },
        },

        headers: [
          {
          text: 'Pharmacy Name',
          align: 'start',
          sortable: false,
          value: 'full_name'
          },
          { text: 'Contact Number', value: 'contact_number', sortable: false },
          { text: 'Mobile Number', value: 'mobile_number', sortable: false },
          { text: 'Status', value: 'status', sortable: false },
          { text: 'Location', value: 'location', sortable: false },
          { text: 'View User', value: 'actions', sortable: false },
        ],

        headerssm:[

          { text: 'Inventory items', value: 'inventory_item_name', sortable: false },
        ],

        pharmacyInventory:[],


            editedItem: {
                id: '',
            datesh: '',
            cname: '',
            cphone: '0',
            appst: '',

            },
            defaultItem: {
                id: '',
            datesh: '',
            cname:'',
            cphone:'0',
            appst: '',
            },

            users: [],
        editedIndex: -1,

        editedItem: {
            name: '',
            phone: '',
            rating: '',

        },
        defaultItem: {
            name: '',
            phone: '',
            rating: '',
        },







    }),

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'Add User' : 'Edit Item'
      },
    },

    created () {
    //   this.initialize();
    //   this.getRegisterPharmacy();
    },

    mounted() {

        this.$refs.mapDiv.$mapPromise.then((map) => {
            this.GMap = map;
            this.initialize();
            this.getRegisterPharmacy();
        });

    },

    methods: {

            getRegisterPharmacy(){
                //alert("ssss");
                axios.get('/api/user/all')
                .then(response => {
                    console.log('dadddddd',response.data.data);
                    this.registeredUsers = response.data.data;
                    console.log('reguser',this.registeredUsers);
                    this.registeredPharmacyList = _.filter(this.registeredUsers,
                        { role: 'pharmacy' });
                    console.log('pharmacy',this.registeredPharmacyList);

                    this.registeredPharmacyMarkerSet = this.registeredPharmacyList
                    console.log('markerphamacyListList',this.registeredPharmacyMarkerSet);

                })
                .catch(error => {
                    this.setSnackbarAlert(error.message,'error');
                    console.log(error);
                });
            },

            viewPharmacyLocation(details) {

            console.log("details", details);
            this.center = this.getPosition(details);
            this.mapZoom = 15;
            },

            setSnackbarAlert(message,colorCode){
                this.snackMessage = message;
                this.snackColor = colorCode;
                this.snackbar =true;
            },

             deactivePharmarcy(){

                let data = {
                "id": this.pharmarcyid,
                }


                axios.post('/api/user/deactive', data)
                    .then(response => {

                        console.log('user_deactive',response.data.data);
                        this.dialogDelete = false;
                        this.editdialog = false;
                        this.getRegisterPharmacy();
                        this.setSnackbarAlert("User Deactive",'success');
                        
                    })
                    .catch(error => {
                        this.setSnackbarAlert(error.message,'error');
                        console.log(error);
                    });

            },

            setMapIcon(color) {
                if (!color) {
                    color = "#FF0000";
                }
                return {
                    path: google.maps.SymbolPath.CIRCLE,
                    scale: 4,
                    fillColor: color,
                    fillOpacity: 0.8,
                    strokeWeight: 0.3,
                    labelOrigin: { x: -7, y: 0 },
                };
            },
        //----------------------get position when lat lng given----------------
            getPosition: function (marker) {
                //alert(marker.lat);
                //alert(marker.longitude);

                let lat = marker.lat,
                    lng = marker.lng;
                return {
                    lat: parseFloat(lat),
                    lng: parseFloat(lng),
                };
            },

            toggleInfoJsonMarker: function (lat, lng, data, key) {
                data = _.omit(data, [
                    "id",
                    "pharmacy_profile",
                    "phamarcy_stock",
                    "role",
                    "image",
                    "lat",
                    "lng",
                    "created_at",
                    "updated_at",
                    "deleted_at",
                ]);
                this.infoPosition = { lat: parseFloat(lat), lng: parseFloat(lng) };
                let contentString =
                    '<div id="iw-container">\n\
                        <div class="iw-content">\
                        <div class="v-data-table  v-data-table--dense v-data-table--fixed-height theme--light">\
                        <div class="v-data-table__wrapper pane scroller">' +
                    '<table class="infoMain">';

                //----------------------looping through the json object property--------------------------
                $.each(data, function (key, value) {
                    // console.log(key + "/" + value );
                    contentString +=
                        '<tr  style="white-space: nowrap;">' +
                        '<td class="leftInfo"><b>' +
                        key +
                        "</b></td>" +
                        '<td class="rightInfo">' +
                        value +
                        "</td>" +
                        "</tr>";
                });

                contentString +=
                    "<div>" + "</table>\n\
                </div></div></div></div>";

                this.infoOptions = {
                    pixelOffset: {
                        width: 0,
                        height: -10,
                    },
                    content: contentString,
                };

                if (this.infoCurrentKey == key) {
                    this.infoOpened = !this.infoOpened;
                } else {
                    this.infoOpened = true;
                    this.infoCurrentKey = key;
                }
            },

            getColora (appst) {
            if (appst == 'Reject') return 'red'
            else if (appst == 'Accept') return 'success'
            else return 'orange'
            },

            getColor (status) {
                if (status == 'Reject') return 'error'
                else if (status == 'DONE') return 'success'
                else if (status == 'TO DO') return '#FFA726'
                else return '#64B5F6'
            },

            initialize () {
                this.users = [
                {
                    name: 'Maheendra Perera',
                    phone: ['0711111111', '0772222222'],
                    service: ['Service 1', 'Service 2', 'Service 3'],
                },
                {
                    name: 'Dasun Shanaka',
                    phone: ['0711234567', '0118976347'],
                    service: ['Service 1', 'Service 2', 'Service 3'],
                },
                {
                    name: 'Savin Sathsara',
                    phone: ['0475656432', '0112346783'],
                    service: ['Service 1', 'Service 2', 'Service 3'],
                },
                {
                    name: 'Virat Kohli',
                    phone: ['0765445678', '0338765628'],
                    service: ['Service 1', 'Service 2', 'Service 3'],
                },
                {
                    name: 'Kaveen Savindra',
                    phone: ['0745676589','0774567892'],
                    service: ['Service 1', 'Service 2', 'Service 3'],
                },
                {
                    name: 'Praveena Leo',
                    phone: ['071126666 '],
                    service: ['Service 1', 'Service 2', 'Service 3'],
                },
                {
                    name: 'Uvindu Rihan',
                    phone: ['0786572829', '0779876543'],
                    service: ['Service 1', 'Service 2', 'Service 3'],
                },
                {
                    name: 'Indika Bandara',
                    phone: ['0711234563', '0702345678'],
                    service: ['Service 1', 'Service 2', 'Service 3'],
                },
                {
                    name: 'Pahan Ransilu',
                    phone: ['0775674563', '0781234567'],
                    service: ['Service 1', 'Service 2', 'Service 3'],

                },
                {
                    name: 'Hiran Kavinga',
                    phone: ['0704567892', '0771234567'],
                    service: ['Service 1', 'Service 2', 'Service 3'],

                },
                ]
                this.servicehistory = [
                {
                    id: 'cus39-ag18-136',
                    datesh: '10/27/2022',
                    cname:'A.Ishara',
                    cphone:'0782567019',
                    appst: 'Accept',
                    status: 'TO DO'

                },

                {
                    id: 'cus52-co36-137',
                    datesh: '11/6/2022',
                    cname:'H.I. Hardik',
                    cphone:'0711245876',
                    appst: 'Accept',
                    status: 'TO DO'

                },

                {
                    id: 'cus72-ag17-138',
                    datesh: '11/8/2022',
                    cname:'G.I. Derik',
                    cphone:'0777245876',
                    appst: 'Accept',
                    status: 'IN PROGRESS'

                },

                {
                    id: 'cus52-co36-139',
                    datesh: '11/9/2022',
                    cname:'C. Andare',
                    cphone:'0701523456',
                    appst: 'Accept',
                    status: 'DONE'

                },

                {
                    id: 'cus172-ce6-140',
                    datesh: '11/29/2022',
                    cname:'H.I. Hardik',
                    cphone:'0717775876',
                    appst: 'Pending',
                    status: 'IN PROGRESS'
                },

                {
                    id: 'cus45-ag23-141',
                    datesh: '11/29/2022',
                    cname:'P.H.Mahi',
                    cphone:'0788888876',
                    appst: 'Accept',
                    status: 'DONE'

                },

                {
                    id: 'cus21-ag23-142',
                    datesh: '12/2/2022',
                    cname:'J.kasun',
                    cphone:'0777245996',
                    appst: 'Accept',
                    status: 'TO DO'

                },

                {
                    id: 'cus278-ag9-143',
                    datesh: '12/20/2022',
                    cname:'R.V. Dasun',
                    cphone:'0711246666',
                    appst: 'Accept',
                    status: 'DONE'

                },

                {
                    id: 'cus13-co12-144',
                    datesh: '12/29/2022',
                    cname:'Q. Fonseka',
                    cphone:'048245876',
                    appst: 'Reject',
                    status: 'Reject'

                },

                {
                    id: 'cus45-ag23-145',
                    datesh: '1/2/2023',
                    cname:'O.Osanda',
                    cphone:'0719856240',
                    appst: 'Accept',
                    status: 'DONE'

                },



                ]
            },

            editItem (item) {
                this.editedIndex = this.users.indexOf(item)
                this.editedItem = Object.assign({}, item)
                this.dialog = true
            },

            editUser (item) {
                // this.editedIndex = this.users.indexOf(item)
                // this.editedItem = Object.assign({}, item)
                this.pharmarcyid = item.id;
                this.pharmarcyName= item.full_name;
                this.pharmarcyemail= item.email;
                this.pharmarcyaddress= item.street_address;
                this.pharmarcycontactNumbers= item.contact_number;
                this.pharmarcyRegId= item.pharmacy_profile.pharmacy_reg_id;
                this.pharmarcyGovRegId= item.pharmacy_profile.gaverment_registration_id;
                console.log("item",item.phamarcy_stock);
                this.pharmacyInventory = item.phamarcy_stock;

                this.editdialog = true
            },

            resetPassword(){
                let data = {
                    "id":this.pharmarcyid,
                    "email" : this.pharmarcyemail,
                    "password" : "Abcdef@123"
                }

                axios.post('/api/user/resetPassword', data)
                    .then(response => {

                      // // console.log('email send',response.data.data);
                        this.setSnackbarAlert('success','email sended');
                    })
                    .catch(error => {
                        this.setSnackbarAlert(error.message,'error');
                        console.log(error);
                    });


            },

            addUser (item) {
                this.editedIndex = this.users.indexOf(item)
                this.editedItem = Object.assign({}, item)
                this.editdialog1 = true
            },

            deleteItem (item) {
                this.editedIndex = this.users.indexOf(item)
                this.editedItem = Object.assign({}, item)
                this.dialogDelete = true
            },

            deleteItemConfirm () {
                this.users.splice(this.editedIndex, 1)
                this.closeDelete()
            },

            close () {
                this.dialog = false
                this.$nextTick(() => {
                this.editedItem = Object.assign({}, this.defaultItem)
                this.editedIndex = -1
                })
            },

            closeDelete () {
                this.dialogDelete = false
                this.$nextTick(() => {
                this.editedItem = Object.assign({}, this.defaultItem)
                this.editedIndex = -1
                })
            },

            save () {
                if (this.editedIndex > -1) {
                Object.assign(this.users[this.editedIndex], this.editedItem)
                } else {
                this.users.push(this.editedItem)
                }
                this.close()
            },
    },

};

</script>

<style>

.custom-loader {
    animation: loader 1s infinite;
    display: flex;
}
body {
  overflow: hidden;
}
.bg {
    background-image: url("/images/background.jpg");
    background-size: cover;
    background-position: center center;
 }
 .border {
  border: 2px solid #333;
 }
@-moz-keyframes loader {
    from {
        transform: rotate(0);
    }
    to {
        transform: rotate(360deg);
    }
}
@-webkit-keyframes loader {
    from {
        transform: rotate(0);
    }
    to {
        transform: rotate(360deg);
    }
}
@-o-keyframes loader {
    from {
        transform: rotate(0);
    }
    to {
        transform: rotate(360deg);
    }
}
@keyframes loader {
    from {
        transform: rotate(0);
    }
    to {
        transform: rotate(360deg);
    }
}
</style>
