/*
    Imports Vue and Vuex
*/
import Vue from 'vue'
import Vuex from 'vuex'


/*
Initializes Vuex on Vue.
*/
Vue.use( Vuex )



/*
  Exports our data store.
*/

import {invoices} from './modules/invoices';
export default new Vuex.Store({
    modules: {
     invoices,
    }
  })