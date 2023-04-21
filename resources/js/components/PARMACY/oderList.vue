    <template>
        <v-row no-gutters >
            <v-col cols="12" xl="7" lg="7" md="12" sm="12" xs="12">
                <v-card height='100%' justify="center" class="pa-5" flat>
                    <v-row no-gutters>

                        <v-col cols="12" xl="12" lg="12" md="12" sm="12" xs="12" class="mt-3 mx-auto rounded- align-center text-center">
                            <v-card style="background-color: #424242;">
                                <v-card flat>
                                    <v-data-table
                                        :headers="pharmarOderheaders"
                                        :search="search"
                                        :items-per-page="5"
                                        :items="pharmarcyOderList"
                                        dense
                                        flat
                                        class="elevation-1"
                                        >

                                        <template v-slot:item.actions="{ item }">
                                        <v-btn
                                            class="white--text"
                                            @click="viewOder(item)"
                                            color="#34726f"
                                            dark
                                            x-small
                                            dense
                                            ><v-icon
                                                x-small
                                                dense
                                                class="white--text"
                                            >
                                                mdi-note
                                            </v-icon>
                                            <strong>&nbsp;Order</strong>
                                        </v-btn>

                                        <v-btn
                                            color="blue"
                                            elevation="2"
                                            outlined
                                            rounded
                                            x-small
                                            @click="
                                                viewLocation(item)
                                            "
                                        >
                                            View
                                        </v-btn>
                                    </template>


                                    </v-data-table>
                                </v-card>
                            </v-card>



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
                                    ) in pharmarcyOderList"
                                    :key="key"
                                    :icon="setMapIcon()"
                                    :position="getPosition(item)"
                                    :clickable="false"
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

            <v-dialog v-model="orderListDialog">
                <v-row>
                    <v-col cols="7">
                        <v-img src="/path/to/image.jpg" height="100%" contain></v-img>
                    </v-col>
                    <v-col cols="5">
                        <v-card>
                        <v-card-title>Create Order</v-card-title>
                        <v-card-text>
                            <v-select
                                :items="
                                    subcategoryList
                                "
                                v-model="sub_category"
                                label="Item name"
                                solo
                                dense
                            >
                            </v-select>
                            <v-text-field
                                solo
                                label="Quantity"
                                clearable
                                dense
                                v-model="quantity"
                            ></v-text-field>
                            <v-text-field
                                solo
                                label="Price"
                                clearable
                                dense
                                v-model="price"
                            ></v-text-field>
                            <v-btn @click="addItem">Add</v-btn>
                        </v-card-text>
                        </v-card>
                        <v-data-table :headers="headers" :items="tabelOrderCreate">
                            <template v-slot:item.action="{ item }">
                            <v-btn icon @click="removeItem(item)">
                                <v-icon color="error">mdi-delete</v-icon>
                            </v-btn>
                            </template>
                        </v-data-table>
                        <v-card>
                            <v-card-text><h2>Total amount: {{ total }}</h2></v-card-text>
                        </v-card>
                    </v-col>
                </v-row>
            </v-dialog>

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
                    orderImage:'',
                    orderListDialog :false,
                    user_id:'',
                    id:'',

                    quantity: 0,
                    price: 0,

                    headers: [
                        { text: 'Item name', value: 'sub_category' },
                        { text: 'Quantity', value: 'quantity' },
                        { text: 'Price', value: 'price' },
                        { text: 'Action', value: 'action' }
                    ],
                    tabelOrderCreate: [],

                    item_name:null,

                    pharmarOderheaders: [
                    {
                    text: 'Order Id',
                    align: 'start',
                    sortable: false,
                    value: 'id'
                    },
                    { text: 'Status', value: 'oder_status', sortable: false },
                    { text: 'Action', value: 'actions', sortable: false },
                    ],

                    pharmarcyOderList:[],

                    subcategoryList:[],


                    deleteItemDialog:false,

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

                    inventory_item_data:[],
                    sub_category:null,

                }
            },
            watch: {

            },
            created(){
                this.getSubCategory();

            },
            computed: {
                total() {
                    return this.tabelOrderCreate.reduce((total, item) => {
                        return total + parseFloat(item.price)
                    }, 0)
                    }
            },

            mounted() {

            this.$refs.mapDiv.$mapPromise.then((map) => {
                this.GMap = map;
                this.initialize();
            });

            },

            methods: {
                initialize() {
                    let data ={
                        "pharmacy_id" :1,

                    }

                axios.post('/api/pharmacy/order',data)
                .then(response => {

                    this.pharmarcyOderList = response.data.data;
                    console.log('pharmarcyOderList',response.data.data);
                })
                .catch(error => {
                    this.setSnackbarAlert(error.message,'error');
                    console.log(error);
                });
            },

            addItem() {
            this.tabelOrderCreate.push({
                sub_category: this.sub_category,
                quantity: this.quantity,
                price: this.price,
            })
            // this.sub_category = ''
            // this.quantity = ''
            // this.price = ''
            },
            removeItem(item) {
            const index = this.tabelOrderCreate.indexOf(item)
            this.tabelOrderCreate.splice(index, 1)
            },

            viewOder(details){
                this.orderImage = details.image_path;
                this.orderListDialog = true;
            },

            viewLocation(details) {

            console.log("details", details);
            this.center = this.getPosition(details);
            this.mapZoom = 15;
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


            },


        }
    </script>
    <style>
    .user-profile-card {
      max-width: 800px;
      margin: 0 auto;
    }
    </style>
