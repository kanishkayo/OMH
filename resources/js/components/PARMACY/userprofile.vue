    <template>
        <v-row no-gutters >
            <v-col cols="12" xl="7" lg="7" md="12" sm="12" xs="12">
                <v-card height='100%' width='600px' justify="center" class="pa-5" flat>
                    <v-row no-gutters>
                        <v-col xl="12" lg="12" md="12" sm="12" xs="12">

                                    <v-toolbar
                                        dark
                                        color="#34726f"
                                        dense
                                        height="36%"
                                    >
                                        <v-toolbar-title
                                            class="headline"
                                            style="margin-right: 30px"
                                        >
                                            <span
                                                class="font-weight-bold text--sm white--text"
                                            >
                                                Add Pharmacy Stock
                                            </span>
                                        </v-toolbar-title>
                                    </v-toolbar>

                                    <v-card
                                        style="
                                            background-color: rgba(52,114,111,0.1);
                                        "
                                    >
                                        <v-card-text>
                                            <v-container>



                                                <v-row
                                                    justify="space-around"
                                                    no-gutters
                                                >
                                                    <v-col cols="12">
                                                        <v-select
                                                            :items="
                                                                subcategoryList
                                                            "
                                                            v-model="sub_category"
                                                            label="Item name"
                                                            solo
                                                            dense
                                                        ></v-select>
                                                    </v-col>
                                                </v-row>




                                                <v-row
                                                    justify="space-around"
                                                    no-gutters
                                                >
                                                    <v-col cols="12">
                                                        <v-text-field
                                                            solo
                                                            label="Stock"
                                                            clearable
                                                            dense
                                                            v-model="item_stock"

                                                        ></v-text-field>
                                                    </v-col>
                                                </v-row>

                                                <v-card-actions dense>
                                                    <v-spacer></v-spacer>
                                                    <!-- <v-btn
                                                        depressed
                                                        color="#424242"
                                                        dense
                                                        small
                                                        text
                                                        @click="clearForm()"

                                                    >
                                                        Clear
                                                    </v-btn> -->

                                                    <v-btn
                                                        depressed
                                                        color="#34726f"
                                                        dense
                                                        small
                                                        dark
                                                        @click="addInventoryItem()"
                                                    >
                                                        Save
                                                    </v-btn>
                                                </v-card-actions>
                                            </v-container>
                                        </v-card-text>
                                    </v-card>

                        </v-col>
                        <v-col cols="12" xl="12" lg="12" md="12" sm="12" xs="12" class="mt-3 mx-auto rounded- align-center text-center">
                            <v-card style="background-color: #424242;">
                                <v-card flat>
                                    <v-data-table
                                        :headers="pharmarcyStockheaders"
                                        :search="search"
                                        :items-per-page="5"
                                        :items="pharmarcyStock"
                                        dense
                                        flat
                                        class="elevation-1"
                                        >



                                        <template v-slot:item.actions="{ item }">

                                            <v-btn
                                                class="mr-2 white--text"
                                                @click="deletePharmacyItem(item)"
                                                color="red"
                                                v-bind="attrs"
                                                v-on="on"
                                                dense                                                                                dark
                                                x-small
                                            ><v-icon dense class="white--text" x-small>
                                                mdi-delete </v-icon>
                                                <strong>&nbsp; Delete</strong>
                                            </v-btn>

                                        </template>


                                    </v-data-table>
                                </v-card>
                            </v-card>

                            <v-dialog v-model="deleteItemDialog" max-width="290">
                                <v-card>
                                    <v-card-title class="headline">Confirm Deletion</v-card-title>
                                    <v-card-text>
                                        Are you sure you want to delete this item?
                                    </v-card-text>
                                    <v-card-actions>
                                        <v-btn color="green darken-1" text @click="deleteItemDialog = false">Cancel</v-btn>
                                        <v-btn color="error" text @click="deleteItem()">Delete</v-btn>
                                    </v-card-actions>
                                </v-card>
                            </v-dialog>

                        </v-col>
                    </v-row>
                </v-card>
            </v-col>
            <v-col cols="12" xl="5" lg="5" md="12" sm="12" xs="12">
                        <v-card class="mx-3 mt-3 pa-3" :elevation="6" style="height:100%;">
                            <GmapMap
                                style="width: 100% !important; height: 85vh !important;"
                                :options="options"
                                :center="center"
                                :zoom="mapZoom"
                                ref="mapDiv"
                            >

                                <div
                                id="searchBarDiv"
                                style="margin-top: 10px;margin-left:30px;"
                                >
                                    <v-toolbar dense floating v-show="setmapSearchBar">
                                        <v-text-field
                                            hide-details
                                            placeholder="Search Address"
                                            single-line
                                            class="address_complete"
                                            v-model="searchAddress"
                                            id="search_address"
                                        >
                                        </v-text-field>

                                        <!--<v-btn icon @click="locateCurrentLocation">
                                            <v-icon>my_location</v-icon>
                                        </v-btn>-->
                                    </v-toolbar>
                                </div>
                                <div
                                id="keyMap"
                                style="margin-bottom: 50px; margin-left:20px;"
                                >
                                <table style="background-color:#424242; padding: 0; margin: 0;">
                                    <tr>
                                        <td style="padding:0; margin:0;"><v-img src="/images/techMarker.png"></v-img></td>
                                        <td style="padding:1; margin:0;" class="white--text"><h3>Tec Officer of Registered </h3></td>
                                    </tr>
                                </table>

                                <v-btn
                                color="success"
                                fab
                                x-small
                                dark
                                @click="getRegisteredAgent"
                                >
                                reset
                                </v-btn>

                                </div>
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
                                    ) in visualizeRegTecOfficerTbAndMap"
                                    :key="key"
                                    :icon="markerImg"
                                    :position="getPosition(item)"
                                    :clickable="true"
                                    :title="item.phone_number"
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
                        </v-card>
            </v-col>
        </v-row>
    </template>
    <script>
    import { mapState } from 'vuex';
    import { store } from "../store/store";
        export default {
            name: "profile",

            components:{
                store,
            },

            data() {
                return {
                    user:[],
                    subcategoryList:[],
                    sub_category:null,

                    item_stock:0,

                    pharmarcyStock:[],
                    pharmarcyStockheaders: [
                    {
                    text: 'Item Name',
                    align: 'start',
                    sortable: false,
                    value: 'inventory_item_name'
                    },
                    { text: 'Stock', value: 'stock', sortable: false },
                    { text: 'Action', value: 'actions', sortable: false },
                    ],

                    user_id:'',
                    id:'',

                    item_name:null,

                    userRegFormData:{

                    lat:null,
                    lng:null,
                    street_address: null,
                    google_address: null,
                    province:null,
                    district: null,



                    },

                    deleteItemDialog:false,

                    markerImg: "../../images/techMarker.png",
                    snackbar: false,
                    snackMessage: false,
                    snackColor: "",
                    snackBarTop: true,
                    snackBarRight: false,
                    overlay: false,

                    searchAddress: null,

                    inventory_item_data:[],


                    infoContent: "",
                    infoOpened: false,
                    infoOptions: {},
                    infoPosition: null,
                    infoCurrentKey:0,

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



                    search: '',

                }
            },
            watch: {

            },
            created(){
                this.checkLoging();
                this.getSubCategory();

            },
            computed: {

            },

            mounted() {


            },

            methods: {

                checkLoging() {

                let user = localStorage.getItem("user");

                user = JSON.parse(user);
               // alert(user.role);
                if (user.role !== "pharmacy") {
                    this.$router.back();
                } else {
                    this.user_id = user.id;
                   // alert(user_id);
                    this.user = user;
                    this.getuserStock(this.user_id);

                }
                },

                getSubCategory(){
                    axios.post(`/api/pharmacy/getitemname/`)
                    .then(response => {


                        console.log("get Inventry Item",response.data.data)

                        this.inventory_item_data = response.data.data;

                        let data = [];
                        $.each(this.inventory_item_data,function(key,val){
                            console.log('val',val);
                            data.push(val.id+'_'+val.item_name);
                        });

                        this.subcategoryList = data;


                    })
                    .catch(error => {
                        console.error(error);
                    });
                },

                deletePharmacyItem(item){

                   // alert(item.id);
                    this.item_id = item.id;

                    this.deleteItemDialog = true;

                },

                deleteItem(){

                    let data ={

                        item_id :this.item_id,

                        }

                    axios.post("/api/pharmacy/stockdele",data)
                    .then(response => {

                        this.getuserStock(this.user_id);
                        this.deleteItemDialog = false;
                      // alert("ssss");
                       // console.log("aaaaaa",this.pharmarcyStock)

                    })
                    .catch(error => {
                        console.error(error);
                    });

                },

                getuserStock(id){
                   // alert(id);
                    axios.get(`/api/pharmacy/stock/${id}`)
                    .then(response => {

                        this.pharmarcyStock = response.data.data;
                        console.log("aaaaaa",this.pharmarcyStock)

                    })
                    .catch(error => {
                        console.error(error);
                    });
                },

                setSnackbarAlert(message,colorCode){
                this.snackMessage = message;
                this.snackColor = colorCode;
                this.snackbar =true;
                 },

                addInventoryItem(){

                    let parts = this.sub_category.split('_');

                    let data ={

                        moh_inventory_id :parts[0],
                        inventory_item_name:parts[1],
                        stock:this.item_stock,
                        pharmacy_id  : this.user_id,

                    }

                    // let serviceList = []

                    // $.each(this.servicesValues,function(key,val){
                    //     let parts = val.split('_')
                    //     serviceList.push({
                    //         "leco_services_id": parts[0],
                    //         "services_name": parts[1],

                    //     });
                    // });

                    axios.post('/api/pharmacy/addinventory', data).then(response => {
                       // alert('Form submitted successfully!');
                        this.setSnackbarAlert(response.data.message,'success');

                        this.getuserStock(this.user_id);

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

                    });

                }
            },


        }
    </script>
    <style>
    .user-profile-card {
      max-width: 800px;
      margin: 0 auto;
    }
    </style>
