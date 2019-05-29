import APP_CONFIG from '../config';


export default {

    /*
        GET     /api/invoiceref
    */
   getInvoiceRef:function(){
       return axios.get(APP_CONFIG.API_URL + '/invoiceref');
   },

    /*
        GET     /api/invoiceinfo
    */
    getSettings:function(){
        return axios.get(APP_CONFIG.API_URL + '/settings');
    },

    /*
        PUT     /api/settings
    */
    updateSettingsInfo(data){
        console.log("Data we sent...",data);
        return axios.put(APP_CONFIG.API_URL + '/settings/1',{
            data
        });
    },

   /*
    GET   /api/cafes/{cafeID}
    */
    getCafe: function( cafeID ){
        return axios.get( APP_CONFIG.API_URL + '/cafes/' + cafeID );
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