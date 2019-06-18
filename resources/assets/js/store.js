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
import {certificates} from './modules/certificates';
import {surveys} from './modules/surveys';
import {reports} from './modules/reports';
export default new Vuex.Store({
    modules: {
     invoices,
     certificates,
    //  surveys,
     reports
    }
  })