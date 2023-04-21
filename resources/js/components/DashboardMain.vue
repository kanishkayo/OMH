<template>
  <div>

    <v-app-bar app clipped-left color="#34726f" dense height="36%">
      <v-app-bar-nav-icon class="white--text" @click.stop="drawer = !drawer" />
      <v-toolbar-title class="headline" style="margin-right: 30px">
        <span class="font-weight-bold text--sm white--text"> <strong>O N L I N E &nbsp; M E D I C I N E &nbsp; H U B </strong></span>
      </v-toolbar-title>
      <v-spacer />
      <!-- <v-toolbar-title class="headline" style="margin-right: 30px">
        <span class="title white--text"> User  </span>
      </v-toolbar-title> -->
      <v-menu left bottom>
        <template v-slot:activator="{ on }">
          <v-btn icon v-on="on">
            <v-icon class="white--text">mdi-account-circle</v-icon>
          </v-btn>
        </template>

        <v-list>
          <v-list-item @click="dialogLogout = true">
            <v-list-item-title>
              <v-icon class="ma-2">mdi-logout</v-icon>Logout
            </v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>
    </v-app-bar>

    <v-navigation-drawer v-model="drawer" color="#424242" app clipped dark width="11%">
        <v-divider></v-divider>
      <v-list dense rounded background>

        <!-- <v-list-item class="px-2">
            <v-list-item-avatar>
              <v-img src="/images/admin.jpg"></v-img>
            </v-list-item-avatar>
          </v-list-item> -->

          <!-- <v-list-item link>
            <v-list-item-content>
              <v-list-item-title class="text-h6">
                Dinu Perera
              </v-list-item-title>
              <v-list-item-subtitle><strong>dinup@google.com</strong></v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item> -->


        <v-divider></v-divider>

        <v-list-item v-if="isVisibileAdmin"  to="/pharmacy/dashboard/home" link @click.stop="drawer = !drawer">
                <v-list-item-content >
                    <v-list-item-title>Home</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
            <v-list-item v-if="isVisibileAdmin"  to="/pharmacy/dashboard/userRegistration" link @click.stop="drawer = !drawer">
                <v-list-item-content>
                    <v-list-item-title>Pharmacy Registration</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
            <v-list-item v-if="isVisibileAdmin" to="/pharmacy/dashboard/user" link @click.stop="drawer = !drawer">
                <v-list-item-content>
                    <v-list-item-title>Pharmacy</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
            <v-list-item v-if="isVisibileAdmin" to="/pharmacy/dashboard/customer" link @click.stop="drawer = !drawer">
                <v-list-item-content>
                    <v-list-item-title> Customer </v-list-item-title>
                </v-list-item-content>
            </v-list-item>

            <v-list-item v-if="isVisibileAdmin" to="/pharmacy/dashboard/service" link @click.stop="drawer = !drawer">
                <v-list-item-content>
                    <v-list-item-title> Inventory Item</v-list-item-title>
                </v-list-item-content>
            </v-list-item>


            <v-list-item v-if="isVisibilePharmacy" to="/pharmacy/dashboard/pharmacy" link @click.stop="drawer = !drawer">
                <v-list-item-content>
                    <v-list-item-title> Home</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
            <v-list-item v-if="isVisibilePharmacy" to="/pharmacy/dashboard/order" link @click.stop="drawer = !drawer">
                <v-list-item-content>
                    <v-list-item-title> phamarcy Order</v-list-item-title>
                </v-list-item-content>
            </v-list-item>




      </v-list>
    </v-navigation-drawer>


    <!-- ******************* logout user dialog ********************** -->

    <v-dialog v-model="dialogLogout" max-width="290">
      <v-card>
        <v-card-title class="headline">User Logout?</v-card-title>
        <v-card-text>Do you want to logout ?</v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>


          <v-btn color="#34726f" dark x-small dense class="mr-2" text @click="isLogOut()">Logout</v-btn>

          <v-btn color="#34726f" dark x-small dense class="mr-2" @click="dialogLogout = false"
            >Cancel</v-btn
          >
        </v-card-actions>
      </v-card>
    </v-dialog>

    <v-main>
      <!-- <DashboardView v-if="$route.name == 'DashboardMain'"></DashboardView>
      <SubMenu1 v-if="$route.name == 'SUBMenuList'"></SubMenu1> -->

      <router-view></router-view>

      <!-- <h1>aaaaaa</h1> -->

    </v-main>
  </div>
</template>

<script>

// import SubMenu1 from "./AS/Menu1/SubMenu1.vue";
export default {
  name: "DashbordMain",

  components:{
    //   DashboardView,
    //   SubMenu1,
  },

  data: () => ({
    user_role:null,
    user_id :"",
    user :null,

    showPassword: false,
    isVisibilePharmacy:false,
    isVisibileAdmin:false,
    drawer: false,
    dialogLogout: false,
    items: [
      {
        action: "mdi-monitor-dashboard",
        title: "Home",
        active: true,
        items: [
          { subtitle: "Dashboard", routePath: "home" },
        ],
        url: "",
      },
      {
        action: "mdi-clipboard",
        title: "Menu 1",
        active: false,
        items: [
          { subtitle: "Sub Menu 1", routePath: "submenu-list" },

        ],
        url: "",
      },
    ],

  }),
  created() {
        this.checkLoging();
    },
  methods: {

    checkLoging() {
            let user = localStorage.getItem("user");
console.log("user",localStorage.getItem("user"));
            user = JSON.parse(user);
            this.user_role = user.role;

            if(!user){
            this.isLogOut();
            }else if (this.user_role == "pharmacy") {
                this.isVisibilePharmacy = true;
            } else if(this.user_role == "ADMIN") {
                this.isVisibileAdmin = true;
            }
            if (user.role !== "pharmacy" && user.role !== "ADMIN") {
                this.$router.back();
            }
                this.user_id = user.id;
               // alert(this.user_role);
                this.user = user;
        },

    isLogOut() {
      localStorage.removeItem('token');
      localStorage.removeItem('user');
      window.setLogout();
    },
  },

};
</script>
