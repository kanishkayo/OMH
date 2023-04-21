import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
  state: {
    gmap:null,
    search:'',
    searchBar:false,
    navBar:false,
    currentLocation:null,
    currentGNDData:null,
  },
  mutations: {
    changeMap(state, gmap) {
      state.gmap = gmap;
    },
    setHttpHeader(state, payload) {
      state.httpheader = payload;
    },
    changeSearch(state, search) {
      state.search = search;
    },
    changeNavBar(state, value) {
      state.navBar = value;
    },
    setGeocode(state,payload){
      state.geocode = payload;
    },
    setcurrentLocation(state,payload){
      state.currentLocation = payload;
    },

  },
  getters: {
    gmap: state => state.gmap,
    httpheader: state => state.httpheader,
    search: state => state.search,
    searchBar: state => state.searchBar,
    navBar: state => state.navBar,
    currentLocation: state => state.currentLocation,
  }
});
