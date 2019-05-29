import APP_CONFIG from '../config';


export default {

    /*
        GET     /api/invoiceref
    */
   getInvoiceRef:function(){
       return axios.get(APP_CONFIG.API_URL + '/invoiceref');
   },

    /*
        GET     /api/settings
    */
    getSettings:function(){
        return axios.get(APP_CONFIG.API_URL + '/settings');
    },

    /*
        GET     /api/invoices
    */
    getInvoices:function(){
        return axios.get(APP_CONFIG.API_URL + '/invoices');
    },

    /*
        PUT     /api/settings/id
    */
    updateSettingsInfo(data){
        console.log("Data we sent...",data);
        return axios.put(APP_CONFIG.API_URL + '/settings/1',{
            data
        });
    },

    /*
    POST  /api/invoice
    */
    postAddNewInvoice: function( data ){
        return axios.post( APP_CONFIG.API_URL + '/invoices',
        {
            data
        }
        );
    }
}