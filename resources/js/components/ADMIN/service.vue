<template>
    <div id="app">
        <v-app id="inspire">
            <v-row class="bg pa-4 pb-0" >
                <v-overlay :value="overlay">
            <v-progress-circular indeterminate size="64"></v-progress-circular>
        </v-overlay>

                <v-col cols="12" lg="4" md="4" sm="12">
                    <v-card style=" height=100%;
                                background-color: #424242;
                            " >
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
                                    Add Inventory Items
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
                                            <v-text-field
                                                solo
                                                label="Item name"
                                                clearable
                                                dense
                                                v-model="item_name"

                                            ></v-text-field>
                                        </v-col>
                                    </v-row>

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
                                                label="Sub category"
                                                solo
                                                dense
                                            ></v-select>
                                        </v-col>
                                    </v-row>

                                    <v-card-actions dense>
                                        <v-spacer></v-spacer>
                                        <v-btn
                                            depressed
                                            color="white"
                                            dense
                                            small
                                            text
                                            @click="clearForm()"

                                        >
                                            Clear
                                        </v-btn>

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
                    </v-card>
                </v-col>
                <v-col cols="12" lg="8" md="8" sm="12">
                    <v-card height="600"
                    >
                    <v-responsive class="overflow-y-auto" max-height="600">

                        <v-row class=" mt-3 mb-0"  justify="space-around" no-gutters dense>




                                                           </v-row>

                                                           <v-row class=" mt-0"  justify="space-around" no-gutters dense>
                                                               <v-col
                                                               cols="12" xs="12" sm="12" md="12" lg="12" xl="12" class="mt-0 px-3 mx-auto rounded- align-center text-center"
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


                            <v-col
                                cols="12"
                                class="mt-3 mx-auto rounded- align-center text-center"
                            >
                                <v-data-table
                                    :headers="headers"
                                    :search="search"
                                    :items-per-page="7"
                                    :items="inventoryItem"
                                    class="elevation-1"
                                    dense
                                >
                                    <template v-slot:item.actions="{ item }">
                                        <v-btn
                                            class="white--text"
                                            @click="editItem(item)"
                                            color="#34726f"
                                            dark
                                            x-small
                                            dense
                                            ><v-icon
                                                x-small
                                                dense
                                                class="white--text"
                                            >
                                                mdi-pencil
                                            </v-icon>
                                            <strong>&nbsp;Edit</strong>
                                        </v-btn>

                                        <v-icon
                                            small
                                            @click="deleteItem(item)"
                                            color="error"
                                        >
                                            mdi-delete
                                        </v-icon>
                                    </template>

                                </v-data-table>


                            </v-col>

                    </v-responsive>
                    </v-card>
                </v-col>

                <v-dialog v-model="dialogDelete" max-width="500px">
                    <v-card>
                        <v-card-title class="text-h5">Are you sure you want to delete this Item ?</v-card-title>
                        <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="#34726f"
                        dense
                        small
                        dark text @click="deleteItemConfirm">Delete</v-btn>
                        <v-btn color="#34726f"
                        dense
                        small
                        dark @click="closeDelete">Cancel</v-btn>
                        <v-spacer></v-spacer>
                        </v-card-actions>
                    </v-card>
                </v-dialog>

            <v-snackbar
            v-model="snackbar"
            :multi-line="false"
            :color="snackColor"
            :top="snackBarTop"
            :right="snackBarRight"
        >
            {{ snackMessage }}
        </v-snackbar>
            </v-row>
        </v-app>
    </div>
</template>

