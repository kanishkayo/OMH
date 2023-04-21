<template>

    <v-row>
        <v-overlay :value="overlay">
            <v-progress-circular indeterminate size="64"></v-progress-circular>
        </v-overlay>
        <v-col cols="4">
            <v-card tile solo dense width="100%" class="div-height overflow-y-auto " max-height="700">
                <v-card-title>
                    <v-row no-gutters>
                        <v-tooltip left>
                            <template v-slot:activator="{ on, attrs }">
                                <v-btn
                                    icon
                                    class="my-0"
                                    v-bind="attrs"
                                    @click="resetForm"
                                    v-on="on"
                                    justify="center"
                                >
                                    <v-icon>mdi-refresh</v-icon>
                                </v-btn>
                            </template>
                            <span>Refresh Form</span>
                        </v-tooltip>
                    </v-row>
                </v-card-title>
                <v-card-text class="mb-0 pb-0">
                    <v-form
                        ref="pharmacyRegisterForm"
                        lazy-validation
                        method="post"
                    >
                        <v-row no-gutters >
                            <v-col
                                cols="12"
                                xs="10"
                                sm="10"
                                md="10"
                                lg="10"
                                xl="10"
                                class="pb-0 mb-0"
                            >
                                <v-text-field
                                    filled
                                    dense
                                    v-model="projectFormData.pharmacy_name"
                                    outlined
                                    label="Pharmacy Name"
                                    class="pb-0 mb-0"
                                ></v-text-field>
                                <v-text-field
                                    dense
                                    v-model="projectFormData.pharmacy_reg_id"
                                    outlined
                                    label="Pharmacy Id"
                                    :rules="[
                                        (v) =>
                                            !!v || 'Pharmacy Id is required',
                                    ]"
                                    clearable
                                    class="pb-0 mb-0"
                                ></v-text-field>
                                <v-text-field
                                    dense
                                    v-model="projectFormData.gaverment_registration_id"
                                    outlined
                                    label="Government Registration Id"
                                    :rules="[
                                        (v) =>
                                            !!v || 'Government Registration Id is required',
                                    ]"
                                    class="pb-0 mb-0"
                                ></v-text-field>

                                <v-text-field
                                    dense
                                    v-model="
                                        projectFormData.proprietors_name
                                    "
                                    outlined
                                    label="Proprietor's Name"
                                    class="pb-0 mb-0"
                                    :rules="[
(v) => !!v && /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/.test(v) || 'Name is required and must be valid'
                                    ]"
                                ></v-text-field>
                                <v-text-field
                                    dense
                                    v-model="
                                        projectFormData.nic
                                    "
                                    outlined
                                    label="NIC"
                                    class="pb-0 mb-0"
                                    placeholder="843522345V or 198435671817"
                                    :rules="[
                                (v) => !!v || 'NIC Number is required',
                                (v) => v.length <= 10 ? /^([0-9]{9})(X|V)$/.test
                                    (v) || 'old NIC must be as 9 digits with V or X (xxxxxxxxx V/X ) OR new NIC must be 12 digits' : /^[0-9]{12}$/.test
                                        (v) || 'old NIC must be as 9 digits with v (xxxxxxxxxv) OR new NIC must be 12 digits'
                                                                                ] "
                                ></v-text-field>
                                <v-text-field
                                    dense
                                    v-model="
                                        projectFormData.pharmacy_address
                                    "
                                    outlined
                                    label="Pharmacy Address"
                                    class="pb-0 mb-0"
                                ></v-text-field>
                                <v-text-field
                                    dense
                                    v-model="
                                        projectFormData.district
                                    "
                                    outlined
                                    label="District"
                                    class="pb-0 mb-0"
                                ></v-text-field>
                                <v-text-field
                                    dense
                                    v-model="
                                        projectFormData.city
                                    "
                                    outlined
                                    label="City"
                                    class="pb-0 mb-0"
                                ></v-text-field>
                                <v-text-field
                                    dense
                                    v-model="
                                        projectFormData.contact_number
                                    "
                                    outlined
                                    label="Contact Number"
                                    :rules="[
                                        (v) => /^\d{10}$/.test(v) || 'Invalid contact number'
                                    ]"
                                   
                                    class="pb-0 mb-0"
                                ></v-text-field>
                                <v-text-field
                                    dense
                                    v-model="
                                        projectFormData.mobile_number
                                    "
                                    outlined
                                    label="Mobile Number"
                                    :rules="[
                                        (v) => /^\d{10}$/.test(v) || 'Invalid Mobile number'
                                    ]"
                                    class="pb-0 mb-0"
                                ></v-text-field>
                                <v-text-field
                                    dense
                                    v-model="
                                        projectFormData.email
                                    "
                                    placeholder="example@gmail.com"
                                    outlined
                                    
                                    label="Email"
                                    class="pb-0 mb-0"
                                    :rules="[(v) => !!v || 'Email is required', (v) =>  /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail must be valid',]"
                                    
                                ></v-text-field>

                                <v-tooltip bottom>
                                    <template v-slot:activator="{ on, attrs }">
                                        <v-text-field
                                            v-bind="attrs"
                                            v-on="on"
                                            dense
                                            v-model="
                                                projectFormData.google_address
                                            "
                                            readonly
                                            outlined
                                            label="Locations"
                                            prepend-inner-icon="mdi-map-marker"
                                            :rules="[
                                                (v) =>
                                                    !!v ||
                                                    'Locations is required',
                                            ]"
                                            class="pb-0 mb-0"
                                        >
                                        </v-text-field>
                                    </template>
                                    <span>Click Map</span>
                                </v-tooltip>
                            </v-col>


                        </v-row>



                        <v-row class="px-15 pb-5" >
                            <v-spacer></v-spacer>
                            <v-btn
                                dark
                                color="blue darken-4"
                                tile
                                solo
                                dense
                                small
                                @click="pharmacyRegistering"
                            >
                                <v-icon small dark left
                                    >mdi-content-save-outline</v-icon
                                >
                                &nbsp;Save
                            </v-btn>
                        </v-row>

                    </v-form>

                </v-card-text>
            </v-card>
        </v-col>

        <v-col cols="8" class="mx-auto rounded-align-center text-center" >

                <GmapMap
                    style="width: 100% !important;height: 95vh !important; "
                    :options="options"
                    :center="center"
                    :zoom="7.8"
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
  </template>