<script>
export default {
    data: () => ({

        snackbar: false,
            snackMessage: false,
            snackColor: "",
            snackBarTop: true,
            snackBarRight: false,
            overlay: false,

            dialogDelete:false,

        dialog: false,
        dialogq: false,
        attrs: false,
        on: false,
        checkbox: false,
        select: [],
        items: [],
        service: [],
        cost: [0],
        subcategoryList: [0],

        search: "",
        dialogDelete: false,
        editdialog: false,
        //   scs: [],

        item_name:"",
        sub_category:"",
        item_id:"new",

        subcategoryList: [
            "Drugs & Medications",
            "Other",
        ],
        serviceId:'',
        show1: false,
        rules: {
            required: (value) => !!value || "Required.",
            min: (v) => v.length >= 8 || "Min 8 characters",
        },
        services: [],

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

        time2: null,
        time3: null,
        menu2: false,
        menu3: false,

        autoUpdate: true,
        isUpdating: false,

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
            dialog(val) {
                val || this.close();
            },

        },

        headers: [
            {
                text: "Sub category",
                align: "start",
                value: "sub_category",
            },
            { text: "Item Name", sortable: false, value: "item_name" },

            { text: "Actions", value: "actions", sortable: false },
        ],
        inventoryItem:[],
        editedIndex: -1,

        editedItem: {
            sname: "",
            subcategory: "0",
            cost: "0",
            count: "0",
        },
        defaultItem: {
            sname: "",
            subcategory: "0",
            cost: "0",
            count: "0",
        },
    }),

    computed: {
        formTitle() {
            return this.editedIndex === -1 ? "Add Service" : "Edit Item";
        },
    },

    created() {
        this.initialize();
    },

    methods: {
        getColor(subcategory) {
            if (subcategory == 1) return "red";
            else if (subcategory == 2) return "green";
            else if (subcategory == 3) return "orange";
            else return "blue";
        },

        initialize() {
                axios.get('/api/services/all')
                .then(response => {
                    this.inventoryItem = response.data.data;
                    console.log('inventoryItem',this.inventoryItem);
                })
                .catch(error => {
                    this.setSnackbarAlert(error.message,'error');
                    console.log(error);
                });
        },

        clearForm(){
            this.sub_category = "";
            this.item_name = "";
            this.item_id ="new";
        },

        editItem(item) {
            this.item_id = item.id;
            this.sub_category = item.sub_category;
            this.item_name = item.item_name;
        },

        editService(item) {
            this.editedIndex = this.services.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.editdialog = true;
        },

        addService(item) {
            this.editedIndex = this.services.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.editdialog1 = true;
        },

        deleteItem(data){
            this.dialogDelete = true;
            this.serviceId = data.id;
        },

        deleteItemConfirm() {
            let id = this.serviceId;


            axios.delete(`/api/services/destroy/${id}`)
                .then(response => {
                    this.setSnackbarAlert(response.data.message,'success');
                })
                .catch(error => {
                    console.error(error);
                });

        },

        close() {
            this.dialog = false;
            this.$nextTick(() => {
                this.editedItem = Object.assign({}, this.defaultItem);
                this.editedIndex = -1;
            });
        },

        closeDelete() {
            this.dialogDelete = false;
        },

        save() {
            if (this.editedIndex > -1) {
                Object.assign(this.services[this.editedIndex], this.editedItem);
            } else {
                this.services.push(this.editedItem);
            }
            this.close();
        },

        addInventoryItem(){
            this.overlay = true;
            let data;
            if(this.item_id !="new"){
                data = {
                item_id :this.item_id,
                sub_category: this.sub_category,
                item_name: this.item_name,
                 }

                 axios.post('/api/services/update', data).then(response => {
                       // alert('Form submitted successfully!');
                        this.setSnackbarAlert(response.data.message,'success');
                        this.initialize();
                        this.overlay = false;
                        this.item_id ="new";

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

            }else{
                data = {
                sub_category: this.sub_category,
                item_name: this.item_name,
                 }

                 axios.post('/api/services/register', data).then(response => {
                       // alert('Form submitted successfully!');
                        this.setSnackbarAlert(response.data.message,'success');
                        this.initialize();
                        this.overlay = false;
                        this.item_id ="new";

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

        setSnackbarAlert(message,colorCode){
                this.snackMessage = message;
                this.snackColor = colorCode;
                this.snackbar =true;
            },
    },
};
</script>

<style>
body {
    overflow: hidden;
}
.bg {
    background-image: url("/images/profile_bg.jpg");
    background-size: cover;
    background-position: center center;
}
</style>