<script>

export default {
        data () {
          return {
            projectFormData: {
                id: "newPharmacy",
                pharmacy_name: null,
                pharmacy_reg_id: null,
                gaverment_registration_id: null,
                proprietors_name: null,
                pharmacy_address: null,
                contact_number: null,
                nic:null,
                mobile_number: null,
                email: null,
                lat: null,
                lng: null,
                google_address: null,
                gndName: null,
                district: null,
                city: null,
            },

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

            e1: 1,
            show1: false,
            radios: null,
            tab: null,
            dialogdt: false,
            rules: {
              required: value => !!value || 'Required.',
              min: v => v.length >= 8 || 'Min 8 characters',
            },




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
          menu2: false,
          menu3: false,
          time: null,
          time2: null,
          timeStart:"",


           }
        },

        watch: {

        },
        mounted() {
            this.$refs.mapDiv.$mapPromise.then((map) => {
                this.GMap = map;
                // store.commit('setMap',map);
                // this.mapClickListenerCollector();
                this.init();
            // this.mapsearch(map);
            this.getRegisterPharmacy();

            });



        },
        methods: {


            pharmacyRegistering(){
                //alert("test");
               if (this.$refs.pharmacyRegisterForm.validate()) {
                    this.overlay = true;
                    const data = {
                        userDetails:{
                            full_name:this.projectFormData.proprietors_name,
                            email: this.projectFormData.email,
                            role:"pharmacy",
                            section:"pharmacy",
                            image:"",
                            nic:this.projectFormData.nic,
                            contact_number: this.projectFormData.contact_number,
                            mobile_number: this.projectFormData.mobile_number,
                            lat: this.projectFormData.lat,
                            lng: this.projectFormData.lng,
                            street_address:this.projectFormData.pharmacy_address,
                            google_address: this.projectFormData.google_address,
                            province:"Southern Province",
                            district: this.projectFormData.district,
                            city: this.projectFormData.city,
                            status: 'ACTIVE',
                            password: "Abcdef@123",
                            password_confirmation: "Abcdef@123",
                        },
                        pharmacyProfile:{
                            pharmacy_name: this.projectFormData.pharmacy_name,
                            pharmacy_reg_id: this.projectFormData.pharmacy_reg_id,
                            gaverment_registration_id: this.projectFormData.gaverment_registration_id,
                            proprietors_name: this.projectFormData.proprietors_name,
                            pharmacy_address: this.projectFormData.pharmacy_address,
                            contact_number: this.projectFormData.contact_number,
                            mobile_number: this.projectFormData.mobile_number,
                            email: this.projectFormData.email,
                            lat: this.projectFormData.lat,
                            lng: this.projectFormData.lng,
                            google_address: this.projectFormData.google_address,
                            province:"Southern Province",
                            district: this.projectFormData.district,

                        }

                    };

                    axios.post('/api/user/register', data).then(response => {
                       // alert('Form submitted successfully!');
                        this.setSnackbarAlert(response.data.message,'success');
                        this.getRegisterPharmacy();
                        this.overlay = false;

                    })
                    .catch(error => {

                        if (error.response) {
                            // handle response error status code
                            console.log('data',error.response.data);
                            console.log('status',error.response.status);
                            console.log('heder',error.response.headers);

                            this.setSnackbarAlert(error.response.data.message +':'+error.response.data.errors.validator['email'],'error');


                        } else if (error.request) {
                            // handle request error
                            console.log('request',error.request);
                            this.setSnackbarAlert(error.request,'error');

                        } else {
                            // handle other errors
                            console.log('Error', error.message);
                            this.setSnackbarAlert(error.message,'error');

                        }

                        this.overlay = false;
                    });

               }
            },

            getRegisterPharmacy(){
                //alert("ssss");
                axios.get('/api/user/all')
                .then(response => {
                    console.log('dadddddd',response.data.data);
                    this.registeredUsers = response.data.data;
                    console.log('reguser',this.registeredUsers);
                    this.registeredPharmacyList = _.filter(this.registeredUsers,
                        { role: 'pharmacy' });
                    console.log('regAgent',this.registeredPharmacyList);

                    this.registeredPharmacyMarkerSet = this.registeredPharmacyList
                    console.log('markeragentList',this.registeredPharmacyMarkerSet);
                })
                .catch(error => {
                    this.setSnackbarAlert(error.message,'error');
                    console.log(error);
                });
            },

            resetForm() {
                this.projectFormData.lat = null;
                this.projectFormData.lng = null;
                this.projectFormData.id = "newProject";
                this.projectFormData.pharmacy_reg_id = null;
                this.projectFormData.pharmacy_name = null,
                this.projectFormData.gaverment_registration_id = null;
                this.projectFormData.proprietors_name = null;
                this.projectFormData.pharmacy_address = null;
                this.projectFormData.contact_number = null;
                this.projectFormData.mobile_number = null;
                this.projectFormData.google_address = null;
                this.projectFormData.gndName = null;
                this.projectFormData.province = null;
                this.projectFormData.district = null;
                this.projectFormData.dsd = null;
                this.projectFormData.email = null;
                this.projectLetter = null;
                this.initialize();
                this.$refs.form.resetValidation();
                if (this.marker) {
                    this.marker.setMap(null);
                }
            },

            initialize(){
                alert("test");
            },

            setSnackbarAlert(message,colorCode){
                this.snackMessage = message;
                this.snackColor = colorCode;
                this.snackbar =true;
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

            init() {
                //let imageSet = "../../images/1.png";
                // let marker=null;
                let that = this;
                let map = that.GMap;

                console.log("map data", map);
                google.maps.event.addListener(map, "click", function (event) {
                    //   alert(event.latLng.lat());

                    //----------------------Reverse Geocode---------------------------------
                    let geocoder = new google.maps.Geocoder();
                    that.projectFormData.lat = event.latLng.lat();
                    that.projectFormData.lng = event.latLng.lng();

                    geocoder.geocode(
                        {
                            location: {
                                lat: event.latLng.lat(),
                                lng: event.latLng.lng(),
                            },
                        },
                        function (results, status) {
                            if (status === "OK") {
                                if (results[0]) {
                                    //that.google_address = results[0].formatted_address;
                                    // alert( results[0].formatted_address)
                                    that.projectFormData.google_address =
                                        results[0].formatted_address;

                                    if (that.marker) {
                                        that.marker.setMap(null);
                                    }
                                    that.marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(
                                            that.projectFormData.lat,
                                            that.projectFormData.lng
                                        ),
                                        map: map,
                                        icon: that.setMapIcon('red'),
                                        title: results[0].address_components[1][
                                            "long_name"
                                        ],
                                    });

                                    // let payload = {
                                    //     lat : event.latLng.lat(),
                                    //     lng : event.latLng.lng(),
                                    //     address: results[0].formatted_address
                                    // }
                                    // store.commit('setcurrentLocation',payload);
                                } else {
                                    that.snackMessage = "No Result found";
                                    that.snackbar = true;
                                    that.addLocationToDataset();
                                }
                                // let infowindow =  new google.maps.InfoWindow({});
                                // infowindow.open(map, marker);
                            } else {
                                that.snackMessage = "Geocode Error !";
                                that.snackbar = true;
                                that.addLocationToDataset();
                            }
                        }
                    );
                });
            },

        },
      }
</script>

<style>
body {
  overflow: hidden;
}
</style>
